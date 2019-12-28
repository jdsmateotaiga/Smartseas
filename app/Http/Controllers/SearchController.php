<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DB;

class SearchController extends Controller
{
    //
    public function query() {
      // Get Possible Combination of Keyword
      $keyword = [$_GET['q']];
      $key_arr = explode(' ', $_GET['q']);
      foreach($key_arr as $word) {
        array_push($keyword, $word);
      }
      // Project
      $projects = $this->model_query('projects','title', $keyword);
      $outcomes = $this->model_query('outcomes','title', $keyword);
      $outputs = $this->model_query('outputs','title', $keyword);
      $activities = $this->model_query('activities','title', $keyword);
      return view('dashboard.searchresult.index')
             ->with('projects', $projects)
             ->with('outcomes', $outcomes)
             ->with('outputs', $outputs)
             ->with('activities', $activities);
    }

    public function model_query($table, $column, $keyword) {
        $query   =  DB::table($table);
        if(auth()->user()->hasRole('admin')) {
          foreach($keyword as $word) {
            $query->orWhere($column, 'LIKE', '%'.$word.'%');
          }
          return $query->distinct()->get();
        }
        if(auth()->user()->hasRole('project_manager')) {
          foreach($keyword as $word) {
            $query->orWhere($column, 'LIKE', '%'.$word.'%');
          }
          return $query->where('active', '=', 1)
                ->where('user_id', '=', auth()->user()->id)
                ->distinct()->get();
        }

    }
}
