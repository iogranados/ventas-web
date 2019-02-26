@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Pagos a cuenta</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" style="width:100%" id="payments-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Operación</th>
                                        <th scope="col">Total</th>
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
            $('#payments-table').DataTable({
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
                ajax: '{!! route('get.data.payments') !!}',
                columns: [
                    { data: 'OPERACION', name: 'OPERACION' },
                    { data: 'PEDIDOVTA', name: 'PEDIDOVTA' },
                    { data: 'ID_PAYMENT', name: 'ID_PAYMENT' },
                ]
            });
        });
    </script>
@endsection