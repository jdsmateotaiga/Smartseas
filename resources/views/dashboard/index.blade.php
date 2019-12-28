@extends('layouts.dashboard')
@section('content')
  @if( !auth()->user()->hasRole('admin') )
  <div class="bgc-white p-20 bd">
     <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item w-100">
            <div class="layer w-100 mB-20"><h3 class="lh-1">My Projects</h3></div>
            <div class="row gap-20">
              @include('dashboard.project.project-list.index')
            </div>
        </div>
    </div>
  </div>
  @endif
  @if( auth()->user()->hasRole('admin') || auth()->user()->hasRole('project_manager') )
  <div class="bgc-white p-20 bd">
     <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

        <div class="masonry-item col-12">
           <div class="bd bgc-white p-20">
              @if(!$users->isEmpty())
                <div class="layers">
                 <div class="layer w-100 mB-10"><h6 class="lh-1">Active Partner</h6></div>
                 <div class="table-responsive">
                    <table class="table">
                       <thead>
                             <tr>
                                <th class="bdwT-0">Name</th>
                                <th class="bdwT-0" style="width: 150px;">Partner Code</th>
                                <th class="bdwT-0">Partner Name</th>
                                <th class="bdwT-0">Partner Admin Name</th>
                                <th class="bdwT-0">Email</th>
                             </tr>
                       </thead>
                       <tbody>

                             @foreach( $users as $user )
                                 <tr>
                                    <td class="fw-600"><p class="dashboard-img"><img src="{{ $user->partner_admin_image }}" alt=""></p></td>
                                    <td style="width: 150px;">{{ $user->partner_code }}</td>
                                    <td><a href="{{ URL::to('/') }}/profile/{{ Helper::encrypt_id($user->id) }}">{{ $user->partner_name }}</a></td>
                                    <td>{{ $user->partner_admin_name }}</td>
                                    <td>{{ $user->email }}</td>
                                 </tr>
                             @endforeach
                       </tbody>
                    </table>
                 </div>
              </div>
              @else
                <tr>
                    <td colspan="5">No Active Partner</td>
                </tr>
              @endif
           </div>
        </div>
     </div>
  </div>
  @endif
@stop
