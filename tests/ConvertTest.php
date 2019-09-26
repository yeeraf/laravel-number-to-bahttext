<?php

namespace Yeeraf\Thaibaht\Tests;

use PHPUnit\Framework\TestCase;
use Yeeraf\Thaibaht\Thaibaht;

class ConvertTest extends TestCase
{
    /** @test */
	public function convert_text()
	{
		$thaibaht = new Thaibaht;
		$text = $thaibaht->convertToText(100);
		$this->assertEquals('หนึ่งร้อยบาท', $text);

		$text = $thaibaht->convertToText(200);
		$this->assertEquals('สองร้อยบาท', $text);

		$text = $thaibaht->convertToText(321);
		$this->assertEquals('สามร้อยยี่สิบเอ็ดบาท', $text);

		$text = $thaibaht->convertToText(2000000000);
		$this->assertEquals('สองพันล้านบาท', $text);
	}
}
