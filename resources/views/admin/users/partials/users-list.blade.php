<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th scope="col"># <i class="fa-solid fa-sort"></i></th>
            <th scope="col">User name</th>
            <th scope="col">User create date</th>
            <th scope="col">Country/City</th>
            <th scope="col">Email (username)</th>
            <th scope="col">SCFHS No.</th>
            <th scope="col">Mobile</th>
            <th scope="col"></th>
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
                                {{-- <a class="btn-action" href="{{route('admin.users.edit',$user  ->id)}}"><i class="fa-solid fa-edit"></i></a> --}}
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

