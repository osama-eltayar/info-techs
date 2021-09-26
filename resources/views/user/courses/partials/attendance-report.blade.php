<!-- Report Modal -->
<div class="modal-dialog modal-lg  modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="row">
                <div class="col-6">
                    <p class="left-icon"><i class="fa-solid fa-file-chart-column"></i> Attendance report</p>
                    <h3 class="hours-num">Total hours: {{parseSessionDuration($course->auth_user_trackers_sum_check_point)}} ({{round($course->auth_user_trackers_sum_check_point * 100 / $course->duration)}}%)</h3>
                </div>
                @if($course->auth_user_trackers_sum_check_point >= $course->successNeededMinutes())
                    <div class="col-6 text-right">
                        <div class="green-icon">
                            <i class="fa-solid fa-file-certificate"></i>
                            <p>Certificate is available</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Last Attendance time and date</th>
                        <th scope="col">Title</th>
                        <th scope="col">Progress  </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($course->authUserTrackers as $tracker)
                    <tr>
                        <td >
                            {{$tracker->updated_at}}
                        </td>
                        <td>
                            {{$tracker->trackable->name}}
                        </td>
                        <td>{{$tracker->time_progress}}%</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
