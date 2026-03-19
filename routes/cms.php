<?php

use App\Http\Controllers\cms\CareerController;
use App\Http\Controllers\cms\DashboardController;
use App\Http\Controllers\cms\QuestionController;
use App\Http\Controllers\cms\RoadmapController;
use App\Http\Controllers\cms\SkillController;
use App\Http\Controllers\cms\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('cms')->name('cms.')->middleware(['auth'])->group(function () {
    Route::get('dashboard',         [DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('user',         UserController::class);
    Route::get('profile',           [UserController::class,'profile'])->name('profile');
    Route::put('update-profile',    [UserController::class,'updateProfile'])->name('updateProfile');
    Route::get("/change/password",  [UserController::class,'changePassword'])->name("changePassword");
    Route::post("/update/password", [UserController::class,'updatePassword'])->name("updatePassword");

    //Skill
    Route::resource('skill',        SkillController::class);

    //Career
    Route::resource('career',       CareerController::class);

    //Roadmap
    Route::resource('roadmap',     RoadmapController::class);
    Route::get('career-roadmaps/{career_id}', [RoadmapController::class, 'manage'])->name('roadmap.manage');

    //Question
    Route::resource('question',     QuestionController::class);
});
