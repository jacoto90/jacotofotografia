<?php
$db = new PDO('sqlite:database/database.sqlite');
$r = $db->query('SELECT idbookfotos, nombrebook FROM bookfotos');
foreach ($r as $row) {
    echo "{$row['idbookfotos']} => [{$row['nombrebook']}]\n";
    $path = 'resources/oldweb/' . $row['nombrebook'];
    if (is_dir($path)) {
        echo "  OK\n";
        $files = scandir($path);
        $imgs = array_filter($files, fn($f) => preg_match('/\.(jpg|jpeg|png|gif|bmp)$/i', $f));
        echo "  Images: " . count($imgs) . "\n";
    } else {
        echo "  MISSING: " . realpath('resources/oldweb') . '/' . $row['nombrebook'] . "\n";
    }
}
