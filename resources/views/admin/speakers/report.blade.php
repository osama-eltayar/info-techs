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
          <th scope="col" align="center" ># <i class="fa-solid fa-sort"></i></th>
          <th scope="col" width="20"  align="center">Title</th>
          <th scope="col" width="20"  align="center">Speaker name</th>
          <th scope="col" width="20"  align="center">Speaker create date</th>
          <th scope="col" width="20"  align="center">Phone</th>
          <th scope="col" width="30"  align="center">Country/City</th>
          <th scope="col"  align="center">Activities</th>
          <th scope="col" width="20"  align="center">Position</th>
          <th scope="col" width="30"  align="center">Email (username)</th>
      </tr>
    </thead>
    <tbody>
    @forelse($data as $speaker)
        <tr>
            <td align="center">{{$speaker->id}}</td>
            <td align="center">{{$speaker->title->name}}</td>
            <td align="center">{{$speaker->name}}</td>
            <td align="center">{{$speaker->formatted_created_at}}</td>
            <td align="center">{{$speaker->mobile}}</td>
            <td align="center">{{$speaker->country? $speaker->country->name.'/' : ''}}{{$speaker->city? $speaker->city->name : ''}}</td>
            <td align="center">{{$speaker->courses_count}}</td>
            <td align="center">{{$speaker->position}}</td>
            <td align="center">{{$speaker->email}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
