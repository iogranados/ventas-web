@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Ordenes</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" style="width:100%" id="orders-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Código</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Vendedor</th>
                                        <th scope="col">Pago</th>
                                        <th scope="col">Fecha Remisión</th>
                                        <th scope="col">Fecha Entrega</th>
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
            $('#orders-table').DataTable({
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
                ajax: '{!! route('get.data.orders') !!}',
                columns: [
                    { data: 'codsale', name: 'codsale' },
                    { data: 'customer.NOMBRE', name: 'customer.NOMBRE' },
                    { data: 'seller.NOMVEN', name: 'seller.NOMVEN' },
                    { data: 'paymenttype', name: 'paymenttype' },
                    { data: 'dateorder', name: 'dateorder' },
                    { data: 'datedelivery', name: 'datedelivery' },
                ]
            });
        });

    </script>
@endsection