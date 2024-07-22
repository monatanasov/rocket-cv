<?php

namespace App\Http\Resources;

use App\Models\TechSkill;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TechSKillResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->{TechSkill::ID},
            'name' => $this->{TechSkill::NAME},
        ];
    }
}
