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
            <th scope="col" align="center">User name</th>
            <th scope="col"  align="center">User create date</th>
            <th scope="col"  align="center">Country/City</th>
            <th scope="col"  align="center">Email (username)</th>
            <th scope="col"  align="center">SCFHS No.</th>
            <th scope="col" align="center">Mobile</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $user)
            <tr>
                <td align="center">{{ $user->id }}</td>
                <td align="center">{{ $user->name }}</td>
                <td align="center">{{ $user->formatted_created_at }}</td>
                <td align="center">
                    {{ $user->profile->country->name ?? '-' }}/{{ $user->profile->city->name ?? '-' }}</td>
                <td align="center">{{ $user->email }}</td>
                <td align="center">{{ $user->profile->saudi_council ?? '-' }}</td>
                <td align="center">{{ $user->profile->mobile ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
