
<table class="table">
    <thead>
    <tr>
        <th scope="col" align="center" width="10"># <i class="fa-solid fa-sort"></i></th>
        <th scope="col"  align="center" width="20">Question</th>
        <th scope="col"  align="center" width="20">Answer</th>
        <th scope="col" align="center" width="20">Value</th>
        <th scope="col"  align="center">User</th>
        <th scope="col"  align="center" width="20">Created Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($answers as $answer)
        <tr>
            <td align="center">{{ $answer->id }}</td>
            <td align="center">{{ $answer->question->title }}</td>
            <td align="center">{{ $answer->answer->title }}</td>
            <td align="center">{{ $answer->value}}</td>
            <td align="center">{{$answer->user->name}}</td>
            <td align="center">{{$answer->created_at->toDateTimeString()}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
