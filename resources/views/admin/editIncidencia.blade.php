@extends('layout.home')

@section('content')
    @php
        setlocale(LC_TIME, 'Spanish');
        $fecha = new Carbon\Carbon($incidencia->created_at);
        $days = $fecha->formatLocalized('%d %B %Y');
    @endphp
    <div class="uk-padding">
        <article class="uk-article">

            <h2 class="uk-article-title color_1"><a class="uk-link-reset" href="">{{ $incidencia->nombre }}</a></h2>

            <p class="uk-article-meta">Creado por: {{ $incidencia->user->name }} {{ $incidencia->user->apellido }}</p>
            <p class="uk-article-meta">El: {{ $days }}</p>

            <p class="uk-text-lead">
                {{ $incidencia->notas }}
            </p>
            <form  method="POST" action="{{ route('updateIncidencia',[$incidencia->id]) }}" class="uk-form-stacked">
                @csrf
                <label class="uk-form-label" for="form-stacked-select"style="font-size: 17px">Status</label>
                <select class="form-select" name="status" aria-label="Default select example"style="width: 200px">
                    <option value="pendiente">Pendiente</option>
                    <option value="resuelto">Resuelto</option>
                </select>

                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text" style="font-size: 17px">Nueva Asignación a:</label>
                    <select class="form-select" name="asignacion" aria-label="Default select example"style="width: 350px">
                      @foreach($usuarios as $u)
                            <option value="{{ $u->name}} {{ $u->apellido}}">{{ $u->name }} {{ $u->apellido}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-select"style="font-size: 17px">Agregar un comentario</label>
                    <div class="uk-form-controls">
                        <textarea required name="comentario" class="uk-input" id="form-stacked-text" type="text"></textarea>
                    </div>
                </div>
                <div class="uk-margin uk-text-center uk-margin-medium-top">
                    <a href="{{ route('homeIndexPanel') }}">
                                <button type="button" class="button_back"style="width: 150px;height: 30px">
                                Cancelar
                                </button>
                    </a>
                    <button type="submit" class="button_back"style="width: 150px;height: 30px">
                        Guardar
                    </button>
                </div>
            </form>



        </article>
    </div>

@endsection

