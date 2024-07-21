<?php

namespace App\Http\Controllers;

use App\Http\Requests\CvStoreRequest;
use App\Http\Requests\CvIndexRequest;
use App\Http\Resources\CvResource;
use App\Http\Resources\UniversityResource;
use App\Models\CV;
use App\Models\TechSkill;
use App\Models\University;
use Inertia\Inertia;

class CvController extends Controller
{
    public function index(CvIndexRequest $request)
    {
        $cvList = CV::query();

        if (
            array_key_exists(CvIndexRequest::WHERE_START_DATE, $request->validated())
            && array_key_exists(CvIndexRequest::WHERE_END_DATE, $request->validated())
        ) {
            $cvList = $cvList->whereBetween(CV::BIRTH_DATE, [
                $request->validated()[CvIndexRequest::WHERE_START_DATE],
                $request->validated()[CvIndexRequest::WHERE_END_DATE]
            ]);
        }

        if ($request->query('wantsJson')) {
            return CvResource::collection(
                $cvList
                    ->with('university')
                    ->get());
        }

        return Inertia::render('Search', [
            'cvList' => CvResource::collection(
                $cvList
                    ->with('university')
                    ->get()
            ),
        ]);
    }
    public function create()
    {
        $cvList = CV::all();
        $uniList = University::all();
        $techSkillsList = TechSkill::all();

        return Inertia::render('Dashboard', [
            'cvList' => CvResource::collection($cvList->load('university')),
            'uniList' => UniversityResource::collection($uniList),
            'techSkillsList' => UniversityResource::collection($techSkillsList),
        ]);
    }

    public function store(CvStoreRequest $request)
    {
        $cv = Cv::create($request->validated());

        return new CvResource($cv);
    }
}
