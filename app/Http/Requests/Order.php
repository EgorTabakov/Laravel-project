<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Order extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [

            'name' => ['required'],
            'phone' => ['required'],
            'order' => ['required'],
            'email' => ['email']

        ];
    }
    public function messages(): array
    {
        return [
            'requared' => ":attribute не должно быть пустым"
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'order' => 'Заказ на выгрузку'
        ];
    }
}
