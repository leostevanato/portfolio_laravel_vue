<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use Illuminate\Support\Facades\DB;
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
            'portfolios' => Portfolio::all()->map(fn($portfolios) => [
                'id' => $portfolios->id,
                'title' => $portfolios->title,
                'language' => $portfolios->language
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
        return Inertia::render('Portfolios/List', [
            'portfolios' => Portfolio::all()->map(fn($portfolios) => [
                'id' => $portfolios->id,
                'title' => $portfolios->title,
                'language' => $portfolios->language,
                'description' => $portfolios->description,
                'works' => $portfolios->works->makeHidden(['created_at', 'updated_at', 'pivot'])
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
    public function show(Portfolio $portfolio)
    {
        //
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
