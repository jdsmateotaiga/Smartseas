<div class="layers">
    <div class="layer w-100 fxg-1 bgc-grey-200 pos-r ps">
        <div class="p-20 gapY-15 message-content">
            @if( !$task->remarks->isEmpty() )
              @foreach( $task->remarks as $remark )
                <div class="peers fxw-nw @if( Auth::id() == $remark->user_id ) ai-fe @endif">
                    <div class="peer @if( Auth::id() == $remark->user_id ) ord-1 mL-20 @else mR-20 @endif ">
                      @if( Auth::id() == $remark->user_id )
                        <img class="w-2r bdrs-50p" src="{{ auth()->user()->partner_admin_image }}" title="{{ auth()->user()->partner_name }}">
                      @else
                        <img class="w-2r bdrs-50p" src="{{ $task->user->partner_admin_image }}" title="{{ $task->user->partner_name }}">
                      @endif
                    </div>
                    <div class="peer peer-greed @if( Auth::id() == $remark->user_id ) ord-0 @endif">
                        <div class="layers  @if( Auth::id() == $remark->user_id ) ai-fe gapY-10 @else ai-fs gapY-5 @endif ">
                            <div class="layer">
                                <div class="fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                    <div><span>{{ $remark->body }}</span></div>
                                    <div style="text-align:@if( auth()->user()->id == $remark->user_id ) right @else left @endif;">
                                      <small title="{{ date("M d Y", strtotime($remark->created_at)) }}">{{ date("h:i:a", strtotime($remark->created_at)) }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            @else
              <p class="no-remarks">No remarks available.</p>
            @endif
        </div>
    </div>
    <div class="layer w-100">
        <div class="pT-10 pB-10 bdT bgc-white">
            <div class="pos-r">
              <form action="{{ action('RemarkController@store') }}" method="POST" class="send-message">
                  {{ csrf_field() }}
                  <input type="hidden" name="task_id" value="{{ Helper::encrypt_id($task->id) }}">
                  <textarea class="form-control m-0 body-message" placeholder="Say something..." name="body" required></textarea>
                  <button type="submit" class="btn btn-primary mT-5" style="float: right;"><i class="fa fa-paper-plane-o"></i></button>
              </form>
            </div>
        </div>
    </div>
</div>
