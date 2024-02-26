<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStockMasterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'stock_ids' => 'required|array',
            'stock_ids.*.branch_id' => [
                'required',
                'numeric',
                'exists:store_branches,id'
            ],
            'stock_ids.*.item_code' => [
                'required',
                'string',
            ],
            'stock_ids.*.item_name' => [
                'required',
                'string',
            ],
            'stock_ids.*.quantity' => [
                'required',
                'numeric',
            ],
            'stock_ids.*.location' => [
                'required',
                'string',
            ],
            'stock_ids.*.in_stock_date' => [
                '',
                '',
            ],
        ];
    }
}
