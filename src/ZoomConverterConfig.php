<?php

namespace Victormln\ZoomChatToSrt;

class ZoomConverterConfig
{
    public function __construct(
        private int $numberOfSecondsBetweenEachSubtitle,
        private bool $overlapSubtitles,
    ){}

    public function numberOfSecondsBetweenEachSubtitle(): int
    {
        return $this->numberOfSecondsBetweenEachSubtitle;
    }

    public function hasToOverlapSubtitles(): bool
    {
        return $this->overlapSubtitles;
    }


}