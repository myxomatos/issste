@extends('layout.home')

@section('content')
    <div class="uk-padding">
        <h2 class="color_7">
            Enlaces
        </h2>
        <table class="uk-table uk-table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Subcoordinador</th>
                @if(Auth::User()->rol === 'coordinador')
                    <th>Acciones</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($enlaces as $enlace)
                <tr>
                    <td>
                        {{ $enlace->enlace }}
                    </td>
                    <td>
                        {{ $enlace->subcoordinador }}
                    </td>
                    @if(Auth::User()->rol === 'coordinador')
                        <td>
                            <a href="{{ route('editEnlace',[$enlace->idEnlace]) }}">
                                Editar
                            </a>
                        </td>
                    @endif

                </tr>
            @endforeach
            </tbody>

        </table>
        @endsection
    </div>



