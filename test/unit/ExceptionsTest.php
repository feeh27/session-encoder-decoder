<?php

namespace SessionEncoderDecoderTest\Unit;

use Exception;
use SessionEncoderDecoder\Exceptions\InvalidFormatException;
use SessionEncoderDecoder\PSR7Session;

/**
 * Class ExceptionsTest
 * @package SessionEncoderDecoderTest\Unit
 * @cover \SessionEncoderDecoder\Exceptions\InvalidFormatException
 */
class ExceptionsTest extends TestCase
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
	 */
	public function testException(string $encodedString, array $expected)
	{
		try {
			$actual = $this->session->decoder($encodedString);
			self::assertEquals($expected, $actual);
		} catch (Exception $e) {
			self::assertTrue($e instanceof InvalidFormatException);
		}
	}

	/**
	 * @return array
	 */
	public function provideEncodeAndExpectedDecodedData() : array
	{
		return [
			[
				'dfsads;dsaads',
				[],
			],
		];
	}
}
