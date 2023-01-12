@extends('layout.home')

@section('content')
    <style>
        .scroll {
            overflow-x: scroll;
            overflow-y: hidden;
            white-space:nowrap;
        }
    </style>

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebarsub')
        </div>
        <div class="uk-width-expand@m">
            <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-right">
                    <div class="uk-navbar-item">
                        <form style="width: 300px" class="uk-search uk-search-default" type="get" action="{{ url('/search') }}">
                            <div class="">
                                <a href="" class="uk-search-icon-flip" uk-search-icon></a>
                                <input class="uk-search-input color_7" name="query" type="search" placeholder="Búsqueda" aria-label="Search" aria-label="Search">
                            </div>
                        </form>
                        <a href="{{ route('createCenso') }}">
                            <button class="uk-margin-medium-left button_add"style="float: right">
                               Agregar
                            </button>
                        </a>
                    </div>
                </div>
            </nav>
            <div class="scroll">
                <table class="uk-table uk-table-striped">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Genero</th>
                        <th>Fecha de nacimiento</th>
                        <th>RFC</th>
                        <th>Tipo Derechohabiente</th>
                        <th>Tipo Hospitalizacion</th>
                        <th>Diagnostico</th>
                        <th>Hospital</th>
                        <th>Doctor</th>
                        <th>Cama</th>
                        <th>Estado</th>
                        <th>Acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($censos as $i)
                        <tr>
                            <td class="textTransform">
                                {{ $i->nombre }} {{ $i->apellidos }}
                            </td>
                            <td class="textTransform">
                                {{ $i->genero }}
                            </td>
                            <td>
                                {{ $i->edad }}
                            </td>
                            <td>
                                {{ $i->rfc }}
                            </td>
                            <td>
                                {{ $i->tipo_derechohabiente }}
                            </td>
                            <td>
                                {{ $i->tipo_hospitalizacion }}
                            </td>
                            <td class="textTransform">
                                {{ $i->diagnostico }}
                            </td>
                            <td class="textTransform">
                                {{ $i->hospitales->nombre }}
                            </td>
                            <td class="textTransform">
                                {{ $i->doctor }}
                            </td>
                            <td>
                                {{ $i->cama }}
                            </td>
                            <td class="textTransform">
                                {{ $i->status }}
                            </td>
                            <td>
                                <a href="{{ route('editCenso',[$i->id]) }}">
                                    Editar
                                </a><br>
                                <a href="{{ route('showHistoricoCenso',[$i->id]) }}">
                                    Ver Historial
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <div class="uk-text-center">
                    {!! $censos->links("partials.paginate") !!}
                </div>
            </div>

        </div>
    </div>



@endsection

