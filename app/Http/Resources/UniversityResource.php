<?php

namespace App\Http\Resources;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UniversityResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->{University::ID},
            'name' => $this->{University::NAME},
            'evaluation' => $this->{University::EVALUATION},
        ];
    }
}
