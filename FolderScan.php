<?php       
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

function isStandardDirectory(string $path) : bool
{
    if ((is_dir($path) && !is_readable($path)) || is_link($path) || !is_dir($path)) {
        return false;
    }

    return true;
}

function printFile(string $indent, string $fileName)
{
    echo $indent . $fileName . "\n";
}

