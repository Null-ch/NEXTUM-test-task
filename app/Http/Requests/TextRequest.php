<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TextRequest extends FormRequest
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
            'title' => 'required',
            'content-1' => 'required',
            'content-2' => 'required',
            'content-3' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле должно быть заполнено',
            'content-1.required' => 'Это поле должно быть заполнено',
            'content-2.required' => 'Это поле должно быть заполнено',
            'content-3.required' => 'Это поле должно быть заполнено',
        ];
    }
}
