<?php

namespace App\Http\Controllers;

use App\Http\Requests\TechSkillStoreRequest;
use App\Http\Resources\TechSKillResource;
use App\Models\TechSkill;
use Illuminate\Http\Request;

class TechSkillController extends Controller
{
    public function index(Request $request)
    {
        return TechSKillResource::collection(TechSKill::all());
    }

    public function store(TechSkillStoreRequest $request)
    {
        $data = $request->validated();
        $skill = TechSkill::create($data);

        return new TechSKillResource($skill);
    }
}
