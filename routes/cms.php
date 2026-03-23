<?php

use App\Http\Controllers\cms\CareerController;
use App\Http\Controllers\cms\DashboardController;
use App\Http\Controllers\cms\QuestionController;
use App\Http\Controllers\cms\RoadmapController;
use App\Http\Controllers\cms\SkillController;
use App\Http\Controllers\cms\StudentProfileController;
use App\Http\Controllers\cms\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('cms')->name('cms.')->middleware(['auth'])->group(function () {
    Route::get('dashboard',         [DashboardController::class,'dashboard'])->name('dashboard');
        Route::middleware(['admin'])->group(function () {
        Route::resource('user',         UserController::class);

        //Skill
        Route::resource('skill',        SkillController::class);

        //Career
        Route::resource('career',       CareerController::class);

        //Roadmap
        Route::resource('roadmap',      RoadmapController::class);
        Route::get('career-roadmaps/{career_id}', [RoadmapController::class, 'manage'])->name('roadmap.manage');

        //Question
        Route::resource('question',     QuestionController::class);
    });
    //Profile and passwords
    Route::get('profile',           [UserController::class,'profile'])->name('profile');
    Route::put('update-profile',    [UserController::class,'updateProfile'])->name('updateProfile');
    Route::get("/change/password",  [UserController::class,'changePassword'])->name("changePassword");
    Route::post("/update/password", [UserController::class,'updatePassword'])->name("updatePassword");
    //Student Profile
    Route::get('student',           [StudentProfileController::class,'index'])->name('student');
    Route::post('student-update',   [StudentProfileController::class,'update'])->name('student.update');
});
