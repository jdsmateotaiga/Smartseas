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
<form  method="POST" action="{{ action('ProjectController@store') }}" id="create-project">
{{ csrf_field() }}
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-12"></div>

        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <div class="layer w-100 mB-10"><h6 class="lh-1">Create WorkPlan</h6></div>
                <div class="mT-30">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="i-2">Project Title</label>
                            <input type="text" class="form-control" id="i-2" autofocus name="title" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="i-1">Project ID</label>
                            <input type="text" class="form-control" id="i-1" name="project_id" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="i-1">Award ID</label>
                            <input type="text" class="form-control" id="i-1" name="award_id" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="total_project_fund">Total Project Fund</label>
                            <input type="text" class="form-control" name="total_project_fund" id="total_project_fund">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="awp_budget">AWP Budget</label>
                            <input type="text" class="form-control" name="awp_budget" id="awp_budget">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="donors">Donor/s</label>
                            <input type="text" class="form-control" name="donors" id="donors">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="start_date">Start Date</label>
                            <select class="form-control" id="start_date" name="start_date" required autoComplete="off">
                                <option disabled selected>Choose Year</option>
                                @php
                                  for($i = 2010; $i <= 2100; $i++) {
                                @endphp
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @php
                                  }
                                @endphp
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="completion_date">Completion Date, approved extension(if any)</label>
                            <select class="form-control" id="completion_date" name="completion_date" required autoComplete="off">
                                <option disabled selected>Choose Year</option>
                                @php
                                  for($i = 2010; $i <= 2100; $i++) {
                                @endphp
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @php
                                  }
                                @endphp
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="implementing_partner">Implementing Partner</label>
                            <input type="text" class="form-control" id="implementing_partner" name="implementing_partner">
                        </div>
                    </div>
                    <div>
                        <label>Responsible Partner/s</label>
                        <div class="form-group">
                          @php
                            $count = 0;
                            foreach( $users as $user ) {
                              if( !$user->hasRole('admin') ) {
                                $count++;
                          @endphp
                                <div class="form-check">
                                    <label class="form-check-label" for="partner-{{ $count }}">
                                        <input class="form-check-input" type="checkbox" id="partner-{{ $count }}" name="partner-{{ $count }}" value="{{ Helper::encrypt_id($user->id) }}"><strong>{{ $user->partner_code }}</strong> | {{ $user->partner_name }}
                                    </label>
                                </div>
                          @php
                            }
                          }
                          @endphp
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
                    <textarea class="form-control" id="" cols="100" rows="10" name="objective"></textarea>
                </div>
            </div>
        </div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <button type="submit" class="btn btn-primary save">Create</button>
            </div>
        </div>
    </div>
</form>
@stop
