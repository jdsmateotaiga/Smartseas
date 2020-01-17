<?php
use App\User;
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

    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Auth::routes();
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('dashboard', 'DashboardController@index');
    Route::resource('profile', 'ProfileController');
    Route::get('profile/{$id}', 'ProfileController@show');
    Route::post('profile/update', 'ProfileController@update');

    Route::resource('remark', 'RemarkController');
    Route::post('project/partner/task/{id}', 'TaskController@updateTaskbyPartner');
    Route::get('notification', 'NotificationController@index')->name('notification.index');
    Route::post('notification/update', 'NotificationController@update')->name('notification.update');
    Route::get('search', 'SearchController@query')->name('search.query');

    Route::resource('risklog', 'RiskLogController');
    Route::post('risklog/activate/{id}', 'RiskLogController@activate');
    Route::post('risklog/deactivate/{id}', 'RiskLogController@deactivate');

    Route::resource('progress_report', 'ProgressReportController');
    Route::post('progress_report/activate/{id}', 'ProgressReportController@activate');
    Route::post('progress_report/deactivate/{id}', 'ProgressReportController@deactivate');
    Route::get('view_progress_report/{id}', 'ProgressReportController@show')->name('view_progress_report.show');

    Route::group(['middleware' => 'roles', 'roles'=>['partner']], function () {

      Route::get('project/partner/{id}', 'ProjectController@partnerShowProject');
      Route::get('project/outcome/partner/{id}', 'OutcomeController@partnerShowOutcome');
      Route::get('project/outcome/output/partner/{id}', 'OutputController@partnerShowOutput');
      Route::get('project/outcome/output/activity/partner/{id}', 'ActivityController@partnerShowActivity');

    });

    Route::group(['middleware' => 'roles', 'roles'=>['admin', 'project_manager']], function () {



        Route::post('register', 'Auth\RegisterController@register')->name('register');
        Route::get('register', 'Auth\RegisterController@showRegistrationForm');
        Route::resource('user-management', 'UserManagementController');

        Route::resource('project', 'ProjectController');
        Route::post('project/activate/{id}', 'ProjectController@activate');
        Route::post('project/deactivate/{id}', 'ProjectController@deactivate');

        Route::resource('project/outcome', 'OutcomeController');
        Route::post('project/outcome/activate/{id}', 'OutcomeController@activate');
        Route::post('project/outcome/deactivate/{id}', 'OutcomeController@deactivate');

        Route::resource('project/outcome/output', 'OutputController');
        Route::post('project/outcome/output/activate/{id}', 'OutputController@activate');
        Route::post('project/outcome/output/deactivate/{id}', 'OutputController@deactivate');

        Route::resource('project/outcome/output/activity', 'ActivityController');
        Route::post('project/outcome/output/activity/activate/{id}', 'ActivityController@activate');
        Route::post('project/outcome/output/activity/deactivate/{id}', 'ActivityController@deactivate');

        Route::resource('task', 'TaskController');
        Route::post('task/activate/{id}', 'TaskController@activate');
        Route::post('task/deactivate/{id}', 'TaskController@deactivate');

        Route::resource('budget_code', 'BudgetCodeController');
        Route::post('budget_code/activate/{id}', 'BudgetCodeController@activate');
        Route::post('budget_code/deactivate/{id}', 'BudgetCodeController@deactivate');

        Route::resource('unit_measurement', 'UnitMeasurementController');
        Route::post('unit_measurement/activate/{id}', 'UnitMeasurementController@activate');
        Route::post('unit_measurement/deactivate/{id}', 'UnitMeasurementController@deactivate');

        Route::resource('report', 'ReportController');

    });
