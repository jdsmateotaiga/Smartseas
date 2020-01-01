<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use View;
use App\User;
use App\Project;
use App\BudgetCode;
use App\Notification;
use Request;
use Auth;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        view()->composer('*', function ($view)
        {
            $view->with('user_count', $this->get_user_count() );
            $view->with('project_count', $this->get_project_count() );
            $view->with('code_count', $this->get_code_count());
            $view->with('unit_count', $this->get_unit_count());
            $view->with('notifications_navigation', $this->get_notifications());
        });
    }

    public function get_notifications() {
      if(Auth::check()) {
        $notification = Notification::with('owner')->where('to_user_id', auth()->user()->id)->take(5)->get();
        return $notification;
      }
    }

    public function get_user_count() {
      if(Auth::check()) {
        $users = DB::table('users')->where('active', 1)->count();
        return $users;
      }
    }

    public function get_project_count() {
      $projects = DB::table('projects')->where('active', 1);
        if(Auth::check()) {
          if( auth()->user()->hasRole('admin') ) {
            return $projects->count();
          } else {
            return $projects->where('user_id', auth()->user()->id)
                    ->count();
          }
        }

    }

    public function get_code_count() {
      if(Auth::check()) {
        $code = DB::table('budget_codes')->where('active', 1)->count();
        return $code;
      }
    }

    public function get_unit_count() {
      if(Auth::check()) {
        $unit_measurement = DB::table('unit_measurements')->where('active', 1)->count();
        return $unit_measurement;
      }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
