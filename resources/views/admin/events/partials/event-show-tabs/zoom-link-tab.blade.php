<div class="tab-pane fade zoom-tab" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
    <div class="title">
        {{--                              <p class="message-zoom">No zoom link available to this event</p>--}}
        <h3>Create Zoom link for this event</h3>
    </div>
    <div class="zoom-form">
        <div class="row">
            <div class="col-xl-6 col-12">
                <form action="{{route('admin.events.zoom-links',$event)}}" method="POST" id="events-zoom-links-form">
                    @foreach($event->onlineSessions as $idx => $session)
                    <div class="mb-4">
                        <label for="" class="form-label"><strong>Date {{$loop->iteration}}:</strong> <span>{{$session->start_at->toDateString()}}      {{$session->start_at->toTimeString()}}   to {{$session->end_at->toTimeString()}}  </span></label>
                        <div class="d-flex">
                            <input type="text" class="form-control mx-1" id="" placeholder="Meeting Id" value="{{$session->zoom_meeting_id}}" name="sessions[{{$session->id}}][zoom_meeting_id]">
                            <input type="password" class="form-control" id="" placeholder="Meeting Password" value="{{$session->zoom_meeting_password}}"  name="sessions[{{$session->id}}][zoom_meeting_password]">
                        </div>
                        <span class="message">Add zoom details here</span>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
        <div class="tab-action">
            <button type="button" class="btn btn-primary" id="attach-zoom-links">Attach Zoom link</button>
        </div>
    </div>
</div>
