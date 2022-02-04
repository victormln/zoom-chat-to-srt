<?php

namespace Victormln\ZoomChatToSrt\Tests;

use PHPUnit\Framework\TestCase;
use Victormln\ZoomChatToSrt\ZoomChat;
use Victormln\ZoomChatToSrt\ZoomChatConverter;
use Victormln\ZoomChatToSrt\ZoomConverterConfig;

class MainTest extends TestCase
{
    private const INPUT_PATH_OF_CHAT = __DIR__ . '/' . '../chat.txt';
    private const OUTPUT_PATH_OF_SRT = __DIR__ . '/' . '../chat.srt';
    private const EXPECTED_SRT_FILE = __DIR__ . '/' . 'fixtures/expected_srt.srt';

    private const INPUT_PATH_OF_CHAT_WITH_OVERLAPPING = __DIR__ . '/' . '../chat_with_overlapping.txt';
    private const OUTPUT_PATH_OF_SRT_WITH_OVERLAPPING = __DIR__ . '/' . '../chat_with_overlapping.srt';
    private const EXPECTED_SRT_FILE_WITHOUT_OVERLAPPING = __DIR__ . '/' . 'fixtures/expected_srt_without_overlapping.srt';

    public function testGivenChatFileGeneratesValidSrtFile(): void
    {
        $zoomChatConverter = (new ZoomChatConverter(
            new ZoomChat(self::INPUT_PATH_OF_CHAT),
            new ZoomConverterConfig(5, true)
        ));
        $zoomChatConverter->toSrt(self::OUTPUT_PATH_OF_SRT);

        $this->assertFileExists(self::OUTPUT_PATH_OF_SRT);
        $this->assertFileEquals(self::EXPECTED_SRT_FILE, self::OUTPUT_PATH_OF_SRT);
    }

    public function testGivenChatFileGeneratesValidSrtWithoutOverlapping(): void
    {
        $zoomChatConverter = (new ZoomChatConverter(
            new ZoomChat(self::INPUT_PATH_OF_CHAT_WITH_OVERLAPPING),
            new ZoomConverterConfig(10, false)
        ));
        $zoomChatConverter->toSrt(self::OUTPUT_PATH_OF_SRT_WITH_OVERLAPPING);

        $this->assertFileExists(self::OUTPUT_PATH_OF_SRT_WITH_OVERLAPPING);
        $this->assertFileEquals(self::EXPECTED_SRT_FILE_WITHOUT_OVERLAPPING, self::OUTPUT_PATH_OF_SRT_WITH_OVERLAPPING);
    }
}
