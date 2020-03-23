<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Source;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return ['message' => 'Success'];
        return Sources::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'source_link' => 'required|string',
            'language' => 'required|string'
        ]);

        return Source::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'source_link' => $request['source_link'],
            'language' => $request['language']
        ]);
    }
}
