<?php

namespace App\Http\Controllers;

use App\Http\Requests\UniversityStoreRequest;
use App\Http\Resources\UniversityResource;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index(Request $request)
    {
        return UniversityResource::collection(University::all());
    }

    public function store(UniversityStoreRequest $request)
    {
        $data = $request->validated();
        $university = University::create($data);

        return new UniversityResource($university);
    }
}
