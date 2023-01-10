<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class usersController extends Controller
{
    public function users(Request $request){
        try{
            $rows = DB::table('country')->get();
            $rows1 = DB::table('passengers')
                ->where('deleted',0)
                ->where('upload_by',Session::get('user_id'))
                ->orderBy('id','desc')
                ->get();
            return view('users.users',['countries' => $rows,'passengers' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function createNewPassenger(Request $request){
        try{
            if($request) {
                $title = $request->title;
                $f_name = $request->f_name;
                $l_name = $request->l_name;
                $phone = $request->phone;
                $email = $request->email;
                $gender = $request->gender;
                $nationality = $request->nationality;
                $dob = $request->dob;
                $ffn = $request->ffn;
                $p_number = $request->p_number;
                $p_exp_date = $request->p_exp_date;
                $t_type = $request->t_type;
                $result = DB::table('passengers')->insert([
                    'title' => $title,
                    'f_name' => $f_name,
                    'l_name' => $l_name,
                    'phone' => $phone,
                    'email' => $email,
                    'gender' => $gender,
                    'nationality' => $nationality,
                    'dob' => $dob,
                    'ffn' => $ffn,
                    'p_number' => $p_number,
                    'p_exp_date' => $p_exp_date,
                    't_type' => $t_type,
                    'upload_by' => Session::get('user_id'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
                if ($result) {
                    return redirect()->to('users')->with('successMessage', 'Registered done successfully!!');
                } else {
                    return back()->with('errorMessage', 'Please try again!!');
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
    public function isPassengerInActive(Request $request){
        try{
            if($request) {
                if($request->id) {
                    if($request->status== 'Active')
                    $result =DB::table('passengers')
                        ->where('id', $request->id)
                        ->update([
                            'status' => 'In Active',
                        ]);
                    if ($result) {
                        return redirect()->to('users')->with('successMessage', 'Data update successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
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
    public function isPassengerActive(Request $request){
        try{
            if($request) {
                if($request->id) {
                    if($request->status== 'In Active')
                    $result =DB::table('passengers')
                        ->where('id', $request->id)
                        ->update([
                            'status' => 'Active',
                        ]);
                    if ($result) {
                        return redirect()->to('users')->with('successMessage', 'Data update successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
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
    public function editPassengerInfo(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $title = $request->title;
                    $f_name = $request->f_name;
                    $l_name = $request->l_name;
                    $phone = $request->phone;
                    $email = $request->email;
                    $gender = $request->gender;
                    $nationality = $request->nationality;
                    $dob = $request->dob;
                    $ffn = $request->ffn;
                    $p_number = $request->p_number;
                    $p_exp_date = $request->p_exp_date;
                    $t_type = $request->t_type;
                    $result =DB::table('passengers')
                        ->where('id', $request->id)
                        ->update([
                            'title' => $title,
                            'f_name' => $f_name,
                            'l_name' => $l_name,
                            'phone' => $phone,
                            'email' => $email,
                            'gender' => $gender,
                            'nationality' => $nationality,
                            'dob' => $dob,
                            'ffn' => $ffn,
                            'p_number' => $p_number,
                            'p_exp_date' => $p_exp_date,
                            't_type' => $t_type,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
                    if ($result) {
                        return redirect()->to('users')->with('successMessage', 'Data update successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editPassengerPage(Request $request){
        try{
            $rows = DB::table('country')->get();
            $rows1 = DB::table('passengers')->where('upload_by',Session::get('user_id'))->where('id',$request->id)->orderBy('id','desc')->first();
            //dd($rows1);
            return view('users.editPassengerPage',['countries' => $rows,'passengers' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deletePassenger(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('passengers')
                        ->where('id', $request->id)
                        ->update([
                            'deleted' => 1,
                        ]);
                    if ($result) {
                        return redirect()->to('users')->with('successMessage', 'Data deleted successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
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
}
