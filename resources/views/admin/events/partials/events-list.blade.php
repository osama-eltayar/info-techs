<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th scope="col"># <i class="fa-solid fa-sort"></i></th>
            <th scope="col">Event Type</th>
            <th scope="col">Event Name</th>
            <th scope="col">Create Date</th>
            <th scope="col">Event Running Date</th>
            <th scope="col">Fees</th>
            <th scope="col">Event owner</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
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
