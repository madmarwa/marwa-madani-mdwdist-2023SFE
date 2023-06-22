<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'produit' => 'required|unique:products,produit->ar,'.$this->id,
            'produit_en' => 'required|unique:products,produit->fr,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'produit.required' => trans('validation.required'),
            'produit.unique' => trans('validation.unique'),
            'produit_en.required' => trans('validation.required'),
            'produit_en.unique' => trans('validation.unique'),
        ];
    }
}
