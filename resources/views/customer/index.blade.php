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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered display nowrap" style="width:100%" id="customers-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">DNI/RUC</th>
                                        <th scope="col">Código</th>
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

@section('script')
    <script>
        $(function() {
            $('#customers-table').DataTable({
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
                ajax: '{!! route('get.data.customers') !!}',
                columns: [
                    { data: 'NOMBRE', name: 'NOMBRE' },
                    { data: 'RUCLE', name: 'RUCLE' },
                    { data: 'CODCLI', name: 'CODCLI' },
                ]
            });
        });
    </script>
@endsection