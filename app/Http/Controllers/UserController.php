<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dirape\Token\Token;
use App\User;

class UserController extends Controller
{
     public function getHash()
    {
     $uuid = (new Token())->Unique('user', 'uuid', 15); // unique hash auto generated (non-editable) 15 digits

     return response()->json(['uuid' => $uuid]); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user = User::all();

        return View('user.index')->with('users',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $uuid = (new Token())->Unique('user', 'uuid', 15);
        return View('user.create')->with('uuid',$uuid);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        //validating nama alert if existed
        if (User::where('nama', '=', $request->get('nama'))->exists()) {
            $str = 'nama '.$request->get('nama').' is already existed..';
            $error = ['response' => $str];
            return response()->json($error);
        }else{
            //
            $error = ['response'=>'success'];
             $user = new User([
          'uuid' => $request->get('uuid'),
          'nama' => $request->get('nama'),
          'alamat' => $request->get('alamat')
                    ]);
            $user->save();



       return response()->json($user);
        }
      
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
    public function edit($uuid)
    {

       $user = User::find($uuid);

       return response()->json($user);
      
    }
    public function edit_nomodal($uuid)
    {

       $user = User::find($uuid);
        return View('user.edit')->with('users',$user);
       // return response()->json($user);
      
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
       $user = User::find($id);
       $user->alamat = $request->get('alamat');
       $user->save();

       return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
       $user->delete();

       return response()->json($user);
    }
}
