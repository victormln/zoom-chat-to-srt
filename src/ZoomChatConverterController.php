<?php

require_once(__DIR__ . '/' . '../vendor/autoload.php');

use Victormln\ZoomChatToSrt\ZoomChat;
use Victormln\ZoomChatToSrt\ZoomChatConverter;
use Victormln\ZoomChatToSrt\ZoomConverterConfig;

if (!isset($_FILES["fileToUpload"])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if ($_FILES["fileToUpload"]["size"] > 100000) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_FILES["fileToUpload"])) {
    $outputFileName = '/tmp/zoom_' . random_int(10000000, 999999999) . '.srt';
    try {
        $defaultNumberOfSeconds = 5;
        $overlapSubtitles = true;
        if (isset($_POST['number_of_seconds_duration'])) {
            $defaultNumberOfSeconds = $_POST['number_of_seconds_duration'];
        }
        if (isset($_POST['overlap_subtitles'])) {
            $overlapSubtitles = $_POST['overlap_subtitles'];
        }

        (new ZoomChatConverter(
            new ZoomChat($_FILES["fileToUpload"]["tmp_name"]),
            new ZoomConverterConfig($defaultNumberOfSeconds, $overlapSubtitles)
        ))
            ->toSrt($outputFileName);
    } catch (Throwable $exception) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if(file_exists($outputFileName)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename('zoom_converted.srt').'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($outputFileName));
        flush();
        readfile($outputFileName);
        unlink($outputFileName);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}