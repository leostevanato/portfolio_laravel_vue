<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages_json = json_decode(file_get_contents(storage_path() . "/languages.json"), true);

        $languages = array();

        foreach($languages_json as $item) {
            $languages[] = array("value" => $item["code"], "text" => $item["name"]);
        }

        return $languages;
    }

    /**
     * Get the specified resource.
     *
     * @param  int|string  $id_code
     * @return \Illuminate\Http\Response
     */
    public function getLanguage($id_code=null)
    {
        if(is_numeric($id_code)) {
            $key = "id";
            $id_code = intval($id_code);
        } else {
            $key = "code";
        }
        
        $languages_json = json_decode(file_get_contents(storage_path() . "/languages.json"), true);
        
        foreach($languages_json as $item) {
            if($item[$key] === $id_code) {
                return json_encode($item);
            }
        }

        return json_encode(["key" => $key, "idCode" => $id_code]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
