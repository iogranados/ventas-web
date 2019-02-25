@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vendedores</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sellers as $seller)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$seller->CODVEN}}</td>
                                        <td>{{$seller->NOMVEN}}</td>
                                        <td>{{$seller->TELE01}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
