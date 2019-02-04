<?php

namespace App\Http\Controllers;

use App\Clubs;
use Illuminate\Http\Request;
use App\DataTables\ClubsDataTable;
use Yajra\DataTables\DataTables;
use DB;
use Validator;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClubsRegistration;

class ClubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //  $clubs = Clubs::all();

      // load the view and pass the nerds

return View('clubs');
    }


 public function index2()
    {   

return View('admin');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getdata()
    {
      //function to get data from databse and display as dataTables
            
            $clubs = Clubs::select('clubs.id', 'clubs.club_name','clubs.description');
            return Datatables::of($clubs)
            ->addColumn('action', function ($club)
           {

                    return '<a href="#" class="btn btn-xs btn-warning enroll" id='.$club->id.'><i class="glyphicon glyphicon-plus"></i> Enroll</a>'  
              ;
           })->make(true);
    }

    public  function myclubs(Request $request, $user_id)
     {       
       $myclubs = DB::table('clubs_registrations')
        ->leftjoin('clubs','clubs.id','=','clubs_registrations.club_id')
       ->leftjoin('users', 'users.id', '=','clubs_registrations.user_id')
          ->where('users.id', $user_id)
          //->pluck('club_name')
          //->groupby('users.id')
         ->select(DB::raw("GROUP_CONCAT( club_name SEPARATOR ' , ') as clubs"))
          ->groupby('users.id')
          ->distinct()
          ->get();
          return response()->json(['data' => $myclubs]);
var_dump($user_id);
var_dump($id);
var_dump($myclubs);
     }

 public  function admin_enroll(Request $request, $user_id)
     {       
       
$enrollment = new ClubsRegistration ([
      'user_id'    => $user_id,
      'club_id'     =>  $request->get('id')
          ]);
                $enrollment->save();

     }

public function admin_view()
{
     $admin_view = ClubsRegistration::select('clubs_registrations.id', 'clubs_registrations.user_id','clubs_registrations.club_id', 'clubs_registrations.status');
            return Datatables::of($admin_view)
            ->addColumn('action', function ($admin)
           {

                    return '<a href="#" class="btn btn-xs btn-warning approve" id='.$admin->id.'><i class="glyphicon glyphicon-plus"></i> Approve</a>
<a href="#" class="btn btn-xs btn-danger deny" id='.$admin->id.'><i class="glyphicon glyphicon-plus"></i> Deny</a>

                    '  
              ;
           })->make(true);
}

 public  function admin_approve(Request $request)
     {       
       
$id = $request->input('id');
//var_dump($id);
 $clubs_registrations = ClubsRegistration::find($request->get('id'));
              //  $clubs_registrations->user_id = $request->get('user_id');               
               // $clubs_registrations->club_id = $request->get('club_id');               
                $clubs_registrations->status = 'approved';               
                $clubs_registrations->save();

    }

    public  function admin_deny(Request $request)
     {       
       
$id = $request->input('id');
//var_dump($id);
 $clubs_registrations = ClubsRegistration::find($request->get('id'));
              //  $clubs_registrations->user_id = $request->get('user_id');               
               // $clubs_registrations->club_id = $request->get('club_id');               
                $clubs_registrations->status = 'denied';               
                $clubs_registrations->save();

    }

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
    return view('clubs')->with("userData",$userData);
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
