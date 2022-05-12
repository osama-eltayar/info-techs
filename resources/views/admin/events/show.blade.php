@extends('admin.layouts.app')
@section('content')
<!-- Start Content -->
<div class="content-side">
    <div class="page-title">
        <div class="container-fluid "><h1><img src="/admin/assets/img/icon2.png" alt="icon">Event details</h1></div>

    </div>
    <div class="container-fluid bg-blue">
        <div class="content-body">
            <div class="event-title">
                <span><strong>Event Title:</strong>  About Sociology</span>
                <ul class="list-unstyled">
                    <li>{{$event->state}}</li>
                </ul>
                <div class="event-status">
                    @if ($event->isOnlineEvent())
                    <span>Event Online</span>
                    @endif
                </div>
            </div>

            <div class="tabs-event">
                <ul class="nav nav-pills " id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true"><i class="fa-solid fa-square-info"></i> Event Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false"><i class="fa-solid fa-file-certificate"></i> Certificate & Badges</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3" aria-selected="false"><i class="fa-solid fa-video"></i> Zoom Link</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4" aria-selected="true"><i class="fa-solid fa-flag"></i> Event status</button>
                    </li>

                  </ul>

                  <div class="tab-content" id="pills-tabContent">
                      @include('admin.events.partials.event-show-tabs.event-details-tab')
                      @include('admin.events.partials.event-show-tabs.certificate-tab')
                      @include('admin.events.partials.event-show-tabs.zoom-link-tab')
                      @include('admin.events.partials.event-show-tabs.event-status-tab')
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
        <script>
              const badgeUrl = '{{$event->badge_url}}'
        </script>
    <script src="{{asset('/admin/assets/js/events/show.min.js')}}"></script>
@endsection
