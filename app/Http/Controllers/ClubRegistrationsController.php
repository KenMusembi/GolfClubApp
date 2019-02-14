<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClubsRegistration;
use DB;
class ClubRegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('clubsData');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clubsData');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //        
        
             $result = \DB::table('clubs_registrations')
                    ->where('id','!=','1')
                    ->orderBy('club_id', 'ASC')
                    ->get();
        return response()->json($result);  
        return redirect('clubsData');
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

    public function chart()
    {
    /*    $result = \DB::table('clubs_registrations')
                    ->where('id','!=','14')
                    ->orderBy('club_id', 'ASC')
                    ->get();
        return response()->json($result);*/

         $viewer = ClubsRegistration::select(DB::raw("COUNT(club_id) as count"))
        ->orderBy("club_id")
        ->groupBy(DB::raw("club_id"))
        
        ->get()->toArray();
    $viewer = array_column($viewer, 'count');           

    return view('clubsData')
            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK));            
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
