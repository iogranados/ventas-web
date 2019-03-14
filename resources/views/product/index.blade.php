@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Productos</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" style="width:100%" id="products-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Fec Ini Vig</th>
                                        <th scope="col">Fec Fin Vig</th>
                                        <th scope="col">Caja x</th>
                                        <th scope="col">Tipo Unidad</th>
                                        <th scope="col">Fec uv</th>
                                        <th scope="col">Código</th>
                                        <th scope="col">Precio 1</th>
                                        <th scope="col">Precio 2</th>
                                        <th scope="col">Precio 3</th>
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
            $('#products-table').DataTable({
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
                ajax: '{!! route('get.data.products') !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'fecIniVig', name: 'fecIniVig' },
                    { data: 'fecFinVig', name: 'fecFinVig' },
                    { data: 'boxby', name: 'boxby' },
                    { data: 'typeunit', name: 'typeunit' },
                    { data: 'fecUv', name: 'fecUv' },
                    { data: 'codproduct', name: 'codproduct' },
                    { data: 'priceone', name: 'priceone' },
                    { data: 'pricetwo', name: 'pricetwo' },
                    { data: 'pricethree', name: 'pricethree' },
                ]
            });
        });

    </script>
@endsection
