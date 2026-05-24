param(
    [string] $BaseUrl = "",
    [switch] $SkipPhpLint
)

$ErrorActionPreference = "Stop"
$failed = $false

function Run-Step {
    param(
        [string] $Name,
        [scriptblock] $Command
    )

    Write-Host "==> $Name"
    & $Command
    if ($LASTEXITCODE -ne 0) {
        throw "$Name failed with exit code $LASTEXITCODE"
    }
}

Run-Step "git status" { git status --short }
Run-Step "composer validate" { composer validate --no-check-publish }
Run-Step "composer audit" { composer audit }
Run-Step "git diff whitespace check" { git diff --check }

if (-not $SkipPhpLint) {
    Write-Host "==> PHP lint"
    $lintRoots = @("includes", "public", "Inspinia")
    $files = Get-ChildItem -Path $lintRoots -Recurse -Filter *.php |
        Where-Object { $_.FullName -notmatch '\\includes\\src\\' }

    foreach ($file in $files) {
        php -l $file.FullName | Out-Null
        if ($LASTEXITCODE -ne 0) {
            Write-Host "PHP lint failed: $($file.FullName)"
            $failed = $true
        }
    }

    if ($failed) {
        throw "PHP lint failed"
    }

    Write-Host "PHP lint passed"
}

if ($BaseUrl -ne "") {
    Write-Host "==> HTTP smoke"
    $paths = @(
        "/public/index.php",
        "/public/about_us.php",
        "/public/about_us_2.php",
        "/public/myLinks.php?category=Others",
        "/public/myLinks1.php?category=Udemy",
        "/public/myLinks2.php",
        "/public/admin/crud/ajax/manage_ajax.php?&page=1&order_name=id&order_type=ASC&class_name=Article",
        "/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpenseMum",
        "/public/admin/crud/ajax/new_ajax.php?class_name=MyExpenseMum",
        "/public/calendar.php",
        "/public/admin/crud/ajax/manage_ajax.php?class_name=Note",
        "/public/contact.php"
    )

    foreach ($path in $paths) {
        $uri = $BaseUrl.TrimEnd("/") + $path
        Write-Host "GET $uri"
        $response = Invoke-WebRequest -Uri $uri -MaximumRedirection 5 -UseBasicParsing
        $body = [string] $response.Content
        if ($body -match "Fatal error|Warning:|Deprecated:") {
            throw "Unexpected PHP output in $uri"
        }
    }
}

Write-Host "Smoke checks passed"
