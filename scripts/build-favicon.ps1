param(
    [string]$Source = "E:\logo\square\logo square blue.png",
    [string]$Root = (Resolve-Path (Join-Path $PSScriptRoot "..")).Path
)

Add-Type -AssemblyName System.Drawing

$publicDir = Join-Path $Root "public"
$icoPath = Join-Path $Root "favicon.ico"
$pngPath = Join-Path $publicDir "favicon.png"
$png32Path = Join-Path $publicDir "favicon-32x32.png"
$png16Path = Join-Path $publicDir "favicon-16x16.png"
$appleTouchPath = Join-Path $publicDir "apple-touch-icon.png"

function New-ResizedPngBytes {
    param(
        [System.Drawing.Bitmap]$Bitmap,
        [int]$Size
    )

    $target = New-Object System.Drawing.Bitmap $Size, $Size, ([System.Drawing.Imaging.PixelFormat]::Format32bppArgb)
    $graphics = [System.Drawing.Graphics]::FromImage($target)
    $graphics.CompositingMode = [System.Drawing.Drawing2D.CompositingMode]::SourceCopy
    $graphics.CompositingQuality = [System.Drawing.Drawing2D.CompositingQuality]::HighQuality
    $graphics.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
    $graphics.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
    $graphics.PixelOffsetMode = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
    $graphics.Clear([System.Drawing.Color]::Transparent)
    $graphics.DrawImage($Bitmap, 0, 0, $Size, $Size)
    $graphics.Dispose()

    $stream = New-Object System.IO.MemoryStream
    $target.Save($stream, [System.Drawing.Imaging.ImageFormat]::Png)
    $target.Dispose()
    $bytes = $stream.ToArray()
    $stream.Dispose()

    return ,$bytes
}

function Save-Png {
    param(
        [System.Drawing.Bitmap]$Bitmap,
        [int]$Size,
        [string]$Path
    )

    $pngBytes = [byte[]](New-ResizedPngBytes -Bitmap $Bitmap -Size $Size)
    [System.IO.File]::WriteAllBytes($Path, $pngBytes)
}

$sourceBitmap = [System.Drawing.Bitmap]::FromFile($Source)

$left = $sourceBitmap.Width
$top = $sourceBitmap.Height
$right = -1
$bottom = -1

for ($y = 0; $y -lt $sourceBitmap.Height; $y++) {
    for ($x = 0; $x -lt $sourceBitmap.Width; $x++) {
        $pixel = $sourceBitmap.GetPixel($x, $y)
        $isBlueLogoPixel = $pixel.B -gt 130 -and $pixel.R -lt 90 -and ($pixel.B - $pixel.R) -gt 80

        if ($isBlueLogoPixel) {
            if ($x -lt $left) { $left = $x }
            if ($y -lt $top) { $top = $y }
            if ($x -gt $right) { $right = $x }
            if ($y -gt $bottom) { $bottom = $y }
        }
    }
}

if ($right -lt $left -or $bottom -lt $top) {
    $sourceBitmap.Dispose()
    throw "Could not find the blue logo area in $Source"
}

$width = $right - $left + 1
$height = $bottom - $top + 1
$size = [Math]::Max($width, $height)
$centerX = $left + ($width / 2)
$centerY = $top + ($height / 2)
$cropX = [Math]::Max(0, [Math]::Floor($centerX - ($size / 2)))
$cropY = [Math]::Max(0, [Math]::Floor($centerY - ($size / 2)))

if ($cropX + $size -gt $sourceBitmap.Width) {
    $cropX = $sourceBitmap.Width - $size
}
if ($cropY + $size -gt $sourceBitmap.Height) {
    $cropY = $sourceBitmap.Height - $size
}

$cropRect = New-Object System.Drawing.Rectangle ([int]$cropX), ([int]$cropY), ([int]$size), ([int]$size)
$croppedSource = $sourceBitmap.Clone($cropRect, [System.Drawing.Imaging.PixelFormat]::Format24bppRgb)
$sourceBitmap.Dispose()

$trimmed = New-Object System.Drawing.Bitmap $croppedSource.Width, $croppedSource.Height, ([System.Drawing.Imaging.PixelFormat]::Format32bppArgb)
for ($y = 0; $y -lt $croppedSource.Height; $y++) {
    for ($x = 0; $x -lt $croppedSource.Width; $x++) {
        $pixel = $croppedSource.GetPixel($x, $y)
        $trimmed.SetPixel($x, $y, [System.Drawing.Color]::FromArgb(255, $pixel.R, $pixel.G, $pixel.B))
    }
}
$croppedSource.Dispose()

$queue = New-Object System.Collections.Generic.Queue[System.Drawing.Point]
$visited = New-Object 'bool[,]' $trimmed.Width, $trimmed.Height

function Add-TransparentCandidate {
    param([int]$X, [int]$Y)

    if ($X -lt 0 -or $Y -lt 0 -or $X -ge $trimmed.Width -or $Y -ge $trimmed.Height -or $visited[$X, $Y]) {
        return
    }

    $pixel = $trimmed.GetPixel($X, $Y)
    $isExteriorWhite = $pixel.R -gt 238 -and $pixel.G -gt 238 -and $pixel.B -gt 238
    if (-not $isExteriorWhite) {
        return
    }

    $visited[$X, $Y] = $true
    $queue.Enqueue((New-Object System.Drawing.Point $X, $Y))
}

for ($i = 0; $i -lt $trimmed.Width; $i++) {
    Add-TransparentCandidate -X $i -Y 0
    Add-TransparentCandidate -X $i -Y ($trimmed.Height - 1)
}
for ($i = 0; $i -lt $trimmed.Height; $i++) {
    Add-TransparentCandidate -X 0 -Y $i
    Add-TransparentCandidate -X ($trimmed.Width - 1) -Y $i
}

while ($queue.Count -gt 0) {
    $point = $queue.Dequeue()
    $trimmed.SetPixel($point.X, $point.Y, [System.Drawing.Color]::Transparent)
    Add-TransparentCandidate -X ($point.X + 1) -Y $point.Y
    Add-TransparentCandidate -X ($point.X - 1) -Y $point.Y
    Add-TransparentCandidate -X $point.X -Y ($point.Y + 1)
    Add-TransparentCandidate -X $point.X -Y ($point.Y - 1)
}

Save-Png -Bitmap $trimmed -Size 512 -Path $pngPath
Save-Png -Bitmap $trimmed -Size 180 -Path $appleTouchPath
Save-Png -Bitmap $trimmed -Size 32 -Path $png32Path
Save-Png -Bitmap $trimmed -Size 16 -Path $png16Path

$icoSizes = @(16, 32, 48, 64, 128, 256)
$pngImages = @()
foreach ($icoSize in $icoSizes) {
    $pngImages += ,([byte[]](New-ResizedPngBytes -Bitmap $trimmed -Size $icoSize))
}

$icoStream = New-Object System.IO.MemoryStream
$writer = New-Object System.IO.BinaryWriter $icoStream
$writer.Write([UInt16]0)
$writer.Write([UInt16]1)
$writer.Write([UInt16]$icoSizes.Count)

$imageOffset = 6 + (16 * $icoSizes.Count)
for ($i = 0; $i -lt $icoSizes.Count; $i++) {
    $entrySize = $icoSizes[$i]
    $writer.Write([byte]($(if ($entrySize -eq 256) { 0 } else { $entrySize })))
    $writer.Write([byte]($(if ($entrySize -eq 256) { 0 } else { $entrySize })))
    $writer.Write([byte]0)
    $writer.Write([byte]0)
    $writer.Write([UInt16]1)
    $writer.Write([UInt16]32)
    $writer.Write([UInt32]$pngImages[$i].Length)
    $writer.Write([UInt32]$imageOffset)
    $imageOffset += $pngImages[$i].Length
}

foreach ($pngImage in $pngImages) {
    $writer.Write($pngImage)
}

$writer.Flush()
[System.IO.File]::WriteAllBytes($icoPath, $icoStream.ToArray())
$writer.Dispose()
$icoStream.Dispose()
$trimmed.Dispose()

Write-Output "Wrote $icoPath"
Write-Output "Wrote $pngPath"
Write-Output "Wrote $appleTouchPath"
Write-Output "Wrote $png32Path"
Write-Output "Wrote $png16Path"
