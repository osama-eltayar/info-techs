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
            <th scope="col" align="center">Invoice Number</th>
            <th scope="col"  align="center">Name</th>
            <th scope="col"  align="center">Invoice Date</th>
            <th scope="col"  align="center">Event Name</th>
            <th scope="col"  align="center">Event Type</th>
            <th scope="col" align="center">Event Amount</th>
            <th scope="col" align="center">Paid Amount</th>
            <th scope="col" align="center">Paid Before</th>
            <th scope="col" align="center">Promocode</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $shoppingCart)
            <tr>
                <td align="center">{{$shoppingCart->id }}</td>
                <td align="center">{{ $shoppingCart->transaction->number}}</td>
                <td align="center">{{ $shoppingCart->user->name }}</td>
                <td align="center">
                    {{$shoppingCart->formatted_paid_at }}</td>
                <td align="center">{{ $shoppingCart->course->title_en }}</td>
                <td align="center">{{$shoppingCart->course->type_string }}</td>
                <td align="center">SAR {{ $shoppingCart->course->price }}</td>
                <td align="center">SAR {{ $shoppingCart->price }}</td>
                <td align="center">None</td>
                <td align="center">None</td>

            </tr>
        @endforeach
    </tbody>
</table>
