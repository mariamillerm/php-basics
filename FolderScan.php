<?php      
namespace Itransition\ScanFolder;
 
function scanDirectory(string $path, string $indent)
{
    if ($dir = @opendir($path)) {
        while ($file = readdir($dir)) {
            if ($file != '..' && $file != '.') {
                $currentPath = $path . '/' . $file;
                printFile($indent, $file);
                if (isStandardDirectory($currentPath)) {
                    scanDirectory($currentPath, $indent . "\t");      
                }
            }
        }
        closedir($dir);
    }

}

function isStandardDirectory(string $path): bool
{
    $res = true;
    if (!is_dir($path)) {
        $res = false;
    } elseif (is_dir($path) && !is_readable($path)) {
        $res = false;
    } elseif (is_link($path) {
        $res = false;
    }

    return $res;
}

function printFile(string $indent, string $fileName)
{
    echo $indent . $fileName . "\n";
}
