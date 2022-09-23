<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {        
        $users = User::paginate(10);
 
        return view('users', compact('users'));
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
  
        return response()->json($user);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return response()->json(['success'=>'User Updated Successfully!']);
    }
}
