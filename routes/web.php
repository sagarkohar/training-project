<?php

use App\Http\Controllers\firstController;
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
