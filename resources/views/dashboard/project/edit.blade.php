@extends('layouts.dashboard')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ action('ProjectController@update', ['id'=> Helper::encrypt_id($project->id) ]) }}" id="update-project">
  {{ Method_field('PUT') }}
  {{ csrf_field() }}
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-12"></div>

        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <div class="layer w-100 mB-10"><h6 class="lh-1">Update {{ $project->title }}</h6></div>
                <div class="mT-30">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="i-2">Project Title</label>
                            <input type="text" class="form-control" id="i-2" autofocus name="title" required value="{{$project->title}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="i-1">Project ID</label>
                            <input type="text" class="form-control" id="i-1" name="project_id" required value="{{$project->project_id}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="i-1">Award ID</label>
                            <input type="text" class="form-control" id="i-1" name="award_id" required value="{{$project->award_id}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="total_project_fund">Total Project Fund</label>
                            <input type="text" class="form-control" name="total_project_fund" id="total_project_fund" value="{{$project->total_project_fund}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="awp_budget">AWP Budget</label>
                            <input type="text" class="form-control" name="awp_budget" id="awp_budget" value="{{$project->awp_budget}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="donors">Donor/s</label>
                            <input type="text" class="form-control" name="donors" id="donors" value="{{$project->donors}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="start_date">Start Date</label>
                            <select class="form-control" id="start_date" name="start_date" required autoComplete="off">
                                @php
                                  for($i = 2010; $i <= 2100; $i++) {
                                @endphp
                                    <option value="{{ $i }}" @if($project->start_date == $i) selected @endif>{{ $i }}</option>
                                @php
                                  }
                                @endphp
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="completion_date">Completion Date, approved extension(if any)</label>
                            <select class="form-control" id="completion_date" name="completion_date" required autoComplete="off">
                                @php
                                  for($i = 2010; $i <= 2100; $i++) {
                                @endphp
                                    <option value="{{ $i }}" @if($project->completion_date == $i) selected @endif>{{ $i }}</option>
                                @php
                                  }
                                @endphp
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="implementing_partner">Implementing Partner</label>
                            <input type="text" class="form-control" id="implementing_partner" name="implementing_partner" value="{{$project->implementing_partner}}">
                        </div>
                    </div>
                    <div>
                        <label>Responsible Partner/s</label>
                        @php
                          $project_users = explode(',', $project->partners);
                          $count = 0;
                        @endphp
                        <div class="form-group">
                            @foreach( $users as $user )
                              @php $count++; @endphp
                                @if ($user->get_role()->name != 'admin')
                                <div class="form-check">
                                    <label class="form-check-label" for="partner-{{ $count }}">
                                        <input class="form-check-input" type="checkbox" id="partner-{{ $count }}" name="partner-{{ $count }}" value="{{ Helper::encrypt_id($user->id) }}" @if( in_array($user->id, $project_users) ) checked @endif>{{ $user->partner_name }}
                                    </label>
                                </div>
                                @endif
                            @endforeach
                            <input type="hidden" name="responsibe_user_count" value="{{ $count }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <div class="layer w-100 mB-10">
                    <h6 class="lh-1">Project Objective</h6>
                </div>
                <div class="mT-30">
                    <textarea class="form-control" id="" cols="100" rows="10" name="objective">{{$project->objective}}</textarea>
                </div>
            </div>
        </div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>
@stop
