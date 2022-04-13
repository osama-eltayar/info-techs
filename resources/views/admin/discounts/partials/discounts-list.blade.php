<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th scope="col" class="sort-col" data-col="id" data-direction="{{getSortDirection($orderBy,'id')}}"  >
                #
                @include('admin.layouts.partials.sort-icon',['col' =>'id'])

            </th>
            <th scope="col" class="sort-col" data-col="type" data-direction="{{getSortDirection($orderBy,'type')}}"  >
                Offer
                @include('admin.layouts.partials.sort-icon',['col' =>'type'])

            </th>
            <th scope="col" class="sort-col" data-col="name" data-direction="{{getSortDirection($orderBy,'name')}}"  >
                Discount Name
                @include('admin.layouts.partials.sort-icon',['col' =>'name'])

            </th>
            <th scope="col" class="sort-col" data-col="code" data-direction="{{getSortDirection($orderBy,'code')}}"  >
                Discount Code
                @include('admin.layouts.partials.sort-icon',['col' =>'code'])

            </th>
            <th scope="col" class="sort-col" data-col="amount" data-direction="{{getSortDirection($orderBy,'amount')}}"  >
                Amount
                @include('admin.layouts.partials.sort-icon',['col' =>'amount'])

            </th>
            <th scope="col" class="sort-col" data-col="limit_usage" data-direction="{{getSortDirection($orderBy,'limit_usage')}}"  >
                Limit
                @include('admin.layouts.partials.sort-icon',['col' =>'limit_usage'])

            </th>
            <th scope="col" class="sort-col" data-col="start_date" data-direction="{{getSortDirection($orderBy,'start_date')}}"  >
                Start Date
                @include('admin.layouts.partials.sort-icon',['col' =>'start_date'])

            </th>
            <th scope="col" class="sort-col" data-col="end_date" data-direction="{{getSortDirection($orderBy,'end_date')}}"  >
                End Date
                @include('admin.layouts.partials.sort-icon',['col' =>'end_date'])

            </th>
            <th scope="col" class="sort-col" data-col="status" data-direction="{{getSortDirection($orderBy,'status')}}"  >
                Status
                @include('admin.layouts.partials.sort-icon',['col' =>'status'])

            </th>
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
                                <a class="btn-action" href="{{ route('admin.discounts.edit', $discount->id) }}"><i
                                        class="fa-solid fa-edit"></i></a>
                            </li>
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
