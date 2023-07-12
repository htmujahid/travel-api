<?php

namespace App\Http\Requests;

use App\Models\Travel;
use Illuminate\Foundation\Http\FormRequest;

class TravelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'is_public' => ['boolean'],
            'name' => ['required', 'unique:'.Travel::class],
            'description' => ['required'],
            'number_of_days' => ['required', 'integer'],
        ];
    }
}
