<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Inertia\Inertia;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Works/Index', [
            'works' => Work::all()->map(fn($works) => [
                'id' => $works->id,
                'title' => $works->title
            ])
        ]);
    }

    /**
     * Display a listing of the resource in frontend.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return Inertia::render('Works/List', [
            'works' => Work::all()->map(fn($works) => [
                'id' => $works->id,
                'title' => $works->title,
                'slug' => $works->slug,
                'description' => $works->description,
                'url' => $works->url,
                'image' => $works->image,
                'skills' => $works->skills->makeHidden(['created_at', 'updated_at', 'pivot'])
            ])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Works/Create', [
            'skills' => DB::table('skills')->select('id', 'title')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkRequest $request)
    {
        $validated = $request->validated();

        $work = Work::create($validated);

        $work->skills()->attach($request->skills);

        $work->save();

        return redirect()->route('works.index')->with('message', 'Work created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        $props = compact('work');
        $props['skills'] = DB::table('skills')->select('id', 'title')->get();

        return Inertia::render('Works/Edit', $props);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkRequest  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkRequest $request, Work $work)
    {
        $validated = $request->validated();

        $skills_array = [];

        foreach($request->skills as $skill) {
            $skills_array[] = $skill;
        }
        
        $work->skills()->sync($skills_array);

        $work->update($validated);

        return redirect()->route('works.edit', $work->id)->with('message', 'Work updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }
}
