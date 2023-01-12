@extends('layout.home')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>
        <div class="uk-width-expand@m padd_style">
            <div class="uk-text-center">
               <h2>
                   Inserta un registro nuevo
               </h2>

            </div>
            <div class="uk-card uk-card-default uk-card-body "style="background: #bc955c">

                <form  method="POST" action="{{ route('storeCenso') }}" class="uk-form-stacked">
                    @csrf
                    <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-text-left" uk-grid>
                        <div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Nombre *</label>
                                <div class="uk-form-controls">
                                    <input required name="nombre" class="uk-input" id="form-stacked-text" type="text" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Apellidos *</label>
                                <div class="uk-form-controls">
                                    <input required name="apellidos" class="uk-input" id="form-stacked-text" type="text" placeholder="Apellidos">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-form-label">Género *</div>
                                <div class="uk-form-controls">
                                    <label><input class="uk-radio" type="radio" value="hombre" name="genero"> Hombre</label><br>
                                    <label><input class="uk-radio" type="radio" value="mujer" name="genero"> Mujer</label>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Fecha de nacimiento *</label>
                                <div class="uk-form-controls">
                                    <input required name="edad" class="uk-input" id="form-stacked-text" type="date" placeholder="Edad">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Tipo Derechohabiente *</label>
                                <div class="uk-form-controls">
                                    <select required name="tipo_derechohabiente" class="uk-select" id="form-stacked-select">
                                        <option value="10-Trabajador">10-Trabajador</option>
                                        <option value="20-Trabajadora">20-Trabajadora</option>
                                        <option value="30-Esposa">30-Esposa</option>
                                        <option value="31-Concubina">31-Concubina</option>
                                        <option value="32-Mujer">32-Mujer</option>
                                        <option value="40-Esposo">40-Esposo</option>
                                        <option value="41-Concubino">41-Concubino</option>
                                        <option value="50-Padre">50-Padre</option>
                                        <option value="51-Abuelo">51-Abuelo</option>
                                        <option value="60-Madre">60-Madre</option>
                                        <option value="61-Abuela">61-Abuela</option>
                                        <option value="70-Hijo">70-Hijo</option>
                                        <option value="71-Hijo de Conyugue">71-Hijo de Conyuge</option>
                                        <option value="90-Pensionado">90-Pensionado</option>
                                        <option value="92-Familiar de pensionado">92-Familiar de pensionado</option>
                                        <option value="95-Asegurado INSABI Masculino">95-Asegurado INSABI Masculino</option>
                                        <option value="96-Asegurado INSABI Femenino">96-Asegurado INSABI Femenino</option>
                                        <option value="97-IMSS Hombre">97-IMSS Hombre</option>
                                        <option value="98-IMSS Mujer">98-IMSS Mujer</option>
                                        <option value="99-No derechohabiente">99-No derechohabiente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Telefono</label>
                                <div class="uk-form-controls">
                                    <input name="telefono" class="uk-input" id="form-stacked-text" type="number" placeholder="Opcional">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Nombre de Doctor *</label>
                                <div class="uk-form-controls">
                                    <input required name="doctor" class="uk-input" id="form-stacked-text" type="text" placeholder="Doctor">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Diagnóstico *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" name="diagnostico" list="diagnostico-list" placeholder="Escribe un diagnóstico">
                                    <datalist id="diagnostico-list">
                                        @foreach($diagnosticos as $item)
                                            <option>{{ $item->nombre }}</option>
                                        @endforeach
                                    </datalist>

{{--                                    <input required name="diagnostico" class="uk-input" id="form-stacked-text" type="text" placeholder="Diagnóstico">--}}
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">RFC *</label>
                                <div class="uk-form-controls">
                                    <input required name="rfc" class="uk-input" id="form-stacked-text" type="text" placeholder="RFC">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Hospital *</label>
                                <div class="uk-form-controls">
                                    <select required name="hospital" class="uk-select" id="form-stacked-select">
                                        @foreach($hospitales as $h)
                                            <option value="{{ $h->id }}">{{ $h->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Cama *</label>
                                <div class="uk-form-controls">
                                    <input required name="cama" class="uk-input" id="form-stacked-text" type="text" placeholder="Cama">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Estado *</label>
                                <div class="uk-form-controls">
                                    <select required name="status" class="uk-select" id="form-stacked-select">
                                        <option value="delicado">Delicado</option>
                                        <option value="muy delicado">Muy Delicado</option>
                                        <option value="grave">Grave</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Tipo Hopitalización *</label>
                                <div class="uk-form-controls">
                                    <select required name="tipo_hospitalizacion" class="uk-select" id="form-stacked-select">
                                        <option value="Choque">Choque</option>
                                        <option value="Aislado">Aislado</option>
                                        <option value="Cama">Cama</option>
                                        <option value="Camilla">Camilla</option>
                                        <option value="Filtro">Filtro</option>
                                        <option value="Corta_Estancia">Corta_Estancia</option>
                                        <option value="Reposet">Reposet</option>
                                        <option value="Solucion">Solucion</option>
                                        <option value="Silla">Silla</option>
                                        <option value="Banca">Banca</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin uk-text-center uk-margin-medium-top">
                                <button type="submit" class="button_back"style="width: 150px;height: 30px">
                                    Guardar
                                </button>
                            </div>

                        </div>
                    </div>



                </form>
            </div>

        </div>
    </div>




@endsection

