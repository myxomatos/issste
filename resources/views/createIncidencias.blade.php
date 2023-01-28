@extends('layout.home')

@section('content')
    @php
        setlocale(LC_TIME, 'Spanish');
        $fecha = new Carbon\Carbon($actividades->created_at);
        $days = $fecha->formatLocalized('%d %B %Y');
    @endphp

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebarsub')
        </div>
        <div class="uk-width-expand@m padd_style">
            <div class="uk-text-center">
                <h2 class="uk-article-title color_1">Crear Incidencia {{Auth::user()->name}} {{Auth::user()->apellido}}</h2>
            </div>

            <div class="uk-card uk-card-default uk-card-body "style="background: transparent">

                <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-text-left" uk-grid>
                    <div class="uk-margin">
                        <div class="uk-text-left">
                            <label style="color: black; font-size: 35px; margin: 0px;">Resumen de la Actividad</label>
                        </div>
                        <p class="uk-article-meta" style="margin-top: 20px">Creado por: {{ $actividades->user->name }} {{ $actividades->user->apellido }}</p>
                        <p class="uk-article-meta">El: {{ $days }}</p>
                        <div class="uk-margin" style="margin-top: 23px">
                            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> Hospital: {{ $hospitales->nombre }}</p>
                            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> Tipo de Actividad: {{ $actividades->nombre }}</p>
                            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> Tipo de Subactividad: {{ $actividades->descripcion_actividad }}</p>
                            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> Tipo de Subactividad #2: {{ $actividades->descripcion_subactividad }}</p>
                            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> Notas: {{ $actividades->notas }}</p>
                        </div>
                    </div>
                    <form action="{{route('storeIncidencias')}}"  method="POST" class="uk-form-stacked">
                        @csrf
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text" style="font-size: 18px">Nombre de la Incidencia</label>
                            <div class="uk-form-controls">
                                <input required name="nombre" class="uk-input" id="form-stacked-text" type="text" placeholder="Nombre">
                            </div>
                        </div>

                        <div class="uk-margin uk-hidden">
                            <label class="uk-form-label" for="form-stacked-text" style="font-size: 18px">ID</label>
                            <div class="uk-form-controls">
                                <input required name="actividad_id" class="uk-input" id="form-stacked-text" type="text" value="{{ $actividades->id }}" placeholder="Nombre">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text" style="font-size: 18px">Cargar evidencia</label>
                            <div uk-form-custom="target: true">
                                <input name="cargar_evidencia" type="file" aria-label="Custom controls">
                                <input name="cargar_evidencia" class="uk-input uk-form-width-medium" type="text" placeholder="Selecciona tu archivo" aria-label="Custom controls" disabled>
                            </div>

                            <label class="uk-margin uk-form-label" for="form-stacked-text" style="font-size: 18px">Nuevas notas</label>
                            <div class="uk-form-width-large">
                                <textarea name="notas" class="uk-textarea" rows="5" placeholder="Escribir nuevas notas"></textarea>
                            </div>
                            {{--<label class="uk-margin uk-form-label" for="form-stacked-select" style="font-size: 18px">Status</label>--}}
                            <div class="uk-form-controls uk-hidden">
                                <select required name="status" class="uk-select" id="form-stacked-select">
                                    <option value="pendiente">Pendiente</option>
                                </select>
                            </div>
                            @if(Auth::User()->rol === 'general')
                                <label class="uk-margin uk-form-label" for="form-stacked-select" style="font-size: 18px">Nombre del usuario</label>
                                <div class="uk-form-controls">
                                    <select required name="nombre_usuario" class="uk-select" id="form-stacked-select">
                                        @foreach($usuarios as $u)
                                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            @else
                                <div class="uk-margin uk-form-width-large uk-hidden">
                                    <input value="{{ $user->id }}" name="nombre_usuario" class="uk-textarea" rows="5" placeholder="Escribir notas"></input>
                                </div>
                             @endif

                        </div>
                        <a href="{{ route('homeIndexPanel') }}">
                                <button type="button" class="button_back"style="width: 150px;height: 30px">
                                Cancelar
                                </button>
                        </a>
                        <button type="submit" class="button_back"style="width: 170px;height: 30px">
                            Guardar incidencia
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


