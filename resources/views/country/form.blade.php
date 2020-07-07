@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Cadastro de Países
                    </div>
                    <div class="card-body">
                        {{--<div class="p-3">
                            <a href="/country/create" class="btn btn-warning btn-block">++ NOVO REGISTRO ++</a>
                        </div>--}}
                        <form method="post">
                            @csrf @isset($resource) @method('put') @endisset
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome do Pais</label>
                                <input type="text" name="name"
                                       placeholder="Nome Pais"
                                       value="{{$resource->name ?? ''}}"
                                       class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group text-center">
                                @isset($resource)
                                    <button type="submit" class="btn btn-success"
                                            formaction="/country/{{$resource->id}}"
                                    >
                                        Atualizar
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-primary"
                                            formaction="/country"
                                    >
                                        Salvar
                                    </button>
                                @endisset
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
