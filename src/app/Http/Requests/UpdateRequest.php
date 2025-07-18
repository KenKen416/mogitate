<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:10000',
            'seasons' => 'required|array|min:1',
            'seasons.*' => 'exists:seasons,id',
            'description' => 'required|string|max:120',
            'image' => 'nullable|mimes:jpeg,png'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.numeric' => '数値で入力してください',
            'price.min' => '0~10000円以内で入力してください',
            'price.max' => '0~10000円以内で入力してください',

            'seasons.required' => '季節を選択してください',
            'seasons.*.exists' => '無効な季節が含まれています',

            'description.required' => '商品説明を入力してください',
            'description.max' => '120文字以内で入力してください',

            'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
        ];
    }
}
