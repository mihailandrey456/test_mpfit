<?php

namespace App\Vo;

use Exception;

final class Price
{
	public function __construct(
		public readonly int $rubles, 
		public readonly int $kopeck
	)
	{
		$this->assertValidKopeck($kopeck);
	}

	private function assertValidKopeck(int $kopeck): void
	{
		if ($kopeck < 0 || $kopeck > 99) {
			throw new Exception("Invalid kopeck value: " . $kopeck);
		}
	}

	public static function fromRawInput(string $input): Price
	{
		$re = '/^(\d+)([,.]\d{0,2})?$/';
		if (preg_match($re, $input, $matches) !== 1) {
        	throw new Exception("Unexpected price value: " . $input);
		}
		$rubles = intval($matches[1]);
		$kopecks = intval(str_replace(',', '', str_replace('.', '', $matches[2])));
        return new Price($rubles, $kopecks);
	}

	public function __toString(): string
	{
		if ($this->kopeck === 0) {
			return $this->rubles;
		}
		return sprintf("%d,%02d", $this->rubles, $this->kopeck);
	}

	public function multiple(int $by): Price
	{
		if ($by < 0) {
			throw new Exception("Unexpected multiple by value: " . $by);
		}

		$rubles = $this->rubles * $by;
		$kopecks = $this->kopeck * $by;
		return new Price($rubles + $kopecks / 100, $kopecks % 100);
	}
}