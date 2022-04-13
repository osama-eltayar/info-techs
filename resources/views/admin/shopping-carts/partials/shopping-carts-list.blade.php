<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th scope="col" class="sort-col" data-col="id" data-direction="{{getSortDirection($orderBy,'id')}}"  >
                #
                @include('admin.layouts.partials.sort-icon',['col' =>'id'])
            </th>
            <th scope="col">
                Invoice Number
            </th>
            <th scope="col">
                Name
            </th>
            <th scope="col" class="sort-col" data-col="paid_at" data-direction="{{getSortDirection($orderBy,'paid_at')}}"  >
                Invoice Date
                @include('admin.layouts.partials.sort-icon',['col' =>'paid_at'])
            </th>
            <th scope="col">
                Event Name
            </th>
            <th scope="col">
                Event Type
            </th>
            <th scope="col">
                Event Amount
            </th>
            <th scope="col">
                Paid Amount
            </th>
            <th scope="col">
                Paid before
            </th>
            <th scope="col">
                Promocode
            </th>
            <th scope="col">
                Invoice
            </th>
        </thead>
        <tbody>
            @forelse($shoppingCarts as $shoppingCart)
                <tr class="transaction-row" data-id="{{ $shoppingCart->id }}">
                    <td>{{ $shoppingCart->id }}</td>
                    <td>{{ $shoppingCart->transaction->number }}</td>
                    <td>{{ $shoppingCart->user->name }}</td>
                    <td>{{ $shoppingCart->formatted_paid_at }}
                    </td>
                    <td>{{ $shoppingCart->course->title_en }}</td>
                    <td>{{ $shoppingCart->course->type_string }}</td>
                    <td>SAR {{ $shoppingCart->course->price }}</td>
                    <td>SAR - </td>
                    <td>None</td>
                    <td>None</td>
                    <td>
                        <ul class="list-unstyled">
                            <li>
                                {{-- <a class="btn-action" href="{{route('admin.users.edit',$user  ->id)}}"><i class="fa-solid fa-edit"></i></a> --}}
                            </li>

                        </ul>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center">No results found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ $shoppingCarts->links() }}
