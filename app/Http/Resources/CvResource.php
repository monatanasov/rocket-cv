<?php

namespace App\Http\Resources;

use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CvResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->{CV::ID},
            'first_name' => $this->{CV::FIRST_NAME},
            'middle_name' => $this->{CV::FATHER_NAME},
            'last_name' => $this->{CV::SURNAME},
            'birthDate' => $this->{CV::BIRTH_DATE},
            'university' => new UniversityResource($this->whenLoaded('university'))
        ];
    }
}
