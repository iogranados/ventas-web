@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Clientes</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form>
                            <div class="form-group">
                                <label for="sellers-select">Seleccione un vendedor</label>

                                <select class="js-example-basic-single form-control" name="sellers-select" id="sellers-select">
                                    <@foreach($sellers as $seller)
                                        <option value="{{$seller->CODVEN}}">{{$seller->NOMVEN}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered display nowrap" style="width:100%" id="customers-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Tipo Doc.</th>
                                        <th scope="col">Número Doc.</th>
                                        <th scope="col">Semáforo</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Ubigeo</th>
                                        <th scope="col">FecUc</th>
                                        <th scope="col">Zona</th>
                                        <th scope="col">Fec. Ini Vig</th>
                                        <th scope="col">Fec. Fin Vig</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" defer></script>
    <script>
        $(function() {

            var data = {
                id: 'ALL',
                text: 'Todos'
            };

            var newOption = new Option(data.text, data.id, true, true);


            $('.js-example-basic-single').select2({
                width: '100%'
            });

            $('.js-example-basic-single').prepend(newOption).trigger('change');

            $('.js-example-basic-single').on('change.select2', function(e) {
                dTable.ajax.reload();
                console.log($('#sellers-select').select2('data')[0].id);

            });

            var dTable = $('#customers-table').DataTable({
                pageLength: 5,
                lengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]],
                responsive: true,
                language: {
                    //'url': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
                    'url': '{{ asset('js/json/Spanish.json') }}'
                },
                processing: true,
                serverSide: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                ajax: {
                    url: '{!! route('get.data.customers') !!}',
                    data: function (d){
                        d.codSeller = $('#sellers-select').select2('data')[0].id;
                    },
                },
                columns: [
                    { data: 'NOMBRE', name: 'NOMBRE' },
                    { data: 'dniType', name: 'dniType' },
                    { data: 'NDOCUMENTO', name: 'NDOCUMENTO' },
                    { data: 'SEMAFORO', name: 'SEMAFORO' },
                    { data: 'DIRCLI', name: 'DIRCLI' },
                    { data: 'UBIGEOCOMPLETO', name: 'UBIGEOCOMPLETO' },
                    { data: 'FECUP', name: 'FECUP' },
                    { data: 'ZONA', name: 'ZONA' },
                    { data: 'FECINIVIG', name: 'FECINIVIG' },
                    { data: 'FECFINVIG', name: 'FECFINVIG' },
                ]
            });
        });
    </script>
@endsection
