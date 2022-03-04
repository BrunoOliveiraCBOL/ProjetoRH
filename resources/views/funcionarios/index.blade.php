<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Funcionários') }}
        </h2>
    </x-slot>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-800">

                    @if (session('success'))
                        <div class="alert alert-success">
                            <p>{{ session('success') }}</p>
                        </div>
                        <br>
                    @endif

                    <div>
                        <a href="{{ route('funcionarios.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Cadastrar Novo Funcionário</a>
                    </div>
                    <br>
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <form action="{{ route('funcionarios.index') }}" method="GET">
                            <input type="text" id="search" name="form-control" autocomplete="off" placeholder="Buscar Funcionário"class="font-bold py-2 px-4 rounded">
                            <a href="{{ route('funcionarios.index') }}">
                            <x-button type="submit" class="m-4">{{ __('Buscar') }}</x-button>
                            <br> 
                            <small>Preencha com o nome ou matricula do funcionário.</small>
                            <br> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>