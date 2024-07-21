<?php

namespace App\Http\Controllers;

use App\Http\Resources\CvResource;
use App\Models\CV;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function index()
    {
        $cvList = CV::all();

        return Inertia::render('Search', [
            'cvList' => CvResource::collection($cvList->load('university')),
        ]);
    }
}
