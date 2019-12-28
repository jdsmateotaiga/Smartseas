@extends('layouts.dashboard')
@section('content')
    <div class="bgc-white p-20 bd">
        <h6 class="lh-1">Notifications</h6>
    </div>
    @foreach($notifications_blade as $notification)
    <div class="bgc-white bd mT-10">
        <a href="#" class="peers fxw-nw td-n p-20 c-grey-800 cH-blue bgcH-grey-100">
            <div class="peer mR-15"><img class="w-3r bdrs-50p" src="{{ $notification->owner->partner_admin_image }}" title="{{ $notification->owner->partner_name }}"></div>
            <div class="peer peer-greed">
                <span><span class="fw-500">{{ $notification->body }}</span></span>
                <p class="m-0"><small class="fsz-xs">{{ Helper::time_elapsed_string($notification->created_at) }}</small></p>
            </div>
        </a>
    </div>
    @endforeach
    {{ $notifications_blade->links() }}
@stop
