@if(auth()->user()->can('criar_ferias'))
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Programar Férias') }}
            </h2>

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

        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                    


                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                            
                        <!--Forms Ferias-->
                        <form action="{{ route('ferias.store') }}" method="POST">
                            @csrf
                                <div class="mt-10 sm:mt-0">
                                    <div class="md:grid md:grid-cols-3 md:gap-6">
                                        <div class="md:col-auto">
                                            <div class="px-4 sm:px-0">
                                                <h3 class="text-lg font-medium leading-6 text-gray-900">Programar Férias</h3>
                                                <p class="mt-1 text-sm text-gray-600">Preencha os campos com os dados das suas férias.</p>
                                            </div>
                                        </div>
                                        <div class="mt-5 md:mt-0 md:col-span-2">
                                            <div class="shadow overflow-hidden sm:rounded-md">
                                                <div class="px-4 py-5 bg-white sm:p-6">
                                                    <div class="grid grid-cols-6 gap-6">
                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="id_matricula" class="block text-sm font-medium text-gray-700">Sua Matricula</label>
                                                            <input type="number" name="id_matricula" id="id_matricula" autocomplete="off" autofocus="on" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        </div>
                                                        <br>
                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="data_inicio" class="block text-sm font-medium text-gray-700">Data de Inicio das Férias</label>
                                                            <input type="date" name="data_inicio" id="data_inicio" autocomplete="off" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        </div>
                                                        <br>
                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="dias_ferias" class="block text-sm font-medium text-gray-700">Quantidade de Dias</label>
                                                            <input type="number" name="dias_ferias" id="dias_ferias" autocomplete="off" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">    
                                                            <small>Preencha com a quantidade de dias que utilizará das suas férias.</small>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>                                    
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <x-button type="submit" class="m-4">{{ __('Confirmar') }}</x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endif