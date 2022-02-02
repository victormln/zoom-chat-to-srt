<?php

namespace Victormln\ZoomChatToSrt;

final class ZoomChatConverter
{
    public function __construct(
        private ZoomChat $zoomChat,
        private ZoomConverterConfig $zoomConverterConfig
    ){}

    public function toSrt(string $outputFilePath): SrtFile
    {
        $srtFile = new SrtFile();
        $srtFile->fromZoomChat($this->zoomChat, $this->zoomConverterConfig);

        $outputSrtFile = fopen($outputFilePath, 'wb');
        foreach ($srtFile->lines() as $srtLine)
        {
            /** @var SrtLine $srtLine */
            fwrite($outputSrtFile, $srtLine->toString());
        }
        fclose($outputSrtFile);

        return $srtFile;
    }
}