<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Portfolios/Index', [
            'portfolios' => Portfolio::all()->map(fn ($portfolios) => [
                'id' => $portfolios->id,
                'title' => $portfolios->title,
                'language' => $portfolios->language
            ])
        ]);
    }

    /**
     * Display a listing of the resource in the frontend.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return Inertia::render('Portfolios/List', [
            'portfolios' => Portfolio::where('visible', 1)->get()->map(fn ($portfolios) => [
                'id' => $portfolios->id,
                'title' => $portfolios->title,
                'language' => $portfolios->language,
                'description' => $portfolios->description
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
        // Code to consume internal API
        // $request = Request::create(url('/api/languages'), 'GET');
        // $response = app()->handle($request)->getData();
        // dd($response);

        return Inertia::render('Portfolios/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePortfolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfolioRequest $request)
    {
        $validated = $request->validated();

        Portfolio::create($validated);

        return redirect()->route('portfolios.index')->with('message', 'Portfolio created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Inertia::render('Portfolios/Show', [
            'portfolio' => Portfolio::select('id', 'title', 'language', 'description')->where('visible', 1)->with(['works' => function($query) {
                $query->select('id','portfolio_id','title','slug','description','url','image')->where('visible', 1);
            }])->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return Inertia::render('Portfolios/Edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePortfolioRequest  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $validated = $request->validated();
        $portfolio->update($validated);

        return redirect()->route('portfolios.edit', $portfolio->id)->with('message', 'Portfolio updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}
