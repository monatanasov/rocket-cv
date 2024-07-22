<?php

namespace App\Http\Controllers;

use App\Http\Resources\UniversityResource;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index(Request $request)
    {
        return UniversityResource::collection(University::all());
    }

    public function store(Request $request)
    {
        $university = University::create([
            University::NAME => $request->name,
            University::EVALUATION => $request->evaluation,
        ]);

        return new UniversityResource($university);
    }
}
