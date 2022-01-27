<?php

namespace Victormln\ZoomChatToSrt;

final class ZoomChat
{
    private array $lines;

    /** ZoomChatLine[] $chatLines */
    public function __construct(private string $filePath)
    {
        $this->addLinesFromFile($this->filePath);
    }

    private function addLinesFromFile(string $filePath): void
    {
        $file = fopen($filePath, 'rb');
        while (!feof($file)){
            $line = fgets($file);
            $this->addLine(ZoomChatLine::fromString($line));
        }
        fclose($file);
    }

    private function addLine(ZoomChatLine $zoomChatLine): void
    {
        $this->lines[] = $zoomChatLine;
    }

    public function lines(): array
    {
        return $this->lines;
    }
}