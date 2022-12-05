<?php

namespace App\Http\Requests;

use App\Helpers\APIResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreOrderRequest extends FormRequest
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
            'status' => 'required|in:dine-in,delivery,takeaway',
            'items' => 'required|array',
            'items.*.menu_item_id' => 'required|integer|exists:menu_items,id',
            'items.*.quantity' => 'required|integer|min:1|max:99',
            'customer_name' => 'required_if:status,delivery|max:255',
            'customer_phone' => 'required_if:status,delivery|max:255',
            'table_number' => 'required_if:status,dine-in|min:0',
            'waiter_name' => 'required_if:status,dine-in|max:255',
            'fees' => 'required_if:status,delivery,dine-in|min:0',     
        ];
    }

    
    /**
    * Get the error messages for the defined validation rules.*
    * @return array
    */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException( (new APIResponse(422))->set_errors($validator->errors())->build() );
    }
}
