<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Funcionários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">

                    @if (session('success'))
                        <div class="alert alert-success">
                            <p>{{ session('success') }}</p>
                        </div>
                        <br>
                    @endif

                    <div>
                        <a href="{{ route('funcionarios.create') }}">
                            <x-button type="submit" class="m-4">{{ __('Cadastrar Novo Funcionário') }}</x-button>
                        </a>
                    </div>
                    <br>
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <form action="" method="GET">
                            <input type="text" id="search" name="form-control" autocomplete="off" placeholder="Buscar Funcionário"class="font-bold py-2 px-4 rounded">
                            <a href="{{ route('funcionarios.index') }}">
                                <x-button type="submit" class="m-4">{{ __('Buscar') }}</x-button>
                            </a>
                            <br> 
                            <small>Preencha com o nome ou id do funcionário.</small>
                            <br> 
                        </form>
                    </div>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="w-1/2 px-4 py-2">Matrícula</th>
                                <th class="w-1/4 px-4 py-2">Nome</th>
                                <th class="w-1/4 px-4 py-2">Cargo</th>
                                <th class="w-1/4 px-4 py-2">Área</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionarios as $funcionario)
                                <td> {{ $funcionario->id}}</td>
                                <td> {{ $funcionario->nome}}</td>
                                <td> {{ $funcionario->cargo}}</td>
                                <td> {{ $funcionario->area}}</td>
                                <td>
                                    <form action="{{ route('funcionarios.destroy',$funcionario->id) }}" method="POST">
   
                                        <a class="btn btn-info" href="{{ route('funcionarios.show',$funcionario->id) }}">Visualizar</a>

                                        <a class="btn btn-primary" href="{{ route('funcionarios.edit',$funcionario->id) }}">Editar</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Deletar</button>
                                    </form>
                                </td>
                            @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    

</x-app-layout>