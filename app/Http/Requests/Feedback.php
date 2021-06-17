<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Feedback extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

                'name' => ['required'],
                'order' => ['required']

        ];
    }
    public function messages(): array
    {
        return [
            'required' => ":attribute не должно быть пустым"
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'order' => 'Комментарий'
        ];
    }
}
