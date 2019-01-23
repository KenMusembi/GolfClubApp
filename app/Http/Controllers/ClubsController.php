<?php

namespace App\Http\Controllers;

use App\Clubs;
use Illuminate\Http\Request;

class ClubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // get all the nerds
      $clubs = Clubs::all();

      // load the view and pass the nerds
      return View('index')
          ->with('clubs', $clubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Clubs  $clubs
     * @return \Illuminate\Http\Response
     */
    public function show(Clubs $clubs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clubs  $clubs
     * @return \Illuminate\Http\Response
     */
    public function edit(Clubs $clubs)
    {
        //


    // Pass to view
    return view('index')->with("userData",$userData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clubs  $clubs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clubs $clubs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clubs  $clubs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clubs $clubs)
    {
        //
    }
}
