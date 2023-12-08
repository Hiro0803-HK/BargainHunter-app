<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //パラメータの内容に対してルールを決める
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|unique:books|max:100',
            'price' => 'numeric|min:1|max:999999',
        ];
    }
}
