<style>
    *,
    *:before,
    *:after {
        box-sizing: border-box;
    }

    table {
        background: #ddd;
        width: 100%;
    }

    table thead {
        background: black;
        height: 2em;
    }

    table tbody td {
        text-align: center;
        height: 2em;
        border-bottom: 1px solid;
        border-left: 1px solid;
        font-weight: bold;
    }

    table thead th {
        color: #fff;
    }

</style>
<table class="table">
    <thead>
        <tr>
            <th scope="col" align="center" width="10"># <i class="fa-solid fa-sort"></i></th>
            <th scope="col" align="center">Register name</th>
            <th scope="col"  align="center">Register Date</th>
            <th scope="col"  align="center">Amount</th>
            <th scope="col"  align="center">Promo discount</th>
            <th scope="col"  align="center">Sessions</th>
            <th scope="col" align="center">Attendance</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $user)
            <tr>
                <td align="center">{{ $user->id }}</td>
                <td align="center">{{ $user->name }}</td>
                <td align="center">{{ $user->registeredCourses->first()->pivot->created_at->format('d M Y') }}</td>
                <td align="center"> SAR {{$user->registeredCourses->first()->price}}</td>
                <td align="center">--</td>
                <td align="center">--</td>
                <td align="center">--</td>
            </tr>
        @endforeach
    </tbody>
</table>
