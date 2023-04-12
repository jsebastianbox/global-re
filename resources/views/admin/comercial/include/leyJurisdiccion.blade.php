@if (\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Request::url(), '/admin/comercial/edit_compromiso/'))
    <label class="lead" style="max-width: 300px">Ley y jurisdicción</label>
    <hr style="background-color: darkgrey; width:70%">
    <div class="row mb-3">
        <div class="col-md-12">
            <div id="leyJurisdiccion">
                <div class="input_group">
                    <p style="justify-content: flex-start">Este reaseguro será gobernado por y constituido de acuerdo con
                        la
                        ley de &nbsp;
                        <span class="politics_country_one" style="font-weight: bold">
                            {{$slip->country->name}}
                        </span>,&nbsp;
                        y cada parte acuerda referir a la jurisdicción exclusiva de las cortes de &nbsp;
                        <span class="politics_country_two" style="font-weight: bold">
                            {{$slip->country->name}}
                        </span>&nbsp;
                        a menos que ambas partes acuerden referir el caso a arbitraje.
                    </p>
                </div>
            </div>
        </div>
    </div>
@else
    <label class="lead" style="max-width: 300px">Ley y jurisdicción</label>
    <hr style="background-color: darkgrey; width:70%">

    <div class="row mb-3">
        <div class="col-md-12">
            <div id="leyJurisdiccion">
                <div class="input_group">
                    <p style="justify-content: flex-start">Este reaseguro será gobernado por y constituido de acuerdo
                        con la
                        ley de &nbsp;
                        <span class="politics_country_one" style="font-weight: bold"></span>,&nbsp;
                        y cada parte acuerda referir a la jurisdicción exclusiva de las cortes de &nbsp;
                        <span class="politics_country_two" style="font-weight: bold"></span>&nbsp;
                        a menos que ambas partes acuerden referir el caso a arbitraje.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif
