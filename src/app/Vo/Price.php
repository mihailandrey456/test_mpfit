<?php

namespace App\Vo;

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
        $price = str_replace(',', '', str_replace('.', '', $input));
        if (!ctype_digit($price)) {
        	throw new Exception("Unexpected price value: " . $input);
        }
        $price = intval($price);
        return new Price($price / 100, $price % 100);
	}

	public function __toString(): string
	{
		if ($this->kopeck === 0) {
			return $this->rubles;
		}
		return sprintf("%d,%d", $this->rubles, $this->kopeck);
	}
}