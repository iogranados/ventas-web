@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Vendedores</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" style="width:100%" id="sellers-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Imei</th>
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
            $('#sellers-table').DataTable({
                responsive: true,
                bAutoWidth: false,
                language: {
                    'url': '{{ asset('js/json/Spanish.json') }}'
                },
                processing: true,
                serverSide: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                ajax: '{!! route('get.data.sellers') !!}',
                columns: [
                    { data: 'NOMVEN', name: 'NOMVEN' },
                    { data: 'TELE01', name: 'TELE01' },
                    { data: 'IMEI', name: 'IMEI' },
                    { data: 'CODVEN', name: 'CODVEN' },
                ]
            });
        });

    </script>
@endsection