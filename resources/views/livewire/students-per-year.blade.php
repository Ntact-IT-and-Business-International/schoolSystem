<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Year</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($distinctYears as $i=>$year)
            <tr>
                <td>{{$i + 1}}</td>
                <td><a href="/students/year-class/{{$year}}">{{ $year }}</a></td>
                <td><a href="/students/year-class/{{$year}}" class="btn btn-info btn-sm">View All Classes For This Year</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
