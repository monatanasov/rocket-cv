<?php

namespace App\Http\Controllers;

use App\Http\Requests\CvStoreRequest;
use App\Http\Resources\CvResource;
use App\Models\CV;
use Inertia\Inertia;

class CvController extends Controller
{
    public function index()
    {
        $cvList = CV::All();

        return Inertia::render('Dashboard', [
            'cvList' => CvResource::collection($cvList->load('university')),
        ]);
    }

    public function store(CvStoreRequest $request)
    {
        $cv = Cv::create($request->validated());

        return new CvResource($cv);
    }
}
