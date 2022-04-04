<x-app-layout>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Holerites') }}
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
                                }, 3000);
                            });
                        </script>

                    @endif

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <form action="{{ route('holerites.index') }}" method="GET">
                            <input type="number" name="search" autocomplete="off" placeholder="Buscar"class="font-bold py-2 px-4 rounded">
                            <x-button type="submit" class="m-4">{{ __('Buscar') }}</x-button>
                            <br>
                            <small>Digite seu numero de matricula.</small>
                            <br><br><br>
                        </form>
                    </div>
                    
                    <a href="{{ route('holerites.index') }}">
                        <x-button type="submit" class="m-4">{{ __('Mostrar Tudo') }}</x-button>
                    </a>
                    <br><br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <table align="center" class="table-auto center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2br" scope="col">Mês Referente</th>
                                    <th class="border px-4 py-2" scope="col">Holerite</th>
                                    <th class="border px-4 py-2" scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($holerites as $holerite)
                                    <tr>
                                        <td class="border px-4 py-2"> {{ $holerite->mes_referente }}</td>
                                        <td class="border px-4 py-2"> {{ $holerite->file }}</td>
                                        <td class="flex space-x-8 border px-4 py-2">
                                           
                                            <a href="{{ route('holerites.index',$holerite->id) }}">
                                                <x-button type="submit" class="m-4">{{ __('Visualizar') }}</x-button>
                                            </a>
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
            </div>
        </div>
    </div>

    

</x-app-layout>