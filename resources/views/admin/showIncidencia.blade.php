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
            @if($incidencia->status == 'pendiente')
                <span class="uk-badge color_darkred"style="text-transform: capitalize">{{ $incidencia->status }}</span>
            @elseif($incidencia->status == 'resuelto')
                <span class="uk-badge color_green"style="text-transform: capitalize">{{ $incidencia->status }}</span>
            @endif
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

            @foreach($historico as $h)
                @php
                    setlocale(LC_TIME, 'Spanish');
                    $fecha = new Carbon\Carbon($h->created_at);
                    $fecha_comentario = $fecha->formatLocalized('%d %B %Y');
                @endphp
                <article class="uk-comment uk-comment-primary" role="comment" >
                    <header class="uk-comment-header">
                        <div class="uk-grid-medium uk-flex-middle" uk-grid>
                            <div class="uk-width-expand">
                                <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                    <li>Cread por: {{ $h->creado_por }} el: {{ $fecha_comentario }}</li>
                                </ul>
                            </div>
                        </div>
                    </header>
                    <div class="uk-comment-body">
                        <p>
                            Nueva Incidencia Asignada a:
                            {{ $h->asignacion }}
                        </p>

                        <p>
                            Comentarios:
                            {{ $h->comentario }}
                        </p>
                    </div>
                </article>
            @endforeach

            <div class="uk-grid-small uk-child-width-auto" uk-grid>
                <a href="{{ route('homeIndexPanel') }}">
                                <button type="button" class="button_back"style="width: 150px;height: 30px">
                                Cancelar
                                </button>
                </a>
                <div>
                    <a class="uk-button uk-button-text color_6" href="{{ route('editIncidencia',[$incidencia->id]) }}">Editar Incidencia</a>
                </div>
            </div>

        </article>
    </div>

    @endsection
