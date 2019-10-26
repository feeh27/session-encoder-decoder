<?php

declare(strict_types=1);

namespace SessionEncoderDecoderTest\Unit;

use SessionEncoderDecoder\PSR7Session;

/**
 * Class EncoderTest
 * @package SessionEncoderDecoderTest\Unit
 * @covers \SessionEncoderDecoder\PSR7Session
 */
class EncoderTest extends TestCase
{
	/**
	 * @var \SessionEncoderDecoder\PSR7Session
	 */
	private $session;

	/**
	 * @return void
	 */
	public function setUp(): void
	{
		parent::setUp();

		$this->session = new PSR7Session();
	}

	/**
	 * @test
	 * @dataProvider provideDecodeAndExpectedEncodedData
	 * @param array $decodedString
	 * @param string $expected
	 */
	public function it_should_encoded_data_correctly(array $decodedString, string $expected): void
	{
		$actual = $this->session->encoder($decodedString);

		self::assertEquals($expected, $actual);
	}

	/**
	 * @return array
	 */
	public function provideDecodeAndExpectedEncodedData() : array
	{
		return [
			[
				[],
				'',
			],
			[
				['visits' => 0],
				'visits|i:0;',
			],
			[
				[
					'user_id' => '389',
					'profile_id' => 27,
				],
				'user_id|s:3:"389";profile_id|i:27;',
			],
			[
				[
					'index' => 1,
					'enabled' => true,
					'quantity' => 2,
					'product' => (object) [
						'id' => 41,
						'price' => 30,
						'unit' => 'piece',
					],
				],
				'index|i:1;enabled|b:1;quantity|i:2;product|O:8:"stdClass":3:{s:2:"id";i:41;s:5:"price";i:30;s:4:"unit";s:5:"piece";}',
			],
		];
	}
}