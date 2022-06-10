<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grupos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                            <a href="{{ route('roles.create') }}">
                                <x-button type="submit" class="m-4">{{ __('Criar Novo Grupo') }}</x-button>
                            </a>
                        </div>

                    <table align="center" class="table-auto center">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border px-4 py-2br" scope="col">#</th>
                                        <th class="border px-4 py-2" scope="col">Nome do Grupo</th>
                                        <th class="border px-4 py-2" width="360px">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td class="border px-4 py-2"> {{ $role->id }}</td>
                                            <td class="border px-4 py-2"> {{ $role->name }}</td>
                                            
                                            <td class="flex space-x-8 border px-4 py-2">
                                            

                                                <a href="{{ route('roles.edit',$role->id) }}">
                                                    <x-button type="submit" class="m-4">{{ __('Editar Permissões') }}</x-button>
                                                </a>

                                                <!-- Botão com funcão de deletar o registro, caso necessario  -->
                                                <form action="{{ route('roles.destroy',$role->id) }}" method="POST"> 
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button type="submit" class="m-4">{{ __('Deletar') }}</x-button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
