<div class="table-responsive">
    <table class="table table-striped" >
        <thead>
        <th scope="col"># <i class="fa-solid fa-sort"></i></th>
        <th scope="col">Owner name</th>
        <th scope="col">Owner create date</th>
        <th scope="col">Phone</th>
        <th scope="col">Country/City</th>
        <th scope="col">Activities</th>
        <th scope="col">Email (username)</th>
        <th scope="col"></th>
        </thead>
        <tbody>
        @forelse($owners as $owner)
            <tr class="owner-row" data-id="{{$owner->id}}">
            <td>{{$owner->id}}</td>
            <td>{{$owner->name}}</td>
            <td>{{$owner->formatted_created_at}}</td>
            <td>{{$owner->mobile}}</td>
            <td>{{$owner->country->name}}/{{$owner->city->name}}</td>
            <td>{{$owner->courses_count}}</td>
            <td>{{$owner->user->email}}</td>
            <td>
                <ul class="list-unstyled">
                    <li>
                        <a class="btn-action" href="{{route('admin.owners.edit',$owner->id)}}"><i class="fa-solid fa-edit"></i></a>
                    </li>
                    <li>
                        <a class="btn-action" href="{{route('admin.owners.show',$owner->id)}}"><i class="fa-solid fa-square-info"></i></a>
                    </li>
                    <li>
                        <button class="btn-action delete-btn" data-id="{{$owner->id}}" data-url="{{route('admin.owners.destroy',$owner->id)}}"><i class="fa-solid fa-trash-can"></i></button>
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
{{$owners->links()}}
{{--<nav aria-label="Page navigation example">--}}
{{--    <ul class="pagination">--}}
{{--        <li class="page-item">--}}
{{--            <a class="page-link" href="#" aria-label="Previous">--}}
{{--                <span aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--        <li class="page-item"><a class="page-link active" href="#">page 2 / 3</a></li>--}}
{{--        <li class="page-item">--}}
{{--            <a class="page-link" href="#" aria-label="Next">--}}
{{--                <span aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</nav>--}}
