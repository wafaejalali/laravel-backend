<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Support\Str;
use DB;
use Mail;
use Carbon\Carbon;
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
        $id=Admin::where('username', $username)->first()->id_admin;
        if ($user && Hash::check($password, $user->password)) {
            return response()->json(['exists' => true,'id'=>$id]);
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
        if (Admin::where('email',$email)->exists()) {
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => Str::random(10),
                'created_at' => Carbon::now()
            ]);
        }
        $tokenData = DB::table('password_resets') ->where('email', $request->email)->first();

        Mail::send('email.forgetPassword', ['token' => $tokenData], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return response()->json(["message"=>"We have e-mailed your password reset link!"],200);
    }

    /**
       * Write code on Method
       *
       * @return \Illuminate\Http\Response
       */
      public function showResetPasswordForm($token) {
        return view('auth.forgetPasswordLink', ['token' => $token]);
     }

     /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitResetPasswordForm(Request $request){
        $updatePassword = DB::table('password_resets')
        ->where([
          'email' => $request->email,
          'token' => $request->token
        ])
        ->first();

        if(!$updatePassword){
            return response()->json(["message"=>"invalide token"],200);
        }

        $user = Admin::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return response()->json(["message"=>"We have e-mailed your password reset link!"],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'nom'=>'required|string|max:30',
        'prenom'=>'required|string|max:30',
        'date_de_naissance'=>'required|date',
        'email'=>'required|string|max:255|email',
        'username'=>'required|string|max:30',
        'password'=>'required|string|max:30',
      ]);



       $pass=Hash::make($request->password);
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
    {   $request->validate([
        'nom'=>'required|string|max:30',
        'prenom'=>'required|string|max:30',
        'date_de_naissance'=>'required|date',
        'email'=>'required|string|max:255|email',
        'username'=>'required|string|max:30',
        'password'=>'required|string|max:30',
      ]);
        if(Admin::where('id_admin',$id)->exists()){
          $admin=Admin::find($id);
          $pass=Hash::make($request->password);
          $admin->id_admin = $id;
          $admin->nom = $request->nom;
          $admin->prenom = $request->prenom;
          $admin->date_de_naissance = $request->date_de_naissance;
          $admin->email = $request->email;
          $admin->username = $request->username;
          $admin->password= $pass;
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
