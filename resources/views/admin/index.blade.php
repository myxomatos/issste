@extends('layout.home')

@section('content')

<div uk-grid>
    <div class="uk-visible@m uk-width-1-6@m">
        @include('partials.sidebar')
    </div>
    <div class="uk-width-expand@m uk-margin-top uk-margin-right uk-margin-bottom">
        <div>
            <div class="uk-card uk-card-default uk-card-body card_counter uk-text-center">
                <p class="color_7" style="font-size: 24px; margin: 0px;">Actividades</p>
                <p class="color_7" style="margin-top: 2px; font-size: 26px">
                   {{ $total_actividades }}
                </p>
            </div>

            <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>Fecha / Hora</th>
                    <th>Nombre</th>
                    <th>Actividad</th>
                    <th>Tarea</th>
                    <th>Tipo de Actividad</th>
                    <th>Notas</th>
                    <th>Hospital</th>
                    <th>Crear Incidencia</th>
                </tr>
                </thead>
                <tbody>

                @foreach($actividades as $i)
                    <tr>
                        <td class="textTransform">{{ $i->created_at }}</td>
                        @if(Auth::User()->rol === 'enlace')
                        <td class="textTransform">{{$i->user->name}} {{$i->user->apellido}}</td>
                        @else
                            <td class="textTransform">{{$i->enlace}}</td>
                        @endif
                        <td class="textTransform">{{ $i->nombre}}</td>
                        <td class="textTransform">{{ $i->descripcion_actividad }}</td>
                        <td class="textTransform">{{ $i->descripcion_subactividad }}</td>
                        <td class="textTransform">{{ $i->notas }}</td>
                        <td>
                            <li class="uk-text-center">
                                <a href="{{ route('createIncidencias', $i->id) }}" uk-icon="icon: file-edit"></a>
                            </li>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <div>
            <div>
                <div class="uk-card uk-card-default uk-card-body card_counter uk-text-center">
                  <p class="color_7" style="font-size: 24px; margin: 0px;">Incidencias</p>
                    <h2 class="color_7" style="margin-top: 2px; font-size: 26px">
                        {{ $total_incidencias }}
                    </h2>
                </div>
                <table class="uk-table uk-table-striped">
                    <thead>
                    <tr>
                        <th>Fecha / Hora</th>
                        <th>Usuario</th>
                        <th>Nombre Evidencia</th>
                        <th>Archivo Evidencia</th>
                        <th>Notas</th>
                        <th>Asignado a</th>
                        <th>Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($incidencias as $i)
                        <tr>
                            <td class="textTransform">{{ $i->created_at }}</td>
                            @if(Auth::User()->rol === 'enlace')
                            <td class="textTransform">{{ $i->user->name }} {{ $i->user->apellido }}</td>
                            @else
                                <td class="textTransform">{{$i->enlace}}</td>
                            @endif

                            <td class="textTransform">{{ $i->nombre }}</td>
                            <td class="textTransform">{{ $i->cargar_evidencia }}</td>
                            <td class="textTransform">{{ $i->notas }}</td>
                            <td class="textTransform">{{ $i->asignacion }}</td>
                                <td class="textTransform">
                                <a href="{{ route('showIncidencia', $i->id) }}">
                                    {{ $i->status }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
