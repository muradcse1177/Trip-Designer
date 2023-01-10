<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class accountsController extends Controller
{
    public function transactions(Request $request){
        try{
            $rows1 = DB::table('accounts')
                ->where('agent_id',Session::get('user_id'))
                ->orderBy('id','desc')
                ->get();
            return view('accounts.transactions',['transactions' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function officeExpenses(Request $request){
        try{
            $rows1 = DB::table('accounts')
                ->where('agent_id',Session::get('user_id'))
                ->orderBy('id','desc')
                ->get();
            return view('accounts.officeExpenses',['transactions' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addOfficeExpense(Request $request){
        try{
            $type = $request->type;
            if($type == 'Debit'){
                $debit = $request->amount;
                $credit = 0;
            }
            if($type == 'Credit'){
                $debit = 0;
                $credit = $request->amount;
            }
            $invoice =  rand(1111111111,9999999999);
            $result = DB::table('accounts')->insert([
                'invoice_id' => $invoice,
                'date' => $request->date,
                'agent_id' => Session::get('user_id'),
                'transaction_type' => $request->type,
                'source' => 'Office Accounts',
                'purpose' => $request->purpose,
                'buying_price' => $debit,
                'selling_price' => $credit,
                'status' => 'Approved',
            ]);
            if ($result) {
                return redirect()->to('transactions')->with('successMessage', 'Office Income/Expense added successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function bankAccounts(Request $request){
        try{
            $rows1 = DB::table('bank_accounts')
                ->where('agent_id',Session::get('user_id'))
                ->orderBy('id','desc')
                ->get();
            return view('accounts.bankAccounts',['accounts' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addBankAccounts(Request $request){
        try{

            $result = DB::table('bank_accounts')->insert([
                'name' => $request->name,
                'agent_id' => Session::get('user_id'),
                'amount' => $request->amount,
            ]);
            if ($result) {
                return redirect()->to('bankAccounts')->with('successMessage', 'Bank account  added successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editBankAccount(Request $request){
        try{
            $rows1 = DB::table('bank_accounts')
                ->where('agent_id',Session::get('user_id'))
                ->where('id',$request->id)
                ->first();
            return view('accounts.editBankAccountPage',['account' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function updateBankAccountsAmount(Request $request){
        try{
            $result =DB::table('bank_accounts')
                ->where('id', $request->id)
                ->where('agent_id',Session::get('user_id'))
                ->update([
                    'amount' => $request->amount,
                ]);
            if ($result) {
                return redirect()->to('bankAccounts')->with('successMessage', 'Data update successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deleteBankAccount(Request $request){
        try{
            $result =DB::table('bank_accounts')
                ->where('id', $request->id)
                ->where('agent_id',Session::get('user_id'))
                ->delete();
            if ($result) {
                return redirect()->to('bankAccounts')->with('successMessage', 'Data update successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

}
