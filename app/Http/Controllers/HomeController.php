<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('home', compact('users'));
    }

    public function getUsers(){
      return DataTables::of(User::query())

        ->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-warning" }}')
      ->setRowId(function ($user) {
          return $user->id;
      })
      ->setRowAttr(['align' => 'center'])
      ->setRowData(['data-name' => 'row-{{$name}}',])

      ->make(true);
    }

}
