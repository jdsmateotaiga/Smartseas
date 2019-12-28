
@foreach( $projects as $project )
    <div class="col-md-4 workplan-list">
        <div class="layers bd bgc-white pB-20 pL-20 pR-20" @if( $project->active == 0 ) style="border-color: red!important;" @endif>
            <div class="controls mT-5 mB-5">
              @if ( auth()->user()->hasRole('partner') )
                <a href="{{ action('ProjectController@partnerShowProject', Helper::encrypt_id($project->id)) }}" title="View this Project"><i class="c-green-500 ti-eye"></i></a>
              @endif
              @if( !auth()->user()->hasRole('partner') )
                 <a href="{{ route('report.show', ['id' => Helper::encrypt_id($project->id)]) }}"><i class="c-green-500 ti-agenda"></i></a>
                 <a href="{{ route('project.show', ['id' => Helper::encrypt_id($project->id)]) }}" title="View this Project"><i class="c-green-500 ti-eye"></i></a>
                 <a class="lib mL-5" href="{{ route('project.edit', ['id' => Helper::encrypt_id($project->id)]) }}" title="Edit this Project"><i class="c-blue-500 ti-pencil-alt"></i></a>
                 @if($project->active == 1)
                 <form style="display: inline-block; vertical-align: middle;" action="{{ action('ProjectController@deactivate', [ 'id'=> Helper::encrypt_id($project->id)] )}}" method="post">
                       {{ csrf_field() }}
                       <button type="submit" class="btn btn-danger" title="Remove this project"  onclick="return confirm('Are you sure you want to remove this project?');"><i class="ti-trash"></i></button>
                 </form>
                 @elseif($project->active == 0)
                 <form style="display: inline-block; vertical-align: middle;" action="{{ action('ProjectController@activate', [ 'id'=> Helper::encrypt_id($project->id)] )}}" method="post">
                       {{ csrf_field() }}
                       <button type="submit" class="btn btn-success" title="Activate this project"  onclick="return confirm('Are you sure you want to activate this project?');"><i class="c-green-500 ti-check"></i></button>
                 </form>
                 @endif
              @endif
            </div>
            <div class="layer w-100 mB-10">
                <h5 class="lh-1" title="{{ $project->title }}" style="height: 20px; overflow:hidden;">
                  {{ $project->title }}
                </h5>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mB-0 lh-1-4"><small><strong>Project ID :</strong>&nbsp;{{ $project->project_id }}</small></p>
                        <p class="mB-0 lh-1-4"><small><strong>Award ID :</strong>&nbsp;{{ $project->award_id }}</small></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mB-0 lh-1-4"><small><strong>Start Date :</strong>&nbsp;{{ $project->start_date }}</small></p>
                        <p class="mB-0 lh-1-4"><small><strong>End Date :</strong>&nbsp;{{ $project->completion_date }}</small></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mB-0 lh-1-4"><small><strong>Active Outcomes :</strong>&nbsp;{{ $project->outcomes->where('active', 1)->count() }}</small></p>
                        <p class="mB-0 lh-1-4"><small><strong>Active Outputs :</strong>&nbsp;{{ $project->outputs->where('active', 1)->count() }}</small></p>
                        <p class="mB-0 lh-1-4"><small><strong>Active Activity :</strong>&nbsp;{{ $project->activities->where('active', 1)->count() }}</small></p>
                        <p class="mB-0 lh-1-4"><small><strong>Active Tasks :</strong>&nbsp;{{ $project->tasks->where('active', 1)->count() }}</small></p>
                        <p class="mB-0 lh-1-4"><small><strong>Active User :</strong>&nbsp;{{ count(explode(',', $project->partners)) }}</small></p>
                    </div>
                      <div class="col-md-6">
                        <p class="mB-0 lh-1-4">
                          <small><strong>Project Owner: </strong>
                            @if( $project->owner->active != 0 )
                              @if ( Auth::id() == $project->owner->id )
                                  Me
                              @else
                                  {{ $project->owner->partner_name }}
                              @endif
                            @else
                              {{ $project->owner->partner_name }}&nbsp;<span class="danger">Account Removed</span>
                            @endif
                          </small>
                        </p>
                      </div>

                </div>
            </div>
            @php
              $task_percentage = 0;
              foreach($project->tasks as $task) {
                  $task_percentage += $task->progress;
              }
              $task_percentage = @($task_percentage/$project->tasks->count());
              if(is_nan($task_percentage)) {
                $task_percentage = 0;
              }
            @endphp
            <div class="layer w-100">
                <div class="peers ai-sb fxw-nw">
                    <div class="peer peer-greed report-container">
                        <small class="fw-600 c-grey-700">Status Progress</small>
                        <span class="pull-right c-grey-600 fsz-sm">{{ round($task_percentage) }}%</span>
                        <div class="progress">
                            <div class="progress-bar bgc-light-blue-500" role="progressbar" aria-valuenow="{{ $task_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task_percentage }}%">
                                <span class="sr-only">{{ round($task_percentage) }}% Complete</span>
                            </div>
                        </div>
                        <p class="center mB-0 lh-1"><a href="#show-more-{{ $project->id }}" data-toggle="modal">Show Tasks</a></p>

                          <div class="modal fade" id="show-more-{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content p-20">
                                <div class="row">
                                  @if(!$project->tasks->isEmpty())
                                    @foreach($project->tasks as $task)
                                      @if($task->active == 1 || auth()->user()->hasRole('admin'))
                                      <div class="col-md-6 mB-5">
                                        <p class="bd pL-10 pR-10 pT-5 pB-5 mB-0
                                          st-{{ $task->status }}
                                          "
                                          @if( $task->progress == 100 ) style="border: 1px solid green" @endif>
                                          @if ( auth()->user()->hasRole('partner') )
                                            <a href="{{ action('ActivityController@partnerShowActivity', Helper::encrypt_id($task->activity_id)) }}#AC{{$task->id}}">{{ $task->user->partner_code }}</a>
                                          @else
                                            <a href="{{ route('activity.show', ['id' => Helper::encrypt_id($task->activity_id)]) }}#AC{{$task->id}}">{{ $task->user->partner_code }}</a>
                                          @endif
                                          <span style="float: right;"><span class="chip"></span> {{ $task->progress }}%</span>
                                        </p>
                                      </div>
                                      @endif
                                    @endforeach
                                  @else
                                      <center>No Task Available!</center>
                                  @endif
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
