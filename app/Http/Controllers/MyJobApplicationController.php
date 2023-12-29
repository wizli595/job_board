<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(User $user)
    {
        $applications = request()->user()
            ->jobApplications()
            ->with([
                'job.employer',
                'job' => fn ($query) => $query->withCount('jobApplications')
                    ->withAvg('jobApplications', 'expected_salary')->withTrashed()
            ])
            ->latest()->get();
        // dd($applications);
        return view('myJobApplications.index', ['applications' => $applications]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $MyJobApplication)
    {
        // dd($MyJobApplication);
        $MyJobApplication->delete();

        return redirect()->back()->with(
            'success',
            'Job application removed.'
        );
    }
}
