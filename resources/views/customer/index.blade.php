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
                        <table class="table table-striped display nowrap" style="width:100%" id="customers-table">
                            <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">DNI/RUC</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#customers-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                ajax: '{!! route('get.data.customers') !!}',
                columns: [
                    { data: 'CODCLI', name: 'CODCLI' },
                    { data: 'NOMBRE', name: 'NOMBRE' },
                    { data: 'RUCLE', name: 'RUCLE' },
                ]
            });
        });

    </script>
@endsection
