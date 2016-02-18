<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
           
            'title' => 'required',
            'price' => 'required|numeric',
            'slug' => 'string',
            'quantity'=>'required|numeric',
            'abstract' => 'string',
            'description' => 'string',
            'category_id' => 'numeric',
            'status' => 'required|string',
            'image'=>'image|max:3000',

       
        ];
    }
}
