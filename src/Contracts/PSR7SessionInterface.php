<?php

declare(strict_types=1);

namespace SessionEncoderDecoder\Contracts;

/**
 * Interface PSR7SessionInterface
 * @package SessionEncoderDecoder\Contracts
 */
interface PSR7SessionInterface
{
	/**
	 * @param array $decoded_data
	 * @return string
	 */
	public function encoder(array $decoded_data): string;

	/**
	 * @param string $encoded_data
	 * @return array
	 */
	public function decoder(string $encoded_data): array;
}