<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Holerites') }}
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
                <div class="p-6 bg-white">
                    

                @unlessrole('admin')
                    @if(auth()->user()->can('visualizar_holerite'))                  

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <form action="{{ route('holerites.index') }}" method="GET">
                            <input type="month" name="search" autocomplete="off" placeholder="Buscar"class="font-bold py-2 px-4 rounded">
                            <x-button type="submit" class="m-4">{{ __('Buscar') }}</x-button>
                            
                            <br><br><br>
                        </form>
                    </div>
                    
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <table align="center" class="table-auto center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2br" scope="col">Mês Referente</th>
                                    <th class="border px-4 py-2" scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($holerites as $holerite)
                                    @if($holerite->id_matricula == Auth::user()->id)
                                        <tr>
                                            <td class="border px-4 py-2"> {{ date("m/Y",strtotime($holerite->mes_referente)) }}</td>
                                            <td class="flex space-x-8 border px-4 py-2">

                                                @if($holerite->file != 'null')
                                                    <a href="{{ route('download', $holerite->id) }}">
                                                        <x-button type="submit" class="m-4">{{ __('Baixar Holerite') }}</x-button>
                                                    </a>
                                                @else
                                                    Você não possui holerites para consulta.
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        @if (isset($filters))
                            {{ $holerites->appends($filters)->links()}}
                        @else
                            {{ $holerites->links()}}
                        @endif
                    </div>
                    @endif
                @endunlessrole


                    @if(auth()->user()->can('criar_holerite'))
                    
                        @if (session('success'))
                            <p class="success">{{ session('success') }}</p><br>

                            <script>
                                $(function(){
                                    setTimeout(function() {
                                        $('.success').slideUp();
                                    }, 3000);
                                });
                            </script>

                        @endif


                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" /> 

                        <form action="{{ route('holerites.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-10 sm:mt-0">
                                <div class="md:grid md:grid-cols-3 md:gap-6">
                                    <div class="md:col-auto">
                                        <div class="px-4 sm:px-0">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Upload de Holerites</h3>
                                            <p class="mt-1 text-sm text-gray-600">Preencha os campos com a matricula  e data referente ao holerite que deseja realizar o upload.</p>
                                        </div>
                                    </div>
                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="shadow overflow-hidden sm:rounded-md">
                                            <div class="px-4 py-5 bg-white sm:p-6">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="id_matricula" class="block text-sm font-medium text-gray-700">Matrícula</label>
                                                        <input type="number" name="id_matricula" id="id_matricula" autocomplete="off" class="mr-64 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="mes_referente" class="block text-sm font-medium text-gray-700">Mês Referente</label>
                                                        <input type="month" name="mes_referente" id="mes_referente" autocomplete="off" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="file" class="block text-sm font-medium text-gray-700">Holerite</label>
                                                        <input type="file" name="file" id="file" autocomplete="off" class="mr-64 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                </div>
                                            </div>
                                            <x-button type="submit" class="m-4">{{ __('Upload') }}</x-button>                                   
                                        </div>  
                                    </div>
                                </div>
                            </div>
                                          
                        </form>
                        <br>
                        <div class="border-t border-gray-200">
                        <br>
                    @endif
                    
                    @if(auth()->user()->can('criar_holerite'))
                                    
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <form action="{{ route('holerites.index') }}" method="GET">
                                <input type="text" name="search" autocomplete="off" placeholder="Buscar"class="font-bold py-2 px-4 rounded">
                                <x-button type="submit" class="m-4">{{ __('Buscar') }}</x-button>
                                <br>
                                <small>Busque pela matrícula do funcionário.</small>
                                <br>

                            </form>
                        </div>
                        
                        <a href="{{ route('holerites.index') }}">
                            <x-button type="submit" class="m-4">{{ __('Mostrar Tudo') }}</x-button>
                        </a>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <table align="center" class="table-auto center">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="border px-4 py-2br" scope="col">Matrícula</th>
                                            <th class="border px-4 py-2br" scope="col">Mês Referente</th>
                                            <th class="border px-4 py-2" scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($holerites as $holerite)
                                                <tr>
                                                    <td class="border px-4 py-2"> {{ $holerite->id_matricula }}</td>
                                                    <td class="border px-4 py-2"> {{ date("m/Y",strtotime($holerite->mes_referente)) }}</td>
                                                    <td class="flex space-x-8 border px-4 py-2">

                                                        <a href="{{ route('download', $holerite->id) }}">
                                                            <x-button type="submit" class="m-4">{{ __('Baixar Holerite') }}</x-button>
                                                        </a>

                                                        <!-- Botão com funcão de deletar o registro, caso necessario  -->
                                                        <form action="{{ route('holerites.destroy',$holerite->id) }}" method="POST"> 
                                                            @csrf
                                                            @method('DELETE')
                                                            <x-button type="submit" class="m-4">{{ __('Deletar') }}</x-button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                @if (isset($filters))
                                    {{ $holerites->appends($filters)->links()}}
                                @else
                                    {{ $holerites->links()}}
                                @endif
                            </div>
                        </div>
                             
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
