<?php
    require 'FolderScan.php';
    
    if (PHP_SAPI !== 'cli') {
        echo '<pre>';
        scanDirectory(__DIR__, '');
        echo '</pre>';
    } else {
        scanDirectory(__DIR__, '');
    }
