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
            <th scope="col" align="center">Offer</th>
            <th scope="col" align="center">Discount Name</th>
            <th scope="col" align="center">Discount Code</th>
            <th scope="col" align="center">Amount</th>
            <th scope="col" align="center">Limit</th>
            <th scope="col" align="center">Start Date</th>
            <th scope="col" align="center">End Date</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($data as $discount)
            <tr>
                <td align="center">{{ $discount->id }}</td>
                <td align="center">{{ $discount->type_string }}</td>
                <td align="center">{{ $discount->name }}</td>
                <td align="center">{{ $discount->code }}</td>
                <td align="center">{{ $discount->amount }}{{ $discount->amount_type == 1 ? ' SAR' : ' %' }}</td>
                <td align="center">{{ $discount->limit_usage }}</td>
                <td align="center">{{ $discount->formatted_start_date }}</td>
                <td align="center">{{ $discount->formatted_end_date }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
