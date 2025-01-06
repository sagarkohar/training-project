<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\firstController;
use App\Http\Controllers\login;
use App\Http\Controllers\rolepermission;
use App\Http\Controllers\secondController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(firstController::class)->group(function () {
    Route::get('/', 'index')->name("index");
    Route::get('/addcourse', 'addCourse')->name("add-course");
    Route::get("/module/{module_id}/addMaterial/{material_id}", [firstController::class, 'addMaterial'])->name("addMaterail");
    Route::get('/addModule/{module_id}', [firstController::class, 'addModule'])->name('addModule');
    Route::get("/addQuestion/module/{module_Id}/question/{question_no}", [firstController::class, 'addQuestion'])->name("addQuestion");

    Route::post("/addCourse", [firstController::class, 'addNewCourse']);
    Route::get("/delete-course{id}", [firstController::class, 'deleteCourse'])->name("delete-course");
    Route::get('learning-home', [firstController::class, 'learningHome'])->name("learning-home");
    Route::get("/view-course{id}", [firstController::class, 'viewCourse'])->name("view-course");
    Route::get("/edit-course{id}", [firstController::class, 'editCourse'])->name("edit-course");

    Route::post("editCourse{courseId}", [firstController::class, 'updateCourse']);
});


Route::controller(secondController::class)->group(function () {
    Route::get("attendance-home", 'attendaceHome')->name("attendanceHome");
    Route::get("add_Attendance", 'addAttendace')->name("addAttendace");

    Route::post("addAttendance", 'newAttendance');
    Route::post("delete_Attendance", "deleteAttendance");
});

// Route::middleware(['checkUser'])->group(function () {
Route::controller(rolepermission::class)->group(function () {

    Route::get("designations", "designation")->name("designation")->middleware('checkRole:Roles.view');
    // Route::get("designations", "designation")->name("designation");
    Route::get("add-designation", "addDesignationView")->middleware('auth:sanctum');
    Route::post("add-designation", "addDesignationMethod");
    Route::get("permissions", 'permissions')->name("permissions");
    Route::get("/add-permission", 'addPermissionView');
    Route::post("add-permission", "addPermissionMethod");
    Route::get("show-permission-{role}", "showPermissionRole")->middleware('checkRole:Permissions.view');
    Route::post("assign-permission", "assignPermission")->middleware('checkRole:Permissions.assign');
    Route::get("users", "users")->middleware('checkRole:Users.view');
    Route::get("user-roles-{user}", "userRole")->middleware('checkRole:Roles.view');
    Route::post("assign-roles", "assignRoles")->middleware('checkRole:Roles.edit');
    Route::get("profile", 'profile')->name("profile");
    Route::get("/view-user-{name}", 'viewUser');
    Route::get("/delete-user-{name}", 'deleteUser');
    Route::get("/edit-user-{name}", 'editUser');
    Route::get("/create-user", 'createUser');
    Route::get("assets", "assets")->middleware('checkRole:Assets.view');
    Route::get("view-assets", 'viewAssets');
    Route::get("delete-assets", 'deleteAssets');
    Route::get("create-assets", 'createAssets');
    Route::get("edit-assets", 'editAssets');
    Route::get("record-assets", 'recordAssets');
    Route::get("rec_own-assets", 'rec_ownAssets');
});
// });



Route::controller(login::class)->group(function () {

    Route::get("/login_page", 'loginPage')->name("loginpage");
    Route::post("/login", 'login');
    Route::get("/logout", 'logout');
});