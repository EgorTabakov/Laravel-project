<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreate extends FormRequest
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
    public function rules(): array
    {
        return [

            'title' => ['required', 'string', 'min:10'],
            'description' => ['required']

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
            'title' => 'Заголовок категории'
        ];
    }
}
