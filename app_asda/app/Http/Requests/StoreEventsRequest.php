<?php

namespace App\Http\Requests;

use App\Models\product;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventsRequest extends FormRequest
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
            'nameEvent_en' => 'required',
            'nameEvent_ar' => 'required',
           
        ];
    }
}
