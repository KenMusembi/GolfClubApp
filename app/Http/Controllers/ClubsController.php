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
use Mail;
use Auth;

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
            
            $clubs = Clubs::join('clubs_registrations','clubs_registrations.club_id','=','clubs.id')
            //->join()
            ->select('clubs.id', 'clubs.club_name','clubs.description')->groupby('clubs.id');
            return Datatables::of($clubs)
            ->addColumn('action', function ($club)
           {
                    if($club->status == 'pending')
                    {
                                            return '<a href="#" class="btn btn-xs btn-warning pending" id='.$club->id.'><i class="glyphicon glyphicon-plus"></i> Pending</a>'  ;

                    }
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
          ->where('clubs_registrations.status','approved')
          //->pluck('club_name')
          //->groupby('users.id')
         ->select('name', DB::raw("GROUP_CONCAT( club_name SEPARATOR ' , ') as clubs"))
          ->groupby('users.id')
          ->distinct()
          ->get();
          return response()->json(['data' => $myclubs]);
     }

public  function clubhistory(Request $request)
     {   
     $user_id = Auth::user()->id;    
     //var_dump($user_id);
       $history = ClubsRegistration::join('clubs','clubs_registrations.club_id','=','clubs.id')
            //->join()
            ->select('clubs.club_name','clubs_registrations.created_at', 'clubs_registrations.updated_at','clubs_registrations.status')->where('user_id',$user_id);
            return Datatables::of($history)->make(true);

     }


 public  function admin_enroll(Request $request, $user_id)
     {       
        $checker = DB::table('clubs_registrations')->where('user_id', $user_id)->where('club_id',  $request->get('id'))->select('clubs_registrations.id')->count();
  if($checker == 0){
$enrollment = new ClubsRegistration ([
      'user_id'    => $user_id,
      'club_id'     =>  $request->get('id')
          ]);
                $enrollment->save();

     } else {
        return "Duplicate Entry";
     }
 }

public function admin_view()
{
     $admin_view = ClubsRegistration::join('users','users.id','=','clubs_registrations.user_id')
     ->join('clubs','clubs.id','=','clubs_registrations.club_id')
     ->select('clubs_registrations.id', 'users.name','clubs.club_name', 'clubs_registrations.status');
            return Datatables::of($admin_view)
            ->addColumn('action', function ($admin)
           {
                    if($admin->status == 'pending'){
                    return '<a href="#" class="btn btn-xs btn-warning approve" id='.$admin->id.'><i class="glyphicon glyphicon-plus"></i> Approve</a>
<a href="#" class="btn btn-xs btn-danger deny" id='.$admin->id.'><i class="glyphicon glyphicon-plus"></i> Deny</a>

                    '  ;}
                    if($admin->status == 'approved'){
                    return '
<a href="#" class="btn btn-xs btn-danger deny" id='.$admin->id.'><i class="glyphicon glyphicon-plus"></i> Deny</a>

                    '  ;}
                    if($admin->status == 'denied'){
                    return '
<a href="#" class="btn btn-xs btn-warning approve" id='.$admin->id.'><i class="glyphicon glyphicon-plus"></i> Approve</a>

                    '  ;}
              ;
           })->make(true);
}

 public  function admin_approve(Request $request)
     {       
       
$id = $request->input('id');
//var_dump($id);
 $checker = DB::table('clubs_registrations')->join('users','users.id','=','clubs_registrations.user_id')->where('club_id',  $request->get('id'))->select('clubs_registrations.id')->count();
  if($checker == 0){
 $clubs_registrations = ClubsRegistration::find($request->get('id'));                            
                $clubs_registrations->status = 'approved';               
                $clubs_registrations->save();
}
$sendmail = DB::table('clubs_registrations')        
       ->leftjoin('users', 'users.id', '=','clubs_registrations.user_id')
          ->where('clubs_registrations.id',$request->input('id'))
          //->pluck('club_name')
          //->groupby('users.id')
         ->select('users.email')
          ->get(); 
          var_dump($sendmail);

$to_email = $sendmail->first()->email;
$data = array('title'=>"Hello", "body" => "Test mail");
    
Mail::send('emails.welcome', $data, function($message) use ($to_email) {
    $message->to($to_email)
            ->subject('Golf Club Club Enrollment Notificcation');
    $message->from('kenmusembi21@gmail.com','Golf Club');
});

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

    $sendmail = DB::table('clubs_registrations')        
       ->leftjoin('users', 'users.id', '=','clubs_registrations.user_id')
          ->where('clubs_registrations.id',$request->input('id'))
          //->pluck('club_name')
          //->groupby('users.id')
         ->select('users.email')
          ->get(); 
          var_dump($sendmail);

$to_email = $sendmail->first()->email;
$data = array('title'=>"Hello", "body" => "Test mail");
    
Mail::send('emails.deny', $data, function($message) use ($to_email) {
    $message->to($to_email)
            ->subject('Golf Club Club Enrollment Denial Notification');
    $message->from('kenmusembi21@gmail.com','Golf Club');
});

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
