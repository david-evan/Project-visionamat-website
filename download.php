<?php
include ('includes/config.php');
include (CLASS_DOWNLOADER);
$fileName = $_GET['file'];
$downloader = new Downloader($fileName);
$downloader->startDownload();
?>