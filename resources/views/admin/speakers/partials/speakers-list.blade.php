<div class="table-responsive">
    <table class="table table-striped" >
        <thead>
            <th scope="col" class="sort-col" data-col="id" data-direction="{{getSortDirection($orderBy,'id')}}">
                #
                @include('admin.layouts.partials.sort-icon',['col' =>'id'])

            </th>
            <th scope="col">
                Title
            </th>
            <th scope="col" class="sort-col" data-col="name_en" data-direction="{{getSortDirection($orderBy,'name_en')}}">
                Speaker  name
                @include('admin.layouts.partials.sort-icon',['col' =>'name_en'])

            </th>
            <th scope="col" class="sort-col" data-col="created_at" data-direction="{{getSortDirection($orderBy,'created_at')}}">
                Create date
                @include('admin.layouts.partials.sort-icon',['col' =>'created_at'])

            </th>
            <th scope="col" class="sort-col" data-col="mobile" data-direction="{{getSortDirection($orderBy,'mobile')}}">
                Phone
                @include('admin.layouts.partials.sort-icon',['col' =>'mobile'])

            </th>
            <th scope="col">
                Country/City
            </th>
            <th scope="col">
                Activities
            </th>
            <th scope="col" class="sort-col" data-col="position" data-direction="{{getSortDirection($orderBy,'position')}}">
                Position
                @include('admin.layouts.partials.sort-icon',['col' =>'position'])

            </th>
            <th scope="col" class="sort-col" data-col="email" data-direction="{{getSortDirection($orderBy,'email')}}">
                Email (username)
                @include('admin.layouts.partials.sort-icon',['col' =>'email'])

            </th>
            <th scope="col"></th>
        </thead>
        <tbody>
        @forelse($speakers as $speaker)
        <tr class="speaker-row" data-id="{{$speaker->id}}">
            <td>{{$speaker->id}}</td>
            <td>{{$speaker->title->name}}</td>
            <td>{{$speaker->name}}</td>
            <td>{{$speaker->formatted_created_at}}</td>
            <td>{{$speaker->mobile}}</td>
            <td>{{$speaker->country? $speaker->country->name.'/' : ''}}{{$speaker->city? $speaker->city->name : ''}}</td>
            <td>{{$speaker->courses_count}}</td>
            <td>{{$speaker->position}}</td>
            <td>{{$speaker->email}}</td>
            <td>
                <ul class="list-unstyled">
                    <li>
                        <a class="btn-action" href="{{route('admin.speakers.edit',$speaker->id)}}"><i class="fa-solid fa-edit"></i></a>
                    </li>
                    <li>
                        <a class="btn-action" href="{{route('admin.speakers.show',$speaker->id)}}"><i class="fa-solid fa-square-info"></i></a>
                    </li>
                    <li>
                        <button class="btn-action delete-btn" data-id="{{$speaker->id}}" data-url="{{route('admin.speakers.destroy',$speaker->id)}}"><i class="fa-solid fa-trash-can"></i></button>
                    </li>
                </ul>
            </td>
        </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center">No results found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
{{$speakers->links()}}
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
