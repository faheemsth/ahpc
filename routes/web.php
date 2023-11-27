<?php

use App\Http\Controllers\AhpcController;
use App\Http\Controllers\ArticalController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\Admin\SettingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DynamicPagesController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\overseassController;
use App\Http\Controllers\UserController;
use App\Models\Discipline;
use App\Models\Institute;
use App\Models\InstituteType;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

$admin_path = 'App\Http\Controllers\Backend\Admin';
$institute_path = 'App\Http\Controllers\Backend\Institute';

Route::get('/test', function () {
    dd('asd');
});
Auth::routes();
Route::get('/maintenance',function(){
    return view('site.Maintenance');
});
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
Route::get('/ahpc', [AhpcController::class, 'index'])->name('overseas.index');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
Route::get('/get_invoices/{id}', [App\Http\Controllers\HomeController::class, 'getInvoices']);
Route::get('/invoice/{id}', [App\Http\Controllers\HomeController::class, 'invoice']);
Route::get('/overseas/invoice/{id}', [App\Http\Controllers\HomeController::class, 'overseas_invoice']);



Route::get('/', function () {
    return view('site.home');
})->name('site.home');



Route::get('/site/profile', function () {
    return view('site.profile');
})->name('site.profile');

// Route::get('/overseass/signup', function () {
//     return view('site.overseassignup');
// })->name('site.overseassignup');

Route::get('/ahpc/signup', [AhpcController::class, 'create'])->name('ahpc.create');
Route::post('/ahpc/signup', [AhpcController::class, 'store'])->name('ahpc.store');
Route::get('/overseass/signup', [overseassController::class, 'create'])->name('overseass.create');
Route::post('/overseass/signup', [overseassController::class, 'store'])->name('overseass.store');

Route::get('/institue/signup', function () {
    $Disciplines=Discipline::all();
    $Institutes = Institute::all();
    $Types = InstituteType::all();

    return view('site.institutionsignup',compact('Disciplines', 'Institutes', 'Types'));
})->name('site.institutionsignup');

// Route::get('/ahpc/signup', function () {
//     return view('site.ahpcsignup');
// })->name('site.ahpcsignup');

Route::get('/site/login', function () {
    return view('site.login');
})->name('site.login');

Route::get('/student/signup', function () {
    return view('site.studentsignup');
})->name('site.studentsignup');

Route::get('/our/descipline', function () {
    $Disciplines = Discipline::distinct('discipline_name')->get();
    return view('site.descipline',compact('Disciplines'));
})->name('site.descipline');


Route::get('/member/list',function(){
    return view('site.member');
});


Route::get('/download/form',function(){
    return view('site.download');
});


// Group Routes For Admin
Route::group ( ['namespace' => $admin_path,'middleware' => ['auth']], function () {
    Route::get('/disciplines','DisciplineController@index')->name('discipline');
    Route::get('/institute-profile/{id}','ManageInstituteController@index');
    Route::get('/overseas-profile/{id}','ManageOverseasController@index');
    Route::post('/update_institute_document','ManageInstituteController@updateDocument')->name('update_institute_document');
    Route::post('/update_institute_program','ManageInstituteController@updateProgram')->name('update_institute_program');
    Route::post('/update_invoice_status','ManageInstituteController@updateInvoiceStatus')->name('update_invoice_status');
    Route::post('/add_institute_visit','ManageInstituteController@addVisit')->name('add_institute_visit');

    Route::post('/update_overseas_document','ManageOverseasController@updateDocument')->name('update_overseas_document');

    Route::post('/save_discipline','DisciplineController@store')->name('save_discipline');
    Route::post('/update_discipline','DisciplineController@update')->name('update_discipline');

    Route::post('/save_program','DisciplineController@storeProgram')->name('save_program');
    // Route::post('/update_program','DisciplineController@updateProgram')->name('update_program');

    Route::get('/institutes/show','SettingController@index')->name('institutes.show');
    Route::get('/overseas/show','SettingController@index')->name('overseas.show');
    Route::get('/polices/show','SettingController@index')->name('polices.show');

    Route::get('/pages/show','SettingController@index')->name('pages.show');
    Route::get('/blogs/show','SettingController@index')->name('blog.show');


    Route::post('/save_document_types','SettingController@storeDocType')->name('save_document_types');
    Route::post('/save_fee_structure','SettingController@storeFeeStructure')->name('save_fee_structure');

    Route::post('/update_institute_profile_admin/{id}','ManageInstituteController@updateProfile');
    Route::post('/profile_avatar_admin','ManageInstituteController@profile_avatar');
    Route::post('/update_password_admin','ManageInstituteController@chnagePassword')->name('update_password_admin');

    Route::post('/update_overseas_profile_admin/{id}','ManageOverseasController@updateProfile');

    Route::get('/profile','ProfileController@index')->name('simple_profile');
    Route::get('/profile_edit','ProfileController@editProfile')->name('simple_profile_edit');
    Route::post('/update_profile_admin','ProfileController@updateProfile')->name('update_profile');
    Route::post('/update_password_admin','ProfileController@chnagePassword')->name('update_password');
    Route::post('/profile_avatar_admin','ProfileController@profile_avatar')->name('profile_avatar');

    Route::post('/edit-program-title', 'DisciplineController@editProgramTitle')->name('edit_program_title');
    Route::post('/update-program-title', 'DisciplineController@updateProgramTitle')->name('update-program-title');
    Route::get('/delete-program-title', 'DisciplineController@deleteProgramTitle')->name('delete-program-title');

    Route::get('/institute', [InstituteController::class, 'index'])->name('institute');
    Route::get('/overseas', [overseassController::class, 'index'])->name('overseas');
    Route::resource('/institute-type', InstituteTypeController::class);

    Route::post('/save_institute','SettingController@saveInstitute')->name('save_institute');
    Route::post('/save_institute_type','SettingController@saveInstituteType')->name('save_institute_type');
    Route::post('/edit_discipline','SettingController@editDiscipline')->name('edit_discipline');

    Route::post('/edit_discipline_amount','SettingController@editDisciplineAmount')->name('edit_discipline_amount');
    Route::post('/add_policy_category','SettingController@addPolicyCategory')->name('add_policy_category');


    Route::post('/save_overseas_document_type','SettingController@saveOverseasDocumentType')->name('save_overseas_document_type');


    Route::get('/delete_institute','SettingController@deleteInstitute')->name('delete_institute');
    Route::get('/delete-policy-category','SettingController@deletePolicyCategory')->name('delete-policy-category');
    Route::get('/delete_institute_type','SettingController@deleteInstituteType')->name('delete_institute_type');
    Route::get('/delete_discipline_fee','SettingController@deleteDiscipline')->name('delete_discipline_fee');

    Route::get('/delete_program_policy','SettingController@deleteProgramPolicy')->name('delete_program_policy');
    Route::get('/delete_overseas_document_type','SettingController@deleteOverseasDocumentType')->name('delete_institute_type');


    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::post('/artical',[ArticalController::class,'data'])->name('artical');


    Route::post('/dynamic',[DynamicPagesController::class,'upload'])->name('dynamic_pages');
    Route::post('/dynamic_pages_slider',[DynamicPagesController::class,'uploadSlider'])->name('dynamic_pages_slider');
    Route::post('/post',[BlogController::class,'blog'])->name('postsh');
    Route::get('/delectblog',[BlogController::class,'deleteBlog'])->name('delectblog');
});


// Group Routes For Institute
Route::group ( ['namespace' => $institute_path,'middleware' => ['auth']], function () {
    Route::get('/institute_profile','ProfileController@index');
    Route::post('/save_institute_document','ProfileController@storeDocument')->name('save_institute_document');
    Route::post('/update_programs','ProfileController@updatePrograms')->name('update_programs');

    Route::get('/institute_profile_edit','ProfileController@editProfile')->name('edit_profile');
    Route::post('/update_institute_profile','ProfileController@updateProfile')->name('update_profile');
    Route::post('/update_password','ProfileController@chnagePassword')->name('update_password');
    Route::post('/profile_avatar','ProfileController@profile_avatar')->name('profile_avatar');
});



 //Overseas routes
 Route::get('/overseas_profile',[overseassController::class, 'profile']);
 Route::post('/save_overseas_document',[overseassController::class, 'storeDocument'])->name('save_overseas_document');


Route::get('validate-institute-name',[RegisterController::class, 'validateName'])->name('validate-name');

Route::get('get-discipline-amount',[SettingController::class, 'getdiscipline'])->name('getdiscipline');


Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
