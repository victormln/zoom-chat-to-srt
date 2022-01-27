<?php

namespace Victormln\ZoomChatToSrt\Tests;

use PHPUnit\Framework\TestCase;
use Victormln\ZoomChatToSrt\ZoomChat;
use Victormln\ZoomChatToSrt\ZoomChatConverter;

class MainTest extends TestCase
{
    private const INPUT_PATH_OF_CHAT = '../chat.txt';
    private const OUTPUT_PATH_OF_SRT = '../chat.srt';
    private const EXPECTED_SRT_FILE = 'fixtures/expected_srt.srt';

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
