<?php

namespace App\Http\Requests;

use App\Dto\SaveProductDto;
use App\Vo\Price;
use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
{
    /**
     * Правила проверки запроса.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'price' => ['required', 'string', 'regex:/^\d+([,.]\d{0,2})?$/'],
            'comment' => ['nullable', 'string'],
        ];
    }

    public function toDto(): SaveProductDto
    {
        return new SaveProductDto(
            $this->name,
            $this->category_id,
            $this->comment ?? '',
            Price::fromRawInput($this->price)
        );
    }
}