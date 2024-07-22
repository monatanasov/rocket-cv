<?php

namespace App\Http\Requests;

use App\Models\TechSkill;
use App\Models\University;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CvStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'father_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'surname' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'birth_date' => [
                'required',
                'date',
                'before:today',
            ],
            'university_id' => [
                'nullable',
                Rule::exists(University::TABLE, University::ID),
            ],
            'skills' => [
                'required',
                'array',
            ],
            'skills.*' => [
                Rule::exists(TechSkill::TABLE, TechSkill::ID),
                'distinct',
            ],
        ];
    }
}
