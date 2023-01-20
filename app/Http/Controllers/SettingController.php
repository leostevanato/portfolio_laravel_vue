<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Settings/Index', [
            'settings' => Setting::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        /**
         * Upsert method arguments:
         *  - First: values to insert or update
         *  - Second: list of column(s) that uniquely identify records within the associated table
         *  - Third: array of columns that should be updated if a matching record already exists in the database
         */
        // Setting::upsert(
        //     [
        //         ['name' => 'example_site_title', 'value' => 'Hello world'],
        //         ['name' => 'example_portfolio_to_display', 'value' => 1]
        //     ],
        //     ['name'],
        //     ['value']
        // );
    }
}
