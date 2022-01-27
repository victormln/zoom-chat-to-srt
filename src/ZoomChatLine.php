<?php

namespace Victormln\ZoomChatToSrt;

use DateTimeImmutable;

class ZoomChatLine
{
    private const DEFAULT_DATETIME_FORMAT = 'H:i:s';

    private function __construct(
        private DateTimeImmutable $datetimeOfLine,
        private string $username,
        private string $message
    ) {}

    public static function fromString(string $chatLineFromFile): self
    {
        // $chatLineFromFile example:
        // 16:20:25	 De  victormln : Hi!
        $explodedLineByTab = explode("\t", $chatLineFromFile);
        // [0] => " De", [1] => "victormln : Hi!"
        $explodedFromTextAndUsernameAndMessage = explode('  ', $explodedLineByTab[1]);
        // [0] => "victormln", [1] => "Hi!"
        $explodedFromAndMessage = explode(' : ', $explodedFromTextAndUsernameAndMessage[1]);

        return new self(
            DateTimeImmutable::createFromFormat(self::DEFAULT_DATETIME_FORMAT, $explodedLineByTab[0]),
            $explodedFromAndMessage[0],
            $explodedFromAndMessage[1]
        );
    }

    public function datetimeOfLine(): DateTimeImmutable
    {
        return $this->datetimeOfLine;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function message(): string
    {
        return $this->message;
    }
}