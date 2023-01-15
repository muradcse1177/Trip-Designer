<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class settingController extends Controller
{
    public function vendorSettings(Request $request){
        try{
            $rows1 = DB::table('vendors')
                ->where('deleted',0)
                ->where('agent_id',Session::get('user_id'))
                ->orderBy('id','desc')
                ->get();
            return view('settings.vendorSettings',['vendors' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addNewVendor(Request $request){
        try{
            if($request) {
                $name = $request->name;
                $phone = $request->phone;
                $email = $request->email;
                $address = $request->address;
                $result = DB::table('vendors')->insert([
                    'agent_id' => Session::get('user_id'),
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'address' => $address,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
                if ($result) {
                    return redirect()->to('vendors')->with('successMessage', 'New vendor added successfully!!');
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
    public function editVendorPage(Request $request){
        try{
            $rows1 = DB::table('vendors')->where('agent_id',Session::get('user_id'))->where('id',$request->id)->first();
            return view('settings.vendorEditPage',['vendor' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editVendor(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $name = $request->name;
                    $phone = $request->phone;
                    $email = $request->email;
                    $address = $request->address;
                    $result =DB::table('vendors')
                        ->where('id', $request->id)
                        ->update([
                            'name' => $name,
                            'phone' => $phone,
                            'email' => $email,
                            'address' => $address,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
                    if ($result) {
                        return redirect()->to('vendors')->with('successMessage', 'Data updated successfully!!');
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
    public function deleteVendor(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('vendors')
                        ->where('id', $request->id)
                        ->update([
                            'deleted' => 1,
                        ]);
                    if ($result) {
                        return redirect()->to('vendors')->with('successMessage', 'Data deleted successfully!!');
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
    public function employeeSettings(Request $request){
        try{
            $rows1 = DB::table('employees')
                ->where('deleted',0)
                ->where('agent_id',Session::get('user_id'))
                ->orderBy('id','desc')
                ->get();
            return view('settings.employeeSettings',['employees' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addNewEmployee(Request $request){
        try{
            if($request) {
                $name = $request->name;
                $phone = $request->phone;
                $email = $request->email;
                $address = $request->address;
                $result = DB::table('employees')->insert([
                    'agent_id' => Session::get('user_id'),
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'address' => $address,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
                if ($result) {
                    return redirect()->to('employees')->with('successMessage', 'New employee added successfully!!');
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
    public function editEmployeePage(Request $request){
        try{
            $rows1 = DB::table('employees')->where('agent_id',Session::get('user_id'))->where('id',$request->id)->first();
            return view('settings.employeeEditPage',['employee' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editEmployee(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $name = $request->name;
                    $phone = $request->phone;
                    $email = $request->email;
                    $address = $request->address;
                    $result =DB::table('employees')
                        ->where('id', $request->id)
                        ->update([
                            'name' => $name,
                            'phone' => $phone,
                            'email' => $email,
                            'address' => $address,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
                    if ($result) {
                        return redirect()->to('employees')->with('successMessage', 'Data updated successfully!!');
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
    public function deleteEmployee(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('employees')
                        ->where('id', $request->id)
                        ->update([
                            'deleted' => 1,
                        ]);
                    if ($result) {
                        return redirect()->to('employees')->with('successMessage', 'Data deleted successfully!!');
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
    public function companyInfo(Request $request){
        try{
            $rows1 = DB::table('users')
                ->where('id',Session::get('user_id'))
                ->first();
            return view('settings.companyInfo',['company' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function updateCompany(Request $request){
        try{
            if($request) {
                $rows = DB::table('users')
                    ->where('company_pnone', $request->phone)
                    ->orwhere('company_email', $request->email)
                    ->distinct()->get()->count();
                if ($rows > 0) {
                    $rows = DB::table('users')
                        ->where('company_pnone', $request->phone)
                        ->orwhere('company_email', $request->email)
                        ->first();
                    if($request->password == ''){
                        $password = $rows->password;
                    }
                    else{
                        $password = Hash::make($request->password);
                    }
                    if($request->hasFile('logo')){
                        $targetFolder = 'public/images/upload/company/';
                        $file = $request->file('logo');
                        $pname = time() . '.' . $file->getClientOriginalName();
                        $image['filePath'] = $pname;
                        $file->move($targetFolder, $pname);
                        $c_logo = $targetFolder . $pname;
                    }
                    else{
                        $c_logo = $rows->logo;
                    }
                    $result =DB::table('users')
                        ->where('id', Session::get('user_id'))
                        ->update([
                            'company_email' => $request->email,
                            'company_pnone' => $request->phone,
                            'address' => $request->address,
                            'contact_person' => $request->contact_person,
                            'con_phone' => $request->con_phone,
                            'password' => $password,
                            'logo' => $c_logo,
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);
                    if ($result) {
                        return redirect()->to('companyInfo')->with('successMessage', 'Data updated successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                     return back()->with('errorMessage', 'Company not exits.Please try again!!');
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
    public function airports(Request $request){
        try{
            return view('settings.airports');
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function insertAirports(Request $request){
        try{
            $result = DB::table('airlines_details')->insert([
                'name' => $request->name,
                'code' => $request->code,
            ]);
            if ($result) {
                return redirect()->to('airports')->with('successMessage', 'New airports added successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function airlines(Request $request){
        try{
            return view('settings.airlines');
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function insertAirlines(Request $request){
        try{
            $result = DB::table('airlines_details')->insert([
                'name' => $request->name,
                'code' => $request->code,
            ]);
            if ($result) {
                return redirect()->to('airlines')->with('successMessage', 'New Airlines added successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
}
