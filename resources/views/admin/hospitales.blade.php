@extends('layout.home')

@section('content')
    <div class="uk-padding">
        <h2 class="color_7">
            Hospitales
        </h2>
    @if(Auth::User()->rol === 'coordinador')
            <div class="uk-text-center">
                <a href="{{ route('createHospital') }}">
                    <button class="button_back">Agregar</button>
                </a>
            </div>
     @endif
            <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Status</th>
                    @if(Auth::User()->rol === 'coordinador')
                    <th>Acciones</th>
                    @endif

                </tr>
                </thead>
                <tbody>
                @foreach($hospitales as $hospital)
                    <tr>
                        <td class="textTransform">
                            {{ $hospital->nombre }}
                        </td class="textTransform">

                        <td class="textTransform">
                            {{ $hospital->descripcion }}
                        </td class="textTransform">
                        <td class="textTransform">
                            {{ $hospital->status }}
                        </td>
                        @if(Auth::User()->rol === 'coordinador')
                        <td>
                            <a href="{{ route('editHospital',[$hospital->id]) }}">
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


