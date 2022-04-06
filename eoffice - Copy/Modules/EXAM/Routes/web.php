<?php

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

Route::group(['prefix' => 'exam', 'as' => 'exam.'], function(){

    Route::get('category-datatables', 'ExamCategoryController@datatables')->name('category.datatables');
    Route::resource('category', ExamCategoryController::class);

    Route::get('group-datatables', 'ExamGroupController@datatables')->name('group.datatables');
    Route::resource('group', ExamGroupController::class);

    Route::get('forms-datatables', 'ExamFormsController@datatables')->name('forms.datatables');
    Route::resource('forms', ExamFormsController::class);
    Route::group(['prefix' => 'form'], function(){
        Route::resource('item', EXAMItemController::class);
    });

    Route::resource('exmination', ExaminationController::class);
    Route::resource('exminationdetail', ExaminationDetailController::class);
    Route::resource('list', ExamListController::class);
    Route::resource('do', DoExamController::class);
    
});