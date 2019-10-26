<?php

declare(strict_types=1);

namespace SessionEncoderDecoderTest\Unit;

use SessionEncoderDecoder\PSR7Session;

/**
 * Class EncoderTest
 * @package SessionEncoderDecoderTest\Unit
 * @covers \SessionEncoderDecoder\PSR7Session
 */
class DecoderTest extends TestCase
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
	 * @dataProvider provideEncodeAndExpectedDecodedData
	 * @param string $encodedString
	 * @param array $expected
	 * @throws \SessionEncoderDecoder\Exceptions\InvalidFormatException
	 */
	public function it_should_decoded_data_correctly(string $encodedString, array $expected): void
	{
		$actual = $this->session->decoder($encodedString);

		self::assertEquals($expected, $actual);
	}

	/**
	 * @return array
	 */
	public function provideEncodeAndExpectedDecodedData() : array
	{
		return [
			[
				'',
				[],
			],
			[
				'visits|i:0;',
				['visits' => 0],
			],
			[
				'user_id|s:3:"389";profile_id|i:27;',
				[
					'user_id' => '389',
					'profile_id' => 27,
				],
			],
			[
				'index|i:1;enabled|b:1;quantity|i:2;product|O:8:"stdClass":3:{s:2:"id";i:41;s:5:"price";i:30;s:4:"unit";s:5:"piece";}',
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
			],
		];
	}
}