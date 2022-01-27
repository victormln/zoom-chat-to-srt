<?php

namespace Victormln\ZoomChatToSrt\Tests;

use DateInterval;
use DateTimeImmutable;
use Victormln\ZoomChatToSrt\SrtLine;
use PHPUnit\Framework\TestCase;

class SrtLineTest extends TestCase
{
    public function testThatSrtLineIsCreatedSuccessfully(): void
    {
        $startDatetime = DateTimeImmutable::createFromFormat(
            'H:i:s',
            '00:00:00'
        );
        $srtLine = new SrtLine(
            0,
            $startDatetime,
            $startDatetime->add(new DateInterval('PT5S')),
            'Test message'
        );

        $this->assertEquals(
            '0
00:00:00,000000 --> 00:00:05,000000
Test message
',
            $srtLine->toString()
        );
    }
}
