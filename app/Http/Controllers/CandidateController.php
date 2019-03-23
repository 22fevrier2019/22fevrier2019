<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;


class CandidateController extends Controller
{
    public function show(Request $request, $slug)
    {
        $candidate = Candidate::where('slug', $slug)
            ->withCount('likes')
            ->firstOrFail();

        return view('front_office.candidate.show', [
            'candidate' => $candidate,
        ]);
    }

    public function index()
    {

        //todo orderBy
        $candidates = Candidate::ByOrder('popular')
            ->withCount('likes')->get();

        return view('front_office.candidate.index', [
            'candidates' => $candidates,
        ]);
    }
}
