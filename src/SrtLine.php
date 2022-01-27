<?php

namespace Victormln\ZoomChatToSrt;

use DateTimeInterface;

final class SrtLine
{
    public function __construct(
        private int $numberOfLine,
        private DateTimeInterface $startsAt,
        private DateTimeInterface $endsAt,
        private string $message
    ) {}

    public function toString(): string
    {
        return
            $this->numberOfLine . PHP_EOL .
            substr($this->startsAt->format('H:i:s,u'), 0, -3) . ' --> ' . substr($this->endsAt->format('H:i:s,u'), 0, -3) . PHP_EOL .
            $this->message . PHP_EOL;
    }
}