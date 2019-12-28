@if( !auth()->user()->hasRole('partner') )
  <div class="mT-30 mL-20 mB-10">
    <div class="layer w-100 text-left">
      <h4 class="lh-1 mB-5 lib vam">Task List</h4>&nbsp;
        <a class="btn btn-success create-task pX-5 pY-2"
        data-toggle="modal"
        data-target="#create-task"
        data-project_id="{{ Helper::encrypt_id($activity->project->id) }}"
        data-outcome_id="{{ Helper::encrypt_id($activity->outcome->id) }}"
        data-output_id="{{ Helper::encrypt_id($activity->output->id) }}"
        data-activity_id="{{ Helper::encrypt_id($activity->id) }}"
        >
          <i class="ti-plus"></i>
        </a>
    </div>
  </div>
  @include('dashboard.project.task.create')
  @include('dashboard.project.task.edit')
@endif
@if( !$activity->get_tasks()->isEmpty() )
<div id="task-container" class="mL-20">
    @foreach( $activity->get_tasks() as $task )
      @if($task->active == 1 || auth()->user()->hasRole('admin'))
        <div id="AC{{ $task->id }}" class="task-list toggle-parent mB-0 bgc-white p-10 bd mT-5" style="@if( $task->progress == 100 ) border: 2px solid green; box-sizing: border-box; @endif @if($task->active == 0) border-color: red!important; @endif">
            <h6 class="lh-1 mB-0">
              <a href="#" class="toggle-class"><strong>{{ Helper::the_excerpt($task->title, 50) }} </strong></a>
              @if( !auth()->user()->hasRole('partner') )
                <a class="lib mL-10 modal-edit"
                data-toggle="modal"
                data-target="#edit-task"
                href="#edit-task"
                data-edit-url="{{ action('TaskController@edit', ['id'=> Helper::encrypt_id($task->id) ])}}"
                data-action-url="{{ action('TaskController@update', ['id'=> Helper::encrypt_id($task->id) ])}}">
                  <i class="c-blue-500 ti-pencil-alt"></i>
                </a>
                @if($task->active == 1)
                <form style="display: inline-block; vertical-align: middle;" action="{{ action('TaskController@deactivate', [ 'id'=> Helper::encrypt_id($task->id)] )}}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger del"  onclick="return confirm('Are you sure you want to remove this task?');"><i class="ti-trash"></i></button>
                </form>
                @elseif($task->active == 0)
                <form style="display: inline-block; vertical-align: middle;" action="{{ action('TaskController@activate', [ 'id'=> Helper::encrypt_id($task->id)] )}}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success act"  onclick="return confirm('Are you sure you want to activate this task?');"><i class="c-green-500 ti-check"></i></button>
                </form>
                @endif
              @endif
              <div class="mT-5">
                  <span class="ls-0 fwN">
                      {{ $task->progress }}%
                      @if($task->progress == 25)
                        Not Adequate
                      @elseif ($task->progress == 50)
                        Very Partially
                      @elseif ($task->progress == 75)
                        Partially
                      @elseif($task->progress == 100)
                        Largely
                      @endif
                  </span>|
                  <span class="ls-0 fwN st-{{ $task->status }}">
                      Status<span class="chip mL-5"></span>
                  </span>
              </div>
            </h6>
            <div class="task-area toggle-area mT-15">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <p class="col-md-12 mB-0"><strong>Responsible Partner:</strong> {{ $task->user->partner_code }} | {{ $task->user->partner_name }}</p>
                    <p class="col-md-12 mB-0"><strong>Code:</strong> {{ $task->budget_code->code }} - {{ $task->budget_code->description }}</p>
                    <p class="col-md-12 mB-0"><strong>Fund Source:</strong> {{ $task->fund_source }}</p>
                    <p class="col-md-12 mB-0"><strong>Amount:</strong> {{ $task->amount }}</p>
                    <p class="col-md-12 mB-0 st-{{ $task->status }}"><strong>Task Status:</strong> <span>{{ ucfirst($task->status) }}</span><span class="chip mL-5"></span></p>
                    <p class="col-md-12 mB-0"><strong>Unit of Measurement:</strong> {{ $task->unit_of_measurement->unit }} - {{ $task->unit_of_measurement->unit }}</p>
                  </div>
                  <div class="row">
                    @php
                      $quarter = explode(',', $task->timeline);
                    @endphp
                    <p class="col-md-12 mB-0"><strong>Timeline (Quarter): </strong></p>
                    <p class="col-md-3 mB-0"><span class="timeline-bar @if( in_array('1', $quarter) ) active @endif">1st</span></p>
                    <p class="col-md-3 mB-0"><span class="timeline-bar @if( in_array('2', $quarter) ) active @endif">2nd</span></p>
                    <p class="col-md-3 mB-0"><span class="timeline-bar @if( in_array('3', $quarter) ) active @endif">3rd</span></p>
                    <p class="col-md-3 mB-0"><span class="timeline-bar @if( in_array('4', $quarter) ) active @endif">4th</span></p>
                    <p class="col-md-12 mB-10"><strong>Months:</strong> {{ $task->month }}</p>
                  </div>

                  <div class="peers ai-sb fxw-nw mB-0">
                      <div class="pY-5">
                          <strong>Work Progress</strong>
                      </div>
                      <div class="peer peer-greed pL-10 mT-10">
                          <sup class="progress-sup" style="float: right;">
                            {{ $task->progress }}%
                            @if($task->progress == 25)
                              Not Adequate
                            @elseif ($task->progress == 50)
                              Very Partially
                            @elseif ($task->progress == 75)
                              Partially
                            @elseif($task->progress == 100)
                              Largely
                            @endif
                          </sup>
                          <div class="progress mT-3" style="height: 12px;">
                              <div class="progress-bar bgc-light-blue-500" role="progressbar" aria-valuenow="{{ $task->progress }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $task->progress }}%; @if( $task->mode == 'is_completed' ) background-color: green!important; @endif"></div>
                          </div>
                      </div>
                  </div>
                  <div class="mB-20">
                    <strong>Task Description: </strong>
                    {{ Helper::the_excerpt($task->description, 20) }}
                    @if ( strlen($task->description) > 20 )
                      <a href="#modal"
                      data-toggle="modal"
                      data-target="#modal"
                      data-content="{{ $task->description }}"
                      data-title="{{ $task->name }}"
                      class="see-more">see more</a>
                    @endif
                  </div>

                  <div class="task-update-container">
                      <div class="row">
                        <strong class="col-xs-12 col-md-6">Update Work Progress</strong>
                        <p class="col-xs-12 col-md-6 slider-completed mB-0" style="text-align: right;">
                          <span class="s-f">{{ $task->progress }}</span>%
                          <span class="s-l">
                            @if($task->progress == 25)
                              Not Adequate
                            @elseif ($task->progress == 50)
                              Very Partially
                            @elseif ($task->progress == 75)
                              Partially
                            @elseif($task->progress == 100)
                              Largely
                            @endif
                          </span>
                        </p>
                      </div>

                      <div id="slider" class="ui-slider-common ui-corner-all ui-slider-horizontal ui-widget ui-widget-content mT-10" data-val="{{ $task->progress }}">
                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                      </div>
                      <form action="{{ action('TaskController@updateTaskbyPartner', ['id' => Helper::encrypt_id($task->id)]) }}" method="POST" class="task_update">
                        {{ csrf_field() }}
                        <input type="hidden" class="task_progress" name="progress" value="{{ $task->progress }}">
                      </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <p><strong>Remarks from responsible partner:</strong></p>
                  @include('dashboard.project.task.remarks')
                </div>
              </div>
            </div>
        </div>
      @endif
    @endforeach
</div>
@endif
