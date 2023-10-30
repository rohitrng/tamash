<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\InquiryController;
use App\Http\Controllers\backend\RegistrationController;
use App\Http\Controllers\backend\StudentRegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddVehical;
use App\Http\Controllers\backend\FeesTypesMasterController;
use App\Http\Controllers\BusStaff;
use App\Http\Controllers\Challa;
use App\Http\Controllers\StudentMaster;
use App\Http\Controllers\partycontroller;
use App\Http\Controllers\RTOpaper;
use App\Http\Controllers\RtopaperController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\NatureofworkController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\BusFees;
use App\Http\Controllers\LateFeesLimit;
use App\Http\Controllers\LateFeesMasterController;
use App\Http\Controllers\CourseFees;
use App\Http\Controllers\RouteMaster;
use App\Http\Controllers\Refundvoucher;
use App\Http\Controllers\FeestypemasterController;
use App\Http\Controllers\BusfeesmasterController;
use App\Http\Controllers\backend\InquiryEntryController;
use App\Http\Controllers\backend\BusstopController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\backend\MasterRegistrationController;
use App\Http\Controllers\backend\MaintenanceController;
use App\Http\Controllers\backend\RouteController;
use App\Http\Controllers\backend\AreaController;
use App\Http\Controllers\backend\Course_fees_head_orders;
use App\Http\Controllers\backend\CourseFeesStructureMaster;
use App\Http\Controllers\feesregisterController;
use App\Http\Controllers\ExamMasterController;
use App\Http\Controllers\MonthController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AssignSubjectController;
use App\Http\Controllers\TeacherSubjectController;
use App\Http\Controllers\AttandenceController;
use App\Http\Controllers\AttandenceReportsController;
use App\Http\Controllers\StudentAttendReportController;
use App\Http\Controllers\DailyAttandanceController;
use App\Http\Controllers\PrimaryGrupController;
use App\Http\Controllers\GrupController;
use App\Http\Controllers\HeadController;
use App\Http\Controllers\SubHeadController;
use App\Http\Controllers\GreadingMasterController;
use App\Http\Controllers\StreamController;
// use App\Http\Controllers\PrimaryGrupController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\RemarksController;
use App\Http\Controllers\DefaultersListController;
use App\Http\Controllers\SubjectCombinationController;
use App\Http\Controllers\EnquiryReciptController;

use App\Http\Controllers\TeacherBusAssignController;
use App\Http\Controllers\backend\ScholarbusassignController;
use App\Http\Controllers\backend\FeesDuechart;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\backend\FeesreceiptchallanController;
use App\Http\Controllers\CSVController;
use App\Http\Controllers\StudentAttandanceController;
use App\Http\Controllers\ClassAssignTeacher;
use App\Http\Controllers\backend\BusdataController;
use App\Http\Controllers\backend\DownloadFileController;
use App\Http\Controllers\map\MapController;
use App\Http\Controllers\student\StudentPanelController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\backend\SessionController;
use App\Http\Controllers\Changepassword;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [LoginController::class, 'login']);

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    // Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {

        /*Register Routes*/
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register_c', 'RegisterController@register')->name('register_c');

        /*Login Routes*/
        Route::get('/', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /*Logout Routes*/
        // Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
         Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

Auth::routes();Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // Route::resource('products', ProductController::class);
    /*Admin Routes*/
    Route::get('admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('account_create',[AdminController::class, 'account_create']);
    Route::get('create_user_after_account', [AdminController::class, 'create_user_after_account']);
    Route::post('deposit_info',[AdminController::class, 'deposit_info']);
    Route::post('withdraw_info',[AdminController::class, 'withdraw_info']);
    Route::post('password_change',[AdminController::class, 'password_change']);
    Route::post('upi', [AdminController::class, 'upi']);

    Route::resource('inquiry-data', InquiryController::class);
    Route::get('inquiry-data-show', [InquiryController::class,'show'])->name('inquiry-data');

    Route::resource('inquiry-data', InquiryController::class);

    /*Student registration data*/
    Route::get('student-registrations', [StudentRegistrationController::class,'student_registrations'])->name('student-registrations');


    Route::post('AddVehical-store', [AddVehical::class, 'store']);
    Route::get('busstaff',[AddVehical::class, 'busstaff'])->name('busstaff');
    Route::post('busstaff',[AddVehical::class, 'registerstaff'])->name('registerstaff');
    Route::get('vehical',[AddVehical::class, 'vehical'])->name('vehicale');
    Route::get('vehical',[AddVehical::class, 'showvehical'])->name('showvehical');
    Route::get('list',[AddVehical::class,'list'])->name('list');
    Route::get('busstaff',[BusStaff::class, 'index'])->name('busstaff');
    Route::post('busstaff',[BusStaff::class, 'registerbusstaff'])->name('busstaff');
    Route::get('listbusmember',[BusStaff::class, 'listbusmember'])->name('listbusmember');
    Route::get('Challa',[Challa::class, 'index'])->name('Challan');
    Route::post('Challa',[Challa::class, 'registerchallan'])->name('Challa');
    Route::get('partycontroller',[partycontroller::class, 'index'])->name('partycontroller');

    Route::get('listbusmember',[BusStaff::class, 'listbusmember'])->name('listbusmember');
    Route::get('Challa',[Challa::class, 'index'])->name('Challan');
    Route::post('Challa',[Challa::class, 'registerchallan'])->name('Challa');
    Route::get('challanlist',[Challa::class, 'challanlist'])->name('challanlist');
    Route::post('fees-types-master-delete', [FeesTypesMasterController::class, 'delete']);
    Route::get('fees-register', [feesregisterController::class, 'index'])->name('fees-register');
    Route::post('get-fees-register-data', [feesregisterController::class, 'feesregisterdata'])->name('get-fees-register-data');

    Route::post('create-session',[SessionController::class,'create'])->name('create_session');
});

