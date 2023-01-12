@extends('layout.home')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebarsub')
        </div>
        <div class="uk-width-expand@m">

            <div class="uk-card uk-card-default uk-width-1-3@m"style="background:#691c32 ">

                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-expand">
                            <h3 class=" uk-margin-remove-bottom color_7">{{ $usuario->name }} {{ $usuario->apellido }}</h3>
                        </div>
                    </div>
                </div>
                <div class="uk-card-body">
                    <ul class="uk-list "style="color: white">
                        <li>{{ $usuario->email }}</li>
                        <li style="text-transform: capitalize">{{ $usuario->rol }}</li>
                        <li>{{ $usuario->hospitales->nombre }}</li>
                        <li>{{ $usuario->turno}}</li>
                        <li>{{ $usuario->dias_laborales}}</li>
                        <li>{{ $usuario->horario_entrada}} a {{ $usuario->horario_salida}}</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>



@endsection

