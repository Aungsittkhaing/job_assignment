<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // "name" => "required",
            // "price" => "required",
            // "description" => "required",
            // "category_id" => "required",
            // "user_id" => "required",
            // "ph_no" => "required",
            // "publish" => "required",
            // "item_photo" => "required",
            // "owner_name" => "required",
            // "address" => "required"
        ];
    }
}
