<?php

namespace Modules\Items\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required',
            'quantity' => 'required|numeric'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function ErrorMessages()
    {
        return [
            'name.required' => 'Item is required!',
            'price.required' => 'Price is required!',
            'description.required' => 'Item description is required!'
        ];
    }
}
