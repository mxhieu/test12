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

Route::group(['prefix' => 'kpi', 'as' => 'kpi.'], function(){

    Route::get('category-datatables', 'KpiCategoryController@datatables')->name('category.datatables');
    Route::resource('category', KpiCategoryController::class);

    Route::get('group-datatables', 'KpiGroupController@datatables')->name('group.datatables');
    Route::resource('group', KpiGroupController::class);

    Route::get('form-datatables', 'KpiFormController@datatables')->name('form.datatables');
    Route::resource('form', KpiFormController::class);

    Route::group(['prefix' => 'form'], function(){
        Route::get('form-item-datatables/{formId}', 'KpiItemController@datatables')->name('item.datatables');
        Route::get('item/{formId}', 'KpiItemController@index')->name('item.index');
        Route::post('item/{formId}/store', 'KpiItemController@store')->name('item.store');
        Route::get('item/{id}/edit', 'KpiItemController@edit')->name('item.edit');
        Route::put('item/{id}/update', 'KpiItemController@update')->name('item.update');
        Route::delete('item/{id}/destroy', 'KpiItemController@destroy')->name('item.destroy');
        
    });

    Route::get('term-datatables', 'KpiTermController@datatables')->name('term.datatables');
    Route::resource('term', KpiTermController::class);

    Route::group(['prefix' => 'term'], function(){
        Route::get('detail-datatables/{termId}', 'KpiApplyController@datatables')->name('termdetail.datatables');
        Route::get('detail/{termId}', 'KpiApplyController@index')->name('term.detail');
        Route::post('detail/{termId}/store', 'KpiApplyController@store')->name('termdetail.store');
        // Route::get('item/{id}/edit', 'KpiItemController@edit')->name('item.edit');
        // Route::put('item/{id}/update', 'KpiItemController@update')->name('item.update');
        // Route::delete('item/{id}/destroy', 'KpiItemController@destroy')->name('item.destroy');
        
    });

    Route::group(['prefix' => 'evaluate'], function(){
        Route::post('store', 'KpiEvaluteController@store')->name('evaluate.store');
        
    });

    Route::get('periodsdata', 'KPIPeriodsController@datatable')->name('periods.datatables');
    Route::resource('periods', KPIPeriodsController::class);
});
