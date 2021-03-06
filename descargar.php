<?php
include "settings.php";

    handdleSession(true);

    $url = get('l');
    if($url == "" or !$url)
        die('No se indicó un libro valido');
    $file = '/pubs/'. $url . '.epub';

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
?>