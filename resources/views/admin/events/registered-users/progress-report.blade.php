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
            <th scope="col" align="center">Session List</th>
            <th scope="col"  align="center">Start time</th>
            <th scope="col"  align="center">Out of Session</th>
            <th scope="col"  align="center">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $tracker)
            <tr>
                <td align="center">{{$tracker->id}}</td>
                <td align="center">15/11/2015</td>
                <td align="center">03:00 AM</td>
                <td align="center"> 03:10 AM</td>
                <td align="center">0:Hours - 10 min</td>
            </tr>
        @endforeach
    </tbody>
</table>
