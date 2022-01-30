<?php

namespace Victormln\ZoomChatToSrt\Tests;

use PHPUnit\Framework\TestCase;
use Victormln\ZoomChatToSrt\ZoomChat;
use Victormln\ZoomChatToSrt\ZoomChatConverter;

class MainTest extends TestCase
{
    private const INPUT_PATH_OF_CHAT = __DIR__ . '/' . '../chat.txt';
    private const OUTPUT_PATH_OF_SRT = __DIR__ . '/' . '../chat.srt';
    private const EXPECTED_SRT_FILE = __DIR__ . '/' . 'fixtures/expected_srt.srt';

    public function testGivenChatFileGeneratesValidSrtFile(): void
    {
        $zoomChatConverter = (new ZoomChatConverter(
            new ZoomChat(self::INPUT_PATH_OF_CHAT)
        ));
        $zoomChatConverter->toSrt(self::OUTPUT_PATH_OF_SRT);

        $this->assertFileExists(self::OUTPUT_PATH_OF_SRT);
        $this->assertFileEquals(self::EXPECTED_SRT_FILE, self::OUTPUT_PATH_OF_SRT);
    }
}
