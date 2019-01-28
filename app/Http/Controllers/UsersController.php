<?php
$usercluby;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\DataTables\UsersDataTablesEditor;
use Yajra\DataTables\DataTables;
use DB;
use Validator;
use App\User;
use App\Clubs;
use App\ClubsRegistration;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    //
/*public function index(UsersDataTable $dataTable)
  {
      return $dataTable->render('index');

}



  public function store(UsersDataTablesEditor $editor)
  {
      return $editor->process(request());
  }
*/
//custom fann_get_cascade_activation_functions

function index()
    {
     return view('welcome');
     //http://127.0.0:8000/ajaxdata
    }

    function getdata()
    {
     $users = User::select('users.id', 'users.name','users.email');
     return Datatables::of($users)
     ->addColumn('action', function ($user)
    {
        return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$user->id.'"><i class="glyphicon glyphicon-edit"></i> Update</a>
        <a href="#" class="btn btn-xs btn-danger delete" id="'.$user->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>
       <a href="#" class="btn btn-xs btn-success view" id="'.$user->id.'"><i class="glyphicon glyphicon-user"></i> ViewClub</a>
       <a href="#" class="btn btn-xs btn-warning enroll" id="'.$user->id.'"><i class="glyphicon glyphicon-plus"></i> Enroll</a>
       ';
    })->make(true);
    }

    function fetchdata(Request $request)
        {
            $id = $request->input('id');
            $user = User::find($id);
            $output = array(
                'id'  => $user->id,
                'name'    =>  $user->name,
                'email'     =>  $user->email,
                'password'  => $user->password
            );
            echo json_encode($output);
        }

    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email'  => 'required',
            'password' => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == 'insert')
            {
                $user = new User([
                    'name'    =>  $request->get('name'),
                    'email'     =>  $request->get('email'),
                    'password'  => $request->get('password')
                ]);
                $user->save();
            //  $success_output = '<div class="alert alert-success">Data Inserted</div>';
                //<script>toastr.success('User Already Deleted', 'User Deleted')</script>
            }

            if($request->get('button_action') == 'update')
            {
                $user = User::find($request->get('user_id'));
                $user->name = $request->get('name');
                $user->email = $request->get('email');
                $user->password = $request->get('password');
                $user->save();
            //    $success_output = '<div class="alert alert-success">Data Updated</div>';
        }

        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }}

    function removedata(Request $request)
    {
        $user = User::find($request->input('id'));
        if($user->delete())
        {
            echo 'Data Deleted';
        }
    }

    function viewclubs(Request $request)
    {
      $id = $request->input('id');
      $user = User::find($id);
      $userclubs = DB::table('clubs_registrations')
 			->leftjoin('clubs','clubs.id','=','clubs_registrations.club_id')
      ->leftjoin('users', 'users.id', '=','clubs_registrations.user_id')
         ->where('users.id', $id)
         //->pluck('club_name')
         //->groupby('users.id')
        ->select(DB::raw("GROUP_CONCAT(club_name SEPARATOR ' , ') as clubs"))
         ->groupby('users.id')
         ->distinct()
         ->get();

         return response()->json(['data' => $userclubs]);
        //return view('welcome/viewclubs');
   }

   function enrollData(Request $request)
   {
    global $userclubs;
    $id = $request->input('id');
     $userclubs = User::find($id);
        $output = array(
          'enroll_user_id' => $userclubs->id,
        );
        echo json_encode($output);

   }


   function enroll(Request $request, $userId)
   {
if($request->get('id') == 'Mara')
{
    $userclub = new ClubsRegistration ([
      'user_id'    => $userId,
      'club_id'     =>  1

    ]);
    $userclub->save();
  } else if($request->get('id') == 'Mamba')
  {
      $userclub = new ClubsRegistration ([
        'user_id'    => $userId,
        'club_id'     =>  3

      ]);
      $userclub->save();
    } else if($request->get('id') == 'Maasai')
    {
        $userclub = new ClubsRegistration ([
          'user_id'    => $userId,
          'club_id'     =>  2

        ]);
        $userclub->save();
      }else if($request->get('id') == 'Samburu')
      {
          $userclub = new ClubsRegistration ([
            'user_id'    => $userId,
            'club_id'     =>  4

          ]);
          $userclub->save();
        }else if($request->get('id') == 'Olive')
        {
            $userclub = new ClubsRegistration ([
              'user_id'    => $userId,
              'club_id'     =>  5

            ]);
            $userclub->save();
          }else if($request->get('id') == 'Razors')
          {
              $userclub = new ClubsRegistration ([
                'user_id'    => $userId,
                'club_id'     =>  6

              ]);
              $userclub->save();
            }else if($request->get('id') == 'Warriors')
            {
                $userclub = new ClubsRegistration ([
                  'user_id'    => $userId,
                  'club_id'     =>  7

                ]);
                $userclub->save();
              }else if($request->get('id') == 'Golag')
              {
                  $userclub = new ClubsRegistration ([
                    'user_id'    => $userId,
                    'club_id'     =>  8

                  ]);
                  $userclub->save();
                }else if($request->get('id') == 'Archipelo')
                {
                    $userclub = new ClubsRegistration ([
                      'user_id'    => $userId,
                      'club_id'     =>  9

                    ]);
                    $userclub->save();
                  }else if($request->get('id') == 'Buffalo')
                  {
                      $userclub = new ClubsRegistration ([
                        'user_id'    => $userId,
                        'club_id'     =>  10

                      ]);
                      $userclub->save();
                    }else {
      return 'not ok';
    }

}
}
