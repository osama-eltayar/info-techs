<style>
    *, *:before, *:after {
        box-sizing: border-box;
    }
    table{
        background: #ddd;
        width: 100%;
    }
    table thead{
        background: black;
        height: 2em;
    }
    table tbody td{
        text-align: center;
        height: 2em;
        border-bottom: 1px solid;
        border-left: 1px solid;
        font-weight: bold;
    }
    table thead th{
        color: #fff;
    }
</style>
<table class="table" >
    <thead>
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
    @foreach($data as $course)
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
