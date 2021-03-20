<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('created_at', 'asc')->get();
        return view('admin', compact('users'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$action)
    {
        $userdata = User::find($id);
        if (\Auth::user()->id != $userdata->id) {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'You are not allowed to perform this action.']);
        }
        return view('userEditForm', compact('action','userdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id,$action)
    {
        $userdata = User::find($id);
        if(\Auth::user()->id != $userdata->id)
        {
            return back()->with(['success' => false, 'message_type' => 'danger',
               'message' => 'You are not allowed to perform this action.']);
        }
        $userdata->updated_at=date("Y-m-d H:i:s");
        switch ($action)
        {
            case 0:
            {
                $validated=$request->validate([
                    'name' => 'required|string|max:255|unique:users'
                ]);
                $userdata->name=$validated['name'];
                break;
            }
            case 1:
            {
                $validated=$request->validate([
                    'email' => 'required|string|email|max:255|unique:users'
                ]);
                $userdata->email=$validated['email'];
                break;
            }
            case 2:
            {
                if(!Hash::check($request->oldpassword,$userdata->password))
                {
                    return back()->with(['success' => 'false', 'message_type' => 'danger',
                        'message' => 'The old password you provided is incorrect.']);
                }
                elseif($request->password != $request->password_confirmation)
                {
                    return back()->with(['success' => 'false', 'message_type' => 'danger',
                        'message' => 'Data in: New password and Confirm new password do not match.']);
                }
                elseif(Hash::check($request->password,$userdata->password))
                {
                    return back()->with(['success' => 'false', 'message_type' => 'danger',
                        'message' => 'Your new password can not be the same as your old password.']);
                }
                $validated=$request->validate([
                    'password' => 'required|string|min:8|regex:/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/'
                ]);
                $userdata->password=Hash::make($validated['password']);
                break;
            }
        }
        if($userdata->save())
        {
            return redirect()->route('home');
        }
        return "Error in function UserController::update().";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userdata = User::find($id);
        //Sprawdzenie czy to użytkownik
        if(\Auth::user()->id != $userdata->id and \Auth::user()->role != 'admin')
        {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'You are not allowed to perform this action.']);
        }
        if($userdata->delete()){
            return redirect()->route('home')->with(['success' => true,
                'message_type' => 'success',
                'message' => 'User "'.
                    $userdata->name.'" has been deleted.']);
        }
        return back()->with(['success' => false, 'message_type' => 'danger',
            'message' => 'Error. User "'.
                $userdata->name.'" has not been deleted. Try again later.']);
    }

    /**
     * Update the role of the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changerole(UserRequest $request, $id)
    {
        $userdata = User::find($id);
        if(\Auth::user()->role->name != 'admin')
        {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'You are not allowed to perform this action.']);
        }
        $userdata->role_id=$request->newrole_id;
        if($userdata->save())
        {
            return redirect()->route('admin');
        }
        return "Error in function UserController::updaterole().";
    }
}
