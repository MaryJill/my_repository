<div class="table-responsive">
    <table class="table" id="secondScaffolds-table">
        <thead>
            <tr>
                <th>School</th>
        <th>Year</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($secondScaffolds as $secondScaffolds)
            <tr>
                <td>{{ $secondScaffolds->School }}</td>
            <td>{{ $secondScaffolds->Year }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['secondScaffolds.destroy', $secondScaffolds->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('secondScaffolds.show', [$secondScaffolds->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('secondScaffolds.edit', [$secondScaffolds->id]) }}" class='btn btn-default btn-xs'>
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
