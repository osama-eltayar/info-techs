<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th scope="col"># <i class="fa-solid fa-sort"></i></th>
            <th scope="col">Title</th>
            <th scope="col"></th>
        </thead>
        <tbody>
            @forelse($surveys as $survey)
                <tr class="surveys-row" data-id="{{ $survey->id }}">
                    <td>{{ $survey->id }}</td>
                    <td>{{ $survey->title }}</td>
                    <td>
                        <ul>
                            <li class="list-unstyled">
                                <a class="btn-action" href="{{route('admin.surveys.show',$survey->id)}}"><i class="fa-solid fa-square-info"></i></a>
                            </li>
                        </ul>
                    </td>

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
{{ $surveys->links() }}
