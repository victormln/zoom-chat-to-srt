<?php

namespace Victormln\ZoomChatToSrt\Tests;

use Victormln\ZoomChatToSrt\ZoomChatLine;
use PHPUnit\Framework\TestCase;

class ZoomChatLineTest extends TestCase
{
    private const EXPECTED_SHORT_MESSAGE = "Hi!";
    private const EXPECTED_USERNAME = 'victormln';
    private const EXPECTED_DATETIME = "16:20:25";
    private const ANOTHER_EXPECTED_DATETIME = "23:59:59";
    private const EXPECTED_LARGE_MESSAGE = "Hi! How are you? I'm fine :). Sooooo, i don't know what else to say so... Goodbye to everyone! By the way, this is an URL that may help you: https://fake.url. See you! :D";

    public function testThatSimpleLineIsCreated(): void
    {
        $zoomChatLine = ZoomChatLine::fromString(self::EXPECTED_DATETIME . "	 De  " . self::EXPECTED_USERNAME . " : " . self::EXPECTED_SHORT_MESSAGE);

        $this->assertSame(self::EXPECTED_DATETIME, $zoomChatLine->datetimeOfLine()->format('H:i:s'));
        $this->assertSame(self::EXPECTED_USERNAME, $zoomChatLine->username());
        $this->assertSame(self::EXPECTED_SHORT_MESSAGE, $zoomChatLine->message());
    }

    public function testThatLargeLineIsCreated(): void
    {
        $zoomChatLine = ZoomChatLine::fromString(self::ANOTHER_EXPECTED_DATETIME . "	 De  " . self::EXPECTED_USERNAME . " : " . self::EXPECTED_LARGE_MESSAGE);

        $this->assertSame(self::ANOTHER_EXPECTED_DATETIME, $zoomChatLine->datetimeOfLine()->format('H:i:s'));
        $this->assertSame(self::EXPECTED_USERNAME, $zoomChatLine->username());
        $this->assertSame(self::EXPECTED_LARGE_MESSAGE, $zoomChatLine->message());
    }

    public function testThatEnglishLineIsCreated(): void
    {
        $zoomChatLine = ZoomChatLine::fromString(self::ANOTHER_EXPECTED_DATETIME . "	 From  " . self::EXPECTED_USERNAME . " : " . self::EXPECTED_LARGE_MESSAGE);

        $this->assertSame(self::ANOTHER_EXPECTED_DATETIME, $zoomChatLine->datetimeOfLine()->format('H:i:s'));
        $this->assertSame(self::EXPECTED_USERNAME, $zoomChatLine->username());
        $this->assertSame(self::EXPECTED_LARGE_MESSAGE, $zoomChatLine->message());
    }
}
