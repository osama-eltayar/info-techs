<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th scope="col" class="sort-col" data-col="id" data-direction="{{getSortDirection($orderBy,'id')}}"  >
                #
                @include('admin.layouts.partials.sort-icon',['col' =>'id'])
            </th>
            <th scope="col" class="sort-col" data-col="name" data-direction="{{getSortDirection($orderBy,'name')}}"  >
                User name
                @include('admin.layouts.partials.sort-icon',['col' =>'name'])
            </th>
            <th scope="col" class="sort-col" data-col="created_at" data-direction="{{getSortDirection($orderBy,'created_at')}}" >
                User create date
               @include('admin.layouts.partials.sort-icon',['col' =>'created_at'])
            </th>
            <th scope="col"  >Country/City</th>
            <th scope="col" class="sort-col" data-col="email" data-direction="{{getSortDirection($orderBy,'email')}}"  >
                Email (username)
                @include('admin.layouts.partials.sort-icon',['col' =>'email'])
            </th>
            <th scope="col"  >SCFHS No.</th>
            <th scope="col"  >Mobile</th>
            <th scope="col"  ></th>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr class="user-row" data-id="{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->formatted_created_at }}</td>
                    <td>{{ $user->profile->country->name ?? '-' }}/{{ $user->profile->city->name ?? '-' }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->profile->saudi_council ?? '-' }}</td>
                    <td>{{ $user->profile->mobile ?? '-' }}</td>
                    <td>
                        <ul class="list-unstyled">
                            <li>
                                 <a class="btn-action" href="{{route('admin.users.edit',$user  ->id)}}"><i class="fa-solid fa-edit"></i></a>
                            </li>
                            <li>
                                <a class="btn-action" href="{{route('admin.users.show',$user->id)}}"><i class="fa-solid fa-square-info"></i></a>
                            </li>
                            <li>
                                <button class="btn-action delete-btn" data-id="{{ $user->id }}"
                                    data-url="{{ route('admin.users.destroy', $user->id) }}"><i
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
{{ $users->links() }}

