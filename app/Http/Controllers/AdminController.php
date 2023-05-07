<?php

namespace App\Http\Controllers;
use Hash;
use DB;
use Illuminate\Http\Request;
use App\Models\Admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();

        return response()->json($admin);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // check if user exists in database
        $user = Admin::where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resetpassword(Request $request)
    {
        $email = $request->email;
        // check if user exists in database
        $user = Admin::where('email', $email)->first();
        if (count($user) > 1) {
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => str_random(60),
                'created_at' => Carbon::now()
            ]);
        }
        $tokenData = DB::table('password_resets') ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $pass=Hash::make($request->password);
       $admin = new Admin();
       $admin->nom= $request->nom;
       $admin->prenom= $request->prenom;
       $admin->date_de_naissance= $request->date_de_naissance;
       $admin->email= $request->email;
       $admin->username = $request->username;
       $admin->password = $pass;
       $admin->save();
       return $admin;
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
        if(Admin::where('id_admin',$id)->exists()){
          $admin=Admin::find($id);
          $admin->id_admin = $id;
          $admin->nom = $request->nom;
          $admin->prenom = $request->prenom;
          $admin->date_de_naissance = $request->date_de_naissance;
          $admin->email = $request->email;
          $admin->username = $request->username;
          $admin->password= $request->password;
          $admin->save();
          return response()->json(["message"=>"updated succesfully"],200);
        }else{
            return response()->json(["message"=>"updated unsuccesfully"],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Admin::where('id_admin',$id)->exists()){
            $admin=Admin::find($id);
            $admin->delete();
            return response()->json(["message"=>"delete succesfully"],200);
        }else{
            return response()->json(["message"=>"delete unsuccesfully"],400);
        }
}}
