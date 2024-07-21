<?php

namespace App\Http\Controllers;

use App\Http\Requests\CvStoreRequest;
use App\Http\Resources\CvResource;
use App\Http\Resources\UniversityResource;
use App\Models\CV;
use App\Models\University;
use Inertia\Inertia;

class CvController extends Controller
{
    public function index()
    {
        $cvList = CV::all();
        $uniList = University::all();

        return Inertia::render('Dashboard', [
            'cvList' => CvResource::collection($cvList->load('university')),
            'uniList' => UniversityResource::collection($uniList)
        ]);
    }

    public function store(CvStoreRequest $request)
    {
        $cv = Cv::create($request->validated());

        return new CvResource($cv);
    }
}
