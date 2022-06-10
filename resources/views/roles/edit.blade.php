<x-app-layout>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
  
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

    <x-slot name="header"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Permissões') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                <form action="{{ route('roles.update',$role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-10 sm:mt-0">
                                <div class="md:grid md:grid-cols-3 md:gap-6">
                                    <div class="md:col-auto">
                                        <div class="px-4 sm:px-0">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Permissões do Grupo</h3>
                                            <p class="mt-1 text-sm text-gray-600">Selecione todas as permissões que o grupo possuirá.</p>
                                        </div>
                                    </div>
                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="shadow overflow-hidden sm:rounded-md">
                                            <div class="px-4 py-5 bg-white sm:p-6">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        Colaboradores
                                                        <label class="block text-sm font-medium text-gray-700">
                                                        Criar: <input type="checkbox" name="campo[]" value="1" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>
                                                        Visualizar: <input type="checkbox" name="campo[]" value="2" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>    
                                                        Editar: <input type="checkbox" name="campo[]" value="3" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>
                                                        Deletar: <input type="checkbox" name="campo[]" value="4" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>    
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        Holerites
                                                        <label class="block text-sm font-medium text-gray-700">
                                                        Criar: <input type="checkbox" name="campo[]" value="5" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br> 
                                                        Visualizar: <input type="checkbox" name="campo[]" value="6" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>     
                                                        Editar: <input type="checkbox" name="campo[]" value="7" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>     
                                                        Deletar: <input type="checkbox" name="campo[]" value="8" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>     
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        Férias
                                                        <label class="block text-sm font-medium text-gray-700">
                                                        Criar: <input type="checkbox" name="campo[]" value="9" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br> 
                                                        Visualizar: <input type="checkbox" name="campo[]" value="10" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>    
                                                        Editar: <input type="checkbox" name="campo[]" value="11" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>     
                                                        Deletar: <input type="checkbox" name="campo[]" value="12" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>     
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        Grupos
                                                        <label class="block text-sm font-medium text-gray-700">
                                                        Criar: <input type="checkbox" name="campo[]" value="13" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br> 
                                                        Visualizar: <input type="checkbox" name="campo[]" value="14" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>
                                                        Editar: <input type="checkbox" name="campo[]" value="15" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>     
                                                        Deletar: <input type="checkbox" name="campo[]" value="16" autocomplete="off" class="shadow-sm sm:text-sm border-gray-300 rounded-md"><br>     
                                                        </label>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <br>
                        <x-button type="submit" class="m-4">{{ __('Concluir') }}</x-button>
                </form>    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>