<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
        $product = Product::where(['slug'=> $this->product])->firstOrFail();

        return [
            'category_id'       =>  ['required','exists:categories,id'],
            'title'         =>  ['required', 'unique:products,title,'.$product->id],
            'dimension'     =>  ['required',],
            'origin'        =>  ['required'],
            'price'         =>  ['nullable', 'numeric'],
            'description'         =>  ['required','min:10'],
            'metadata'         =>  ['nullable',],
        ];
    }
}
