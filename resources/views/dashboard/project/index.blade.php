@extends('layouts.dashboard')
@section('content')
<div class="filter-area bgc-white pT-10 pL-20 pR-20 bd mB-30">
  <label for="" style="width: 100%; text-align: center;"><strong>Filter by Date</strong></label>
  <form class="toggle-container" action="" method="GET">
    <div class="row">
        <div class="row col-md-10">
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
                <label for="end_date">Last Date</label>
                <select class="form-control" id="end_date" name="end_date" required autoComplete="off">
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
        <div class="col-md-2">
            <label style="display: block;" class="pc-only">&nbsp;</label>
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>
  </form>
  <p class="text-center mB-5"><a href="#" class="filter-arrow"><i class="ti-angle-down"></i><i class="ti-angle-up"></i></a></p>
</div>
<div>
    @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif
</div>
<div class="bgc-white p-20 bd mB-20" id="project-board">
   <div class="layer w-100 mB-0"> <h2 class="lh-1 mB-0">WorkPlan List</h2></div>
</div>

<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>
    <div class="masonry-item w-100">
        <div class="row gap-20">
          @include('dashboard.project.project-list.index')
        </div>
    </div>
</div>
@stop
