<?php
use Illuminate\Support\Facades\Route;

//Auth Management-------------------------------------------------------
Route::get('/register', function () {
    return view('userAuth.register');
});
Route::get('importCsv', 'App\Http\Controllers\usersController@importCsv');
Route::get('/', 'App\Http\Controllers\authController@loginPage');
Route::get('login', 'App\Http\Controllers\authController@loginPage');
Route::post('createNewUser', 'App\Http\Controllers\authController@createNewUser');
Route::post('verifyUsers', 'App\Http\Controllers\authController@verifyUsers');
Route::get('dashboard', 'App\Http\Controllers\authController@dashboard');
//----------------------------------------------------------
Route::middleware(['role'])->group(function () {

    //Air Ticket Management------------------------------------------------
    Route::get('newAirTicket', 'App\Http\Controllers\airTicketController@newAirTicket');
    Route::post('createNewAirTicket', 'App\Http\Controllers\airTicketController@createNewAirTicket');
    Route::get('editTicketPage', 'App\Http\Controllers\airTicketController@editTicketPage');
    Route::post('updateNewAirTicket', 'App\Http\Controllers\airTicketController@updateNewAirTicket');
    Route::post('deleteAirTicket', 'App\Http\Controllers\airTicketController@deleteAirTicket');
    Route::get('reissueAirTicket', 'App\Http\Controllers\airTicketController@reissueAirTicket');
    Route::get('searchPNRforReissue', 'App\Http\Controllers\airTicketController@searchPNRforReissue');
    Route::get('refundAirTicket', 'App\Http\Controllers\airTicketController@refundAirTicket');
    Route::get('searchPNRforRefund', 'App\Http\Controllers\airTicketController@searchPNRforRefund');
    Route::get('cancelAirTicket', 'App\Http\Controllers\airTicketController@cancelAirTicket');
    Route::get('searchPNRforCancel', 'App\Http\Controllers\airTicketController@searchPNRforCancel');
    Route::get('viewTicket', 'App\Http\Controllers\airTicketController@viewTicket');
    Route::get('editPaymentStatus', 'App\Http\Controllers\airTicketController@editPaymentStatus');
    Route::post('updateAirTicketPaymentStatus', 'App\Http\Controllers\airTicketController@updateAirTicketPaymentStatus');
    Route::get('filterAirTicket', 'App\Http\Controllers\airTicketController@filterAirTicket');
    //----------------------------------------------------------

    //Visa Processing----------------------------------------------------------
    Route::get('newVisaProcess', 'App\Http\Controllers\visaController@newVisaProcess');
    Route::post('createNewVisa', 'App\Http\Controllers\visaController@createNewVisa');
    Route::get('viewVisa', 'App\Http\Controllers\visaController@viewVisa');
    //----------------------------------------------------------

    //Tour Package----------------------------------------------------------
    Route::get('newTourPackage', 'App\Http\Controllers\tourController@newTourPackage');
    Route::post('createNewTourPackage', 'App\Http\Controllers\tourController@createNewTourPackage');
    Route::get('editPackagePage', 'App\Http\Controllers\tourController@editPackagePage');
    Route::post('updateTourPackage', 'App\Http\Controllers\tourController@updateTourPackage');
    Route::post('deleteTourPackage', 'App\Http\Controllers\tourController@deleteTourPackage');
    Route::get('viewTourPackage', 'App\Http\Controllers\tourController@viewTourPackage');
    //----------------------------------------------------------

    //User Management------------------------------------------------
    Route::get('users', 'App\Http\Controllers\usersController@users');
    Route::get('isPassengerActive', 'App\Http\Controllers\usersController@isPassengerActive');
    Route::get('isPassengerInActive', 'App\Http\Controllers\usersController@isPassengerInActive');
    Route::post('createNewPassenger', 'App\Http\Controllers\usersController@createNewPassenger');
    Route::get('editPassengerPage', 'App\Http\Controllers\usersController@editPassengerPage');
    Route::post('editPassengerInfo', 'App\Http\Controllers\usersController@editPassengerInfo');
    Route::post('deletePassenger', 'App\Http\Controllers\usersController@deletePassenger');
    //----------------------------------------------------------

    //Accounts Management------------------------------------------------
    Route::get('transactions', 'App\Http\Controllers\accountsController@transactions');
    Route::get('officeExpenses', 'App\Http\Controllers\accountsController@officeExpenses');
    Route::post('addOfficeExpense', 'App\Http\Controllers\accountsController@addOfficeExpense');
    Route::get('bankAccounts', 'App\Http\Controllers\accountsController@bankAccounts');
    Route::post('addBankAccounts', 'App\Http\Controllers\accountsController@addBankAccounts');
    Route::get('editBankAccount', 'App\Http\Controllers\accountsController@editBankAccount');
    Route::post('updateBankAccountsAmount', 'App\Http\Controllers\accountsController@updateBankAccountsAmount');
    Route::post('deleteBankAccount', 'App\Http\Controllers\accountsController@deleteBankAccount');
    Route::get('filterTransaction', 'App\Http\Controllers\accountsController@filterTransaction');
    //----------------------------------------------------------

    //Settings Management------------------------------------------------
    Route::get('vendors', 'App\Http\Controllers\settingController@vendorSettings');
    Route::post('addNewVendor', 'App\Http\Controllers\settingController@addNewVendor');
    Route::get('editVendorPage', 'App\Http\Controllers\settingController@editVendorPage');
    Route::post('editVendor', 'App\Http\Controllers\settingController@editVendor');
    Route::post('deleteVendor', 'App\Http\Controllers\settingController@deleteVendor');

    Route::get('employees', 'App\Http\Controllers\settingController@employeeSettings');
    Route::post('addNewEmployee', 'App\Http\Controllers\settingController@addNewEmployee');
    Route::get('editEmployeePage', 'App\Http\Controllers\settingController@editEmployeePage');
    Route::post('editEmployee', 'App\Http\Controllers\settingController@editEmployee');
    Route::post('deleteEmployee', 'App\Http\Controllers\settingController@deleteEmployee');

    Route::get('companyInfo', 'App\Http\Controllers\settingController@companyInfo');
    Route::post('updateCompany', 'App\Http\Controllers\settingController@updateCompany');

    Route::get('airports', 'App\Http\Controllers\settingController@airports');
    Route::post('insertAirports', 'App\Http\Controllers\settingController@insertAirports');

    Route::get('airlines', 'App\Http\Controllers\settingController@airlines');
    Route::post('insertAirlines', 'App\Http\Controllers\settingController@insertAirlines');

});
//----------------------------------------------------------

