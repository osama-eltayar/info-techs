<div class="table-title">
    <div class="row">
        <div class="col-lg-6 col-12">
            <h3>Speakers activities</h3>
        </div>
        <div class="col-lg-6 col-12 text-end">
            <h3>
                Export report    
                <a class="btn-file btn-pdf" href="#"><i class="fa-solid fa-file-pdf"></i></a>
                <a class="btn-file btn-excel" href="#"><i class="fa-solid fa-file-excel"></i></a>
            </h3>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped">
    <tr>
        <th scope="col"># <i class="fa-solid fa-sort"></i></th>
        <th scope="col">Event name</th>
        <th scope="col">Event type</th>
        <th scope="col">Days</th>
        <th scope="col">Start date</th>
        <th scope="col">End Date</th>
        <th scope="col">Event Sponsorship</th>
      </tr>
    </thead>
    <tbody>
    @foreach($speaker->courses as $course)
        <tr>
            <td>{{$course->id}}</td>
            <td>{{$course->title}}</td>
            <td>{{$course->type_string}}</td>
            <td>{{$course->days_count}}</td>
            <td>{{$course->formatted_start_date}}</td>
            <td>{{$course->formatted_end_date}}</td>
            <td>
                SAR {{$course->price}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
