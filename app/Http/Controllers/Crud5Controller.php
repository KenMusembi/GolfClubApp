<?php
namespace App\Http\Controllers;

use App\Member;
use App\Clubs;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Crud5Controller extends Controller
{

    public function index(Request $request)
    {
        $request->session()->put('search', $request->has('search') ? $request->get('search') : ($request->session()->has('search') ? $request->session()->get('search') : ''));
        $request->session()->put('gender', $request->has('gender') ? $request->get('gender') : ($request->session()->has('gender') ? $request->session()->get('gender') : -1));
        $request->session()->put('field', $request->has('field') ? $request->get('field') : ($request->session()->has('field') ? $request->session()->get('field') : 'created_at'));
        $request->session()->put('sort', $request->has('sort') ? $request->get('sort') : ($request->session()->has('sort') ? $request->session()->get('sort') : 'desc'));
        //  $request->session()->put('club_name', $request->has('club') ? $request->get('club') : ($request->session()->has('club') ? $request->session()->get('club') : ''))

        $members = new Member();
        if ($request->session()->get('gender') != -1)
            $members = $members->where('gender', $request->session()->get('gender'));
        $members = $members->where('name', 'like', '%' . $request->session()->get('search') . '%')
        ->leftjoin('clubs_registrations','clubs_registrations.member_id','=','members.id')
  			->leftjoin('clubs','clubs.id','=','clubs_registrations.club_id')
        ->groupBy('members.id')
            ->paginate(5);
        if ($request->ajax())
            return view('crud_5.index', compact('members'));
        else
            return view('crud_5.ajax', compact('members'));
    }

    public function show($slug)
      {
        $test = Member::whereSlug($slug)->firstOrFail();
        return view('index.show', compact('member'));
      }
    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('crud_5.form');
        else {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'club_name' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $member = new Member();
            $member->name = $request->name;
            $member->gender = $request->gender;
            $member->email = $request->email;
            $member = new Clubs();
            $member->club_name = $request->club_name;
            $member->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('laravel-crud-search-sort-ajax-modal-form')
            ]);
        }
    }

    public function delete($id)
    {
        Member::destroy($id);
        return redirect('/laravel-crud-search-sort-ajax-modal-form');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('crud_5.form', ['member' => Member::find($id)]);
        else {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $member = Member::find($id);
            $member->name = $request->name;
            $member->gender = $request->gender;
            $member->email = $request->email;
            $member->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('laravel-crud-search-sort-ajax-modal-form')
            ]);
        }
    }
}
