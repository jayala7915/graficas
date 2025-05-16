<div class="table-responsive">
    <table class="table" id="contenidos-table">
        <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contenidos as $contenido)
            <tr>
                
                <td width="120">
                    {!! Form::open(['route' => ['contenidos.destroy', $contenido->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contenidos.show', [$contenido->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contenidos.edit', [$contenido->id]) }}"
                           class='btn btn-default btn-xs'>
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
