<?php

namespace App\Http\Controllers;

use App\Http\Resources\TechSKillResource;
use App\Models\TechSkill;
use Illuminate\Http\Request;

class TechSkillController extends Controller
{
    public function index(Request $request)
    {
        return TechSKillResource::collection(TechSKill::all());
    }

    public function store(Request $request)
    {
        $skill = TechSkill::create([
            TechSkill::NAME => $request->name,
        ]);

        return new TechSKillResource($skill);
    }
}
