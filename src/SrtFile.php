<?php

namespace Victormln\ZoomChatToSrt;

use DateInterval;
use DateTimeImmutable;

final class SrtFile
{
    private const DEFAULT_FORMAT = 'H:i:s';
    private const DATE_INTERVAL_FORMAT = '%H:%I:%S';
    private array $lines;

    public function __construct(private int $counter = 1)
    {
        $this->lines = [];
    }

    public function fromZoomChat(ZoomChat $zoomChat, ZoomConverterConfig $zoomConverterConfig): void
    {
        $previousStartDatetime = null;
        $startDatetime = DateTimeImmutable::createFromFormat(
            self::DEFAULT_FORMAT,
            '00:00:00'
        );
        $endDatetime = $startDatetime
            ->add(
                new DateInterval($this->formatInterval($zoomConverterConfig->numberOfSecondsBetweenEachSubtitle()))
            );

        foreach ($zoomChat->lines() as $zoomChatLine) {
            /** @var ZoomChatLine $zoomChatLine */
            if ($previousStartDatetime === null) {
                $previousStartDatetime = $zoomChatLine->datetimeOfLine();
                $this->addLine(
                    new SrtLine(
                        $this->counter,
                        $startDatetime,
                        $endDatetime,
                        $zoomChatLine->message()
                    )
                );
                $this->counter++;
                continue;
            }

            $startDatetime = DateTimeImmutable::createFromFormat(
                self::DEFAULT_FORMAT,
                $previousStartDatetime
                    ->diff($zoomChatLine->datetimeOfLine())
                    ->format(self::DATE_INTERVAL_FORMAT)
            );

            if (!$zoomConverterConfig->hasToOverlapSubtitles() && $startDatetime < $endDatetime) {
                $startDatetime = $endDatetime;
            }
            $endDatetime = $startDatetime
                ->add(
                    new DateInterval($this->formatInterval($zoomConverterConfig->numberOfSecondsBetweenEachSubtitle()))
                );

            $this->addLine(
                new SrtLine(
                    $this->counter,
                    $startDatetime,
                    $endDatetime,
                    $zoomChatLine->message()
                )
            );
            $this->counter++;
        }
    }

    private function addLine(SrtLine $srtLine): void
    {
        $this->lines[] = $srtLine;
    }

    public function lines(): array
    {
        return $this->lines;
    }

    private function formatInterval(int $numberOfSeconds): string
    {
        return sprintf('PT%sS', $numberOfSeconds);
    }

    public function toString(): string
    {
        $srtContent = '';
        foreach ($this->lines as $line)
        {
            /** @var SrtLine $line */
            $srtContent .= $line->toString();
        }

        return $srtContent;
    }
}