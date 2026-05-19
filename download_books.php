<?php
$user = "user-10840863";
$pass = "xU0flS@gaybSe1&9";
$host = "82.194.68.104";
$remoteRoot = "/jacotofotografia.com";
$localBase = __DIR__ . "/resources/oldweb";

$missing = [
    "Boda - Sandra y Dario - Octubre 2022",
    "Evento - One Soul - Octubre 2022",
    "Ribes de freser",
    "Evento TRAFFFIC - Acto final",
    "Evento TRAFFFIC - 12.04.2024",
    "Evento TRAFFFIC - 11.04.2024",
    "Sesión - Girona - Dani",
    "Sesión -Junio 2024 - Girona - Marc",
    "Sesión - Diciembre 2024 - Girona - MMA",
    "sant jordi 2025",
];

function listDir($path) {
    global $user, $pass, $host;
    $url = "ftp://" . rawurlencode($user) . ":" . rawurlencode($pass) . "@" . $host . $path;
    $h = @opendir($url);
    if (!$h) return false;
    $entries = [];
    while (($f = readdir($h)) !== false) {
        if ($f != "." && $f != "..") $entries[] = $f;
    }
    closedir($h);
    return $entries;
}

function downloadFile($remotePath, $localPath) {
    global $user, $pass, $host;
    $url = "ftp://" . rawurlencode($user) . ":" . rawurlencode($pass) . "@" . $host . $remotePath;
    $content = @file_get_contents($url);
    if ($content === false) return false;
    $dir = dirname($localPath);
    if (!is_dir($dir)) mkdir($dir, 0777, true);
    file_put_contents($localPath, $content);
    return strlen($content);
}

foreach ($missing as $folder) {
    $remotePath = $remoteRoot . "/" . $folder;
    $localDir = $localBase . "/" . $folder;

    echo "--- $folder ---\n";

    if (!is_dir($localDir)) {
        mkdir($localDir, 0777, true);
    }

    $entries = listDir($remotePath);
    if ($entries === false) {
        echo "  ERROR: Cannot list directory\n";
        continue;
    }

    $count = 0;
    foreach ($entries as $entry) {
        $localFile = $localDir . "/" . $entry;
        if (file_exists($localFile)) {
            echo "  EXISTS: $entry\n";
            $count++;
            continue;
        }

        $remoteFile = $remotePath . "/" . rawurlencode($entry);
        $bytes = downloadFile($remoteFile, $localFile);
        if ($bytes === false) {
            echo "  FAIL:  $entry\n";
        } else {
            echo "  OK:    $entry (" . number_format($bytes) . " bytes)\n";
            $count++;
        }
    }

    echo "  Total downloaded: $count / " . count($entries) . "\n\n";
}

echo "Done!\n";
