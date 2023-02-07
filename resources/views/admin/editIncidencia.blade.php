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
            @if ($incidencia->hospital_id == 1)
                            <p class="uk-article-meta">Hospital: H.R. 1° DE OCTUBRE</p>
                            @elseif ($incidencia->hospital_id == 2)
                            <p class="uk-article-meta">Hospital: H.G. DR. FERNANDO QUIROZ GUTIÉRREZ</p>
                            @elseif ($incidencia->hospital_id == 3)
                            <p class="uk-article-meta">Hospital: H.G. DR. DARÍO FERNÁNDEZ FIERRO</p>
                            @elseif ($incidencia->hospital_id == 4)
                            <p class="uk-article-meta">Hospital: H.R. GRAL. IGNACIO ZARAGOZA</p>
                            @elseif ($incidencia->hospital_id == 5)
                            <p class="uk-article-meta">Hospital: H.G. GRAL. JOSÉ MARÍA MORELOS Y PAVÓN</p>
                            @elseif ($incidencia->hospital_id == 6)
                            <p class="uk-article-meta">Hospital: CENTRO MÉDICO NACIONAL 20 DE NOVIEMBRE</p>
                            @elseif ($incidencia->hospital_id == 7)
                            <p class="uk-article-meta">Hospital: H.R. LIC. ADOLFO LÓPEZ MATEOS</p>
                            @elseif ($incidencia->hospital_id == 8)
                            <p class="uk-article-meta">Hospital: H.G. TACUBA</p>
                            @elseif ($incidencia->hospital_id == 9)
                            <p class="uk-article-meta">Hospital: H.A.E. BICENTENARIO DE LA INDEPENDENCIA</p>
                            @elseif ($incidencia->hospital_id == 10)
                            <p class="uk-article-meta">Hospital: H.R. LEON</p>
                            @elseif ($incidencia->hospital_id == 11)
                            <p class="uk-article-meta">Hospital: H.R. VALENTIN GOMEZ FARIAS</p>
                            @elseif ($incidencia->hospital_id == 12)
                            <p class="uk-article-meta">Hospital: H.R. MORELIA</p>
                            @elseif ($incidencia->hospital_id == 13)
                            <p class="uk-article-meta">Hospital: H.A.E. CENTENARIO DE LA REVOLUCION MEXICANA</p>
                            @elseif ($incidencia->hospital_id == 14)
                            <p class="uk-article-meta">Hospital: H.R. MONTERREY</p>
                            @elseif ($incidencia->hospital_id == 15)
                            <p class="uk-article-meta">Hospital: H.R. PRESIDENTE BENITO JUAREZ</p>
                            @elseif ($incidencia->hospital_id == 16)
                            <p class="uk-article-meta">Hospital: H.R. PUEBLA</p>
                            @elseif ($incidencia->hospital_id == 17)
                            <p class="uk-article-meta">Hospital: H.R. DR. MANUEL CARDENAS DE LA VEGA</p>
                            @elseif ($incidencia->hospital_id == 18)
                            <p class="uk-article-meta">Hospital: H.A.E. VERACRUZ</p>
                            @elseif ($incidencia->hospital_id == 19)
                            <p class="uk-article-meta">Hospital: H.R. MERIDA</p>
                        @endif
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
                        <option value="{{ $subcordinador->name}} {{ $subcordinador->apellido}}">{{ $subcordinador->name }} {{ $subcordinador->apellido}}</option>
                        @foreach($usuarios as $u)
                            <option value="{{ $u->name}} {{ $u->apellido }} ">{{ $u->name }} {{ $u->apellido }}</option>
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