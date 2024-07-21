<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CvIndexRequest extends FormRequest
{
    const WHERE_START_DATE = 'whereStartDate';
    const WHERE_END_DATE = 'whereEndDate';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::WHERE_START_DATE => [
                'required_with:' . self::WHERE_END_DATE,
                'nullable',
                'date',
            ],
            self::WHERE_END_DATE => [
                'required_with:' . self::WHERE_START_DATE,
                'nullable',
                'date',
                'after:whereStartDate',
            ],
        ];
    }
}
