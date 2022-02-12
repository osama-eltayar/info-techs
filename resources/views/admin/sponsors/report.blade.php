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
          <th scope="col" width="20"  align="center">Sponsor name</th>
          <th scope="col" width="20"  align="center">Sponsor create date</th>
          <th scope="col" width="20"  align="center">Phone</th>
          <th scope="col" width="30"  align="center">Country/City</th>
          <th scope="col"  align="center">Activities</th>
          <th scope="col" width="30"  align="center">Email (username)</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $sponsor)
        <tr>
            <td align="center" >{{$sponsor->id}}</td>
            <td align="center" >{{$sponsor->name}}</td>
            <td align="center" >{{$sponsor->formatted_created_at}}</td>
            <td align="center" >{{$sponsor->mobile}}</td>
            <td align="center" >{{$sponsor->country->name}}/{{$sponsor->city->name}}</td>
            <td align="center" >{{$sponsor->courses_count}}</td>
            <td align="center" >{{$sponsor->email}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
