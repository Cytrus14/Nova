<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'productName' => array('required', 'max:56'),
            'productPrice' => array('required', 'regex:/^\d+(\.)?(\d){0,2}$/'),
            'productQuantity' => array('required', 'regex:/^\d+$/'),
            'productDescriptionSummary' => 'max:400',
            'productDescription' => '',
            'productCategories' => array('required', 'min:1'),
            'priceTag' => 'required',
            'categoryTag' => 'required'
        ];
    }
}
