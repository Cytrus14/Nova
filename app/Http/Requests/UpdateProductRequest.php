<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: add actual authorization
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'productName' => 'required',
            'productPrice' => array('required', 'regex:/^\d+(\.)?(\d){0,2}$/'),
            'productQuantity' => array('required', 'regex:/^\d+$/'),
            'productDescriptionSummary' => '',
            'productDescription' => '',
            'productCategories' => array('required', 'min:1'),
            'priceTag' => 'required',
            'categoryTag' => 'required'
        ];
    }
}
