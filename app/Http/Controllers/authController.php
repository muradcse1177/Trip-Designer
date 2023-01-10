<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
    public  function loginPage(Request $request){
        if(Session::get('user_id')){
            return redirect()->to('dashboard');
        }
        else{
            return view('userAuth.login');
        }
    }
    public  function dashboard(Request $request){
        if(Session::get('user_id')){
            return view('dashboard');
        }
        else{
            return redirect()->to('login');
        }
    }
    public function createNewUser(Request $request){
        try{
            if($request) {
                $rows = DB::table('users')
                    ->where('company_pnone', $request->phone)
                    ->orwhere('company_email', $request->email)
                    ->distinct()->get()->count();
                if ($rows > 0) {
                    return back()->with('errorMessage', 'User already exits!!');
                } else {
                    $username = $request->name;
                    $email = $request->email;
                    $phone = $request->phone;
                    $password = Hash::make($request->password);
                    $result = DB::table('users')->insert([
                        'company_name' => $username,
                        'company_email' => $email,
                        'company_pnone' => $phone,
                        'password' => $password,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                    if ($result) {
                        return redirect()->to('login')->with('errorMessage', 'Registered successfully. Please log in.');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function verifyUsers(Request $request){
        try{
            if(Session::get('user_id')){
                return redirect()->to('dashboard');
            }
            else{
                $email = $request->email;
                $password = $request->password;
                $rows = DB::table('users')
                    ->where('company_email', $email)
                    ->get()->count();
                if ($rows > 0) {
                    $rows = DB::table('users')
                        ->where('company_email', $email)
                        ->first();
                    if (Hash::check($password, $rows->password)) {
                        $role = $rows->role;
                        Session::put('user_info', $rows);
                        Session::put('user_id', $rows->id);
                        Cookie::queue('user', $rows->id, time()+31556926 ,'/');
                        if($role == 2){
                            Session::put('admin', $rows->id);
                            return redirect()->to('dashboard');
                        }
                        if($role == 1){
                            Session::put('superAdmin', $rows->id);
                            return redirect()->to('dashboard');
                        }
                    }
                    else{
                        return back()->with('errorMessage', 'Password is wrong!!');
                    }
                } else {
                    return back()->with('errorMessage', 'Users not exits!!');
                }
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
}
