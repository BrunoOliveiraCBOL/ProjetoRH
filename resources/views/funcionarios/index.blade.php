<x-app-layout>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                        <p class="success">{{ session('success') }}</p><br>

                        <script>
                            $(function(){
                                setTimeout(function() {
                                    $('.success').slideUp();
                                }, 5000);
                            });
                        </script>

                    @endif

                    
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
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
                            <small>Preencha com o nome completo ou matricula do funcionário.</small>
                            <br><br> 
                        </form>
                    </div>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <table class="table-auto">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2" scope="col">Matricula</th>
                                    <th class="border px-4 py-2" scope="col">Nome</th>
                                    <th class="border px-4 py-2" scope="col">Cargo</th>
                                    <th class="border px-4 py-2" scope="col">Área</th>
                                    <th class="border px-4 py-2" width="360px">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($funcionarios as $funcionario)
                                    <tr>
                                        <td class="border px-4 py-2"> {{ $funcionario->id }}</td>
                                        <td class="border px-4 py-2"> {{ $funcionario->nome }}</td>
                                        <td class="border px-4 py-2"> {{ $funcionario->cargo }}</td>
                                        <td class="border px-4 py-2"> {{ $funcionario->area }}</td>
                                        <td class="border px-4 py-2">

                                            <a href="{{ route('funcionarios.show',$funcionario->id) }}">
                                                <x-button type="submit" class="m-4">{{ __('Visualizar') }}</x-button>
                                            </a>

                                            <a href="{{ route('funcionarios.edit',$funcionario->id) }}">
                                                <x-button type="submit" class="m-4">{{ __('Editar') }}</x-button>
                                            </a>

                                            <!-- Botão com funcão de deletar o registro, caso necessario
                                            <form action="{{ route('funcionarios.destroy',$funcionario->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-button type="submit" class="m-4">{{ __('Deletar') }}</x-button>
                                            </form> -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $funcionarios->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</x-app-layout>