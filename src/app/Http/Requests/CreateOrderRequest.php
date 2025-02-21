<?php

namespace App\Http\Requests;

use App\Dto\CreateOrderDto;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Правила проверки запроса.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'consumer_name' => ['required', 'string', 'max:255'],
            'product_id' => ['required', 'integer'],
            'count' => ['required', 'integer', 'min:1'],
            'comment' => ['nullable', 'string'],
        ];
    }

    public function toDto(): CreateOrderDto
    {
        return new CreateOrderDto(
            $this->consumer_name,
            $this->product_id,
            $this->count,
            $this->comment ?? '',
        );
    }
}