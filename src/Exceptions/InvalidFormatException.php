<?php

declare(strict_types=1);

namespace SessionEncoderDecoder\Exceptions;

use Exception;
use Throwable;

/**
 * Class InvalidFormatException
 * @package SessionEncoderDecoder\Exceptions
 */
class InvalidFormatException extends Exception
{
	public function __construct(string $message = '', int $code = 0, Throwable $previous = null)
	{
		parent::__construct('Invalid data, remaining: '.$message, $code, $previous);
	}
}