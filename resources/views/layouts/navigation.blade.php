<div>
         <div class="sidebar">
            <div class="sidebar-inner">
               <div class="sidebar-logo">
                  <div class="peers ai-c fxw-nw">
                     <div class="peer peer-greed">
                        <a class="sidebar-link td-n" href="/dashboard" class="td-n">
                           <div class="peers ai-c fxw-nw">
                              <div class="peer">
                                 <div class="logo"><img src="/assets/static/images/smartseas-logo.jpg" alt="" style="width: 100%;"></div>
                              </div>
                              <div class="peer peer-greed">
                                 <h5 class="lh-1 mB-0 logo-text">Smartseas</h5>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="peer">
                        <div class="mobile-toggle sidebar-toggle"><a href="#" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
                     </div>
                  </div>
               </div>
               <ul class="sidebar-menu scrollable pos-r">
                  <li class="nav-item mT-30 {{ ( \Request::is('dashboard') ) ? 'active' : '' }}"><a class="sidebar-link" href="{{ URL::to('/')}}/dashboard" default><span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span class="title">Dashboard</span></a></li>
                  @if ( auth()->user()->hasRole('admin') || auth()->user()->hasRole('project_manager') )
                    <li class="nav-item dropdown {{ ( Route::is('project.create') || Route::is('project.index') || Route::is('project.edit') ) ? 'active open' : '' }}">
                      <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-purple-500 ti-write"></i> </span><span class="title">WorkPlan</span><span class="arrow"><i class="ti-angle-right"></i></span></a>
                      <ul class="dropdown-menu">
                          <li class="{{ ( Route::is('project.create') ) ? 'active' : '' }}"><a class="sidebar-link" href="{{ URL::to('/')}}/project/create">Add WorkPlan</a></li>
                          <li class="{{ ( Route::is('project.index') ) ? 'active' : '' }}"><a class="sidebar-link" href="{{ URL::to('/')}}/project">WorkPlan List ({{ $project_count }})</a></li>
                      </ul>
                    </li>
                    @if ( auth()->user()->hasRole('admin') )
                    <li class="nav-item dropdown {{ ( \Request::is('register') || Route::is('user-management.index') || Route::is('user-management.edit') ) ? 'active open' : '' }}">
                      <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-pink-500 ti-user"></i> </span><span class="title">User Management</span><span class="arrow"><i class="ti-angle-right"></i></span></a>
                      <ul class="dropdown-menu">
                          <li class="{{ ( \Request::is('register') ) ? 'active open' : '' }}"><a class="sidebar-link" href="{{ URL::to('/')}}/register">Add User</a></li>
                          <li class="{{ ( Route::is('user-management.index') ) ? 'active open' : '' }}"><a class="sidebar-link" href="{{ URL::to('/')}}/user-management">User List ({{ $user_count }})</a></li>
                      </ul>
                    </li>
                    @endif
                    <li class="nav-item dropdown {{ ( \Request::is('budget_code') || \Request::is('unit_measurement') ) ? 'active open' : '' }}">
                     <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-pink-500 ti-settings"></i> </span><span class="title">System Settings</span><span class="arrow"><i class="ti-angle-right"></i></span></a>
                     <ul class="dropdown-menu">
                          <li class="{{ ( \Request::is('budget_code') ) ? 'active open' : '' }}"><a class="sidebar-link" href="{{ route('budget_code.index' )}}">Budget Code ({{ $code_count }})</a></li>
                          <li class="{{ ( \Request::is('unit_measurement') ) ? 'active open' : '' }}"><a class="sidebar-link" href="{{ route('unit_measurement.index' )}}">Unit of Measurement ({{ $unit_count }})</a></li>
                      </ul>
                    </li>

                  @endif

                  <li class="nav-item dropdown {{ ( \Request::is('profile') ) ? 'active open' : '' }}">
                     <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-heart"></i> </span><span class="title">User</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                     <ul class="dropdown-menu">
                        <li class="{{ ( \Request::is('profile') ) ? 'active open' : '' }}"><a class="sidebar-link" href="{{ URL::to('/')}}/profile">Profile</a></li>
                        <li><a class="sidebar-link" href="{{ URL::to('/')}}/logout">Logout</a></li>
                     </ul>
                  </li>

               </ul>
            </div>
         </div>
         <div class="page-container">
            <div class="header navbar">
               <div class="header-container">
                  <ul class="nav-left">
                     <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
                  </ul>
                  <ul class="nav-right">
                     <li class="notifications dropdown">
                        <span class="counter bgc-red">{{ $notifications_navigation->where('status', 1)->count() }}</span> <a href="{{ route('notification.update') }}" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-bell"></i></a>

                        <ul class="dropdown-menu">
                           <li class="pX-20 pY-15 bdB"><i class="ti-bell pR-10"></i> <span class="fsz-sm fw-600 c-grey-900">Notifications</span></li>
                           <li>
                              <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                                 @foreach($notifications_navigation as $notification)
                                 <li @if($notification->status == 1) style="border: 1px solid #4caf50; box-sizing: border-box" @endif>
                                    <a href="{{ $notification->url }}" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                       <div class="peer mR-15"><img class="w-3r bdrs-50p" src="{{ $notification->owner->partner_admin_image }}"  title="{{ $notification->owner->partner_name }}"></div>
                                       <div class="peer peer-greed">
                                          <span><span class="fw-500">{{ $notification->body }}</span></span>
                                          <p class="m-0"><small class="fsz-xs">{{ Helper::time_elapsed_string($notification->created_at) }}</small></p>
                                       </div>
                                    </a>
                                 </li>
                                 @endforeach
                              </ul>
                           </li>
                           <li class="pX-20 pY-15 ta-c bdT"><span><a href="{{ route('notification.index') }}" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications <i class="ti-angle-right fsz-xs mL-10"></i></a></span></li>
                        </ul>
                     </li>

                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                           <div class="peer mR-10"><img class="w-2r bdrs-50p profile-img-top" src="{{ auth()->user()->partner_admin_image }}" alt=""></div>
                           <div class="peer"><span class="fsz-sm c-grey-900">{{ auth()->user()->partner_name }} ({{ auth()->user()->partner_code }})</span></div>
                        </a>
                        <ul class="dropdown-menu fsz-sm">

                           <li><a href="{{ URL::to('/')}}/profile" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i> <span>Profile</span></a></li>
                           <li role="separator" class="divider"></li>
                           <li><a href="{{ URL::to('/')}}/logout" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-power-off mR-10"></i> <span>Logout</span></a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
               <div class="search-area">
                  <form action="{{ route('search.query') }}" method="GET">
                    <input class="form-control" type="text" name="q" placeholder="Search by Project, Outcome, Output and Activity" value="{{ isset($_GET['q']) ? $_GET['q'] : '' }}">
                  </form>
               </div>
             </div>
