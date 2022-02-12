<div class="table-responsive">
    <table class="table table-striped" >
        <thead>
        <th scope="col"># <i class="fa-solid fa-sort"></i></th>
        <th scope="col">Sponsor name</th>
        <th scope="col">Sponsor create date</th>
        <th scope="col">Phone</th>
        <th scope="col">Country/City</th>
        <th scope="col">Activities</th>
        <th scope="col">Email (username)</th>
        <th scope="col"></th>
        </thead>
        <tbody>
        @forelse($sponsors as $sponsor)
            <tr class="sponsor-row" data-id="{{$sponsor->id}}">
            <td>{{$sponsor->id}}</td>
            <td>{{$sponsor->name}}</td>
            <td>{{$sponsor->formatted_created_at}}</td>
            <td>{{$sponsor->mobile}}</td>
            <td>{{$sponsor->country->name}}/{{$sponsor->city->name}}</td>
            <td>{{$sponsor->courses_count}}</td>
            <td>{{$sponsor->email}}</td>
            <td>
                <ul class="list-unstyled">
                    <li>
                        <a class="btn-action" href="{{route('admin.sponsors.edit',$sponsor->id)}}"><i class="fa-solid fa-edit"></i></a>
                    </li>
                    <li>
                        <a class="btn-action" href="{{route('admin.sponsors.show',$sponsor->id)}}"><i class="fa-solid fa-square-info"></i></a>
                    </li>
                    <li>
                        <button class="btn-action delete-btn" data-id="{{$sponsor->id}}" data-url="{{route('admin.sponsors.destroy',$sponsor->id)}}"><i class="fa-solid fa-trash-can"></i></button>
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
{{$sponsors->links()}}
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
