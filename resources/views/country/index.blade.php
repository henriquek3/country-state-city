@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @php $size=12; @endphp
                @if(session('saved'))
                    <div class="row animated fadeInDown">
                        <div class="col-lg-{{$size}}">
                            <div class="alert alert-dismissible alert-success shadow">
                                <button class="close" type="button" data-dismiss="alert">×</button>
                                <h4><i class="fa fa-check-circle"></i> Sucesso!</h4>
                                <p>Os registros foram inseridos com sucesso.</p>
                            </div>
                        </div>
                    </div>
                    <script>closeAlert()</script>
                @elseif(session('updated'))
                    <div class="row animated fadeInDown">
                        <div class="col-lg-{{$size}}">
                            <div class="alert alert-dismissible alert-success shadow">
                                <button class="close" type="button" data-dismiss="alert">×</button>
                                <h4><i class="fa fa-check-circle"></i> Sucesso!</h4>
                                <p>Os registros foram editados com sucesso.</p>
                            </div>
                        </div>
                    </div>
                    <script>closeAlert()</script>
                @elseif(session('deleted'))
                    <div class="row animated fadeInDown">
                        <div class="col-lg-{{$size}}">
                            <div class="alert alert-dismissible alert-success shadow">
                                <button class="close" type="button" data-dismiss="alert">×</button>
                                <h4><i class="fa fa-check-circle"></i> Sucesso!</h4>
                                <p>Os registros foram apagados com sucesso.</p>
                            </div>
                        </div>
                    </div>
                    <script>closeAlert()</script>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Cadastro de Países
                    </div>
                    <div class="card-body">
                        <div class="p-3">
                            <a href="/country/create" class="btn btn-warning btn-block">++ NOVO REGISTRO ++</a>
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th class="text-center" style="width: 20%;">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($paises as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->name}}</td>
                                    <td class="text-center">
                                        <a href="/country/{{$rs->id}}/edit" class="btn btn-primary btn-sm mr-2">
                                            Editar
                                        </a>
                                        <button formaction="/country/{{$rs->id}}" class="btn btn-danger btn-sm"
                                                form="resourceDelete">
                                            Deletar
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Nenhum registro encontrado.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <form method="post" id="resourceDelete">
                            @csrf @method('delete')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
