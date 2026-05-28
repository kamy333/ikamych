[CmdletBinding()]
param(
    [string]$Path = "/public/index.php",
    [string]$BaseUrl = "http://ikamy.local"
)

$base = $BaseUrl.TrimEnd("/")
$relativePath = if ($Path.StartsWith("/")) { $Path } else { "/$Path" }

Start-Process "$base$relativePath"
