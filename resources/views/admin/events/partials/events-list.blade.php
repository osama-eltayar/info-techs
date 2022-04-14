<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th scope="col" class="sort-col" data-col="id" data-direction="{{getSortDirection($orderBy,'id')}}">
                #
                @include('admin.layouts.partials.sort-icon',['col' =>'id'])
            </th>
            <th scope="col" class="sort-col" data-col="type_id" data-direction="{{getSortDirection($orderBy,'type_id')}}">
                Event Type
                @include('admin.layouts.partials.sort-icon',['col' =>'type_id'])

            </th>
            <th scope="col" class="sort-col" data-col="title_en" data-direction="{{getSortDirection($orderBy,'title_en')}}">
                Event Name
                @include('admin.layouts.partials.sort-icon',['col' =>'title_en'])

            </th>
            <th scope="col" class="sort-col" data-col="created_at" data-direction="{{getSortDirection($orderBy,'created_at')}}">
                Create Date
                @include('admin.layouts.partials.sort-icon',['col' =>'created_at'])

            </th>
            <th scope="col" class="sort-col" data-col="start_date" data-direction="{{getSortDirection($orderBy,'start_date')}}">
                Event Running Date
                @include('admin.layouts.partials.sort-icon',['col' =>'start_date'])

            </th>
            <th scope="col" class="sort-col" data-col="price" data-direction="{{getSortDirection($orderBy,'price')}}">
                Fees
                @include('admin.layouts.partials.sort-icon',['col' =>'price'])

            </th>
            <th scope="col" class="sort-col" data-col="organization_id" data-direction="{{getSortDirection($orderBy,'organization_id')}}">
                Event owner
                @include('admin.layouts.partials.sort-icon',['col' =>'organization_id'])

            </th>
            <th scope="col">
                Status
            </th>
            <th scope="col">

            </th>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr class="course-row" data-id="{{ $course->id }}">
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->type_string }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->formatted_created_at }}</td>
                    <td>{{ $course->formatted_start_date }}</td>
                    <td>SAR {{ $course->price }}</td>
                    <td>{{ $course->organization->name_en }}</td>
                    <td>
                    </td>
                    <td>
                        <ul class="list-unstyled">
                            <li>
                                <a class="btn-action" href="{{ route('admin.events.edit', $course->id) }}"><i
                                        class="fa-solid fa-edit"></i></a>
                            </li>
                            <li>
                                <a class="btn-action" href="{{ route('admin.events.show', $course->id) }}"><i
                                        class="fa-solid fa-square-info"></i></a>
                            </li>
                            @if ($today < $course->published_at)
                                <li>
                                    <button class="btn-action publish-btn" data-id="{{ $course->id }}"
                                        data-url="{{ route('admin.events.publish', $course->id) }}"><i
                                            class="fa-solid fa-arrow-up-from-square"></i></button>
                                </li>
                            @endif
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
{{ $courses->links() }}
