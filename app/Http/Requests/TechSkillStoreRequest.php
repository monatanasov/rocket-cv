<?php

namespace App\Http\Requests;

use App\Models\TechSkill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TechSkillStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:20',
                Rule::unique(TechSkill::TABLE, TechSkill::NAME),
            ],
        ];
    }
}
