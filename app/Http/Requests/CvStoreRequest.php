<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CvStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => [],
            'father_name' => [],
            'surname' => [],
            'birth_date' => [],
            'university_id' => [],
        ];
    }
}
