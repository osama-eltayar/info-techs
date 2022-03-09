<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th scope="col"># <i class="fa-solid fa-sort"></i></th>
            <th scope="col">Offer</th>
            <th scope="col">Discount Name</th>
            <th scope="col">Discount Code</th>
            <th scope="col">Amount</th>
            <th scope="col">Limit</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </thead>
        <tbody>
            @forelse($discounts as $discount)
                <tr class="discount-row" data-id="{{ $discount->id }}">
                    <td>{{ $discount->id }}</td>
                    <td>{{ $discount->type_string }}</td>
                    <td>{{ $discount->name }}</td>
                    <td>{{ $discount->code }}</td>
                    <td>{{ $discount->amount }}{{ $discount->amount_type == 1 ? ' SAR' : ' %' }}</td>
                    <td>{{ $discount->limit_usage }}</td>
                    <td>{{ $discount->formatted_start_date }}</td>
                    <td>{{ $discount->formatted_end_date }}</td>
                    <td>{{ $discount->status == 1 ? 'Pending' : 'Ended' }}</td>
                    <td>
                    </td>
                    <td>
                        <ul class="list-unstyled">
                            <li>
                                <button class="btn-action delete-btn" data-id="{{ $discount->id }}"
                                    data-url="{{ route('admin.discounts.destroy', $discount->id) }}"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </li>
                        </ul>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No results found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ $discounts->links() }}
