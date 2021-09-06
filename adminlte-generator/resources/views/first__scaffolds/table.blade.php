<div class="table-responsive">
    <table class="table" id="firstScaffolds-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Address</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($firstScaffolds as $firstScaffolds)
            <tr>
                <td>{{ $firstScaffolds->name }}</td>
            <td>{{ $firstScaffolds->address }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['firstScaffolds.destroy', $firstScaffolds->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('firstScaffolds.show', [$firstScaffolds->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('firstScaffolds.edit', [$firstScaffolds->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
