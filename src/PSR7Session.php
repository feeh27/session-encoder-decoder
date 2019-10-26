<?php

declare(strict_types=1);

namespace SessionEncoderDecoder;

/**
 * Class PSR7Session
 * @package SessionEncoderDecoder
 */
final class PSR7Session implements Contracts\PSR7SessionInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function encoder(array $decodedData): string
	{
		$encodedData = '';

		if (!empty($decodedData)) {
			foreach ($decodedData as $key => $value) {
				$encodedData .= $key . '|' . serialize($value);
			}
		}

		return $encodedData;
	}

	/**
	 * {@inheritDoc}
	 * @throws \SessionEncoderDecoder\Exceptions\InvalidFormatException
	 */
	public function decoder(string $encodedData): array
	{
		$decodedData = [];

		if (!($encodedData === '')) {
			$offset = 0;

			while ($offset < strlen($encodedData)) {
				if (!strstr(substr($encodedData, $offset), "|")) {
					throw new Exceptions\InvalidFormatException(substr($encodedData, $offset));
				}

				$num = strpos($encodedData, "|", $offset) - $offset;
				$key = substr($encodedData, $offset, $num);
				$offset += $num + 1;

				$data = unserialize(substr($encodedData, $offset));
				$offset += strlen(serialize($data));

				$decodedData[$key] = $data;
			}
		}

		return $decodedData;
	}
}