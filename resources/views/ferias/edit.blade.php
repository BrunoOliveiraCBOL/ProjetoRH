@if(auth()->user()->can('editar_ferias'))
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Atualizar Solicitação de Férias') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                    @can('user')
                        Visão do Funcionário
                    @elsecan('admin')
                        Visão do Administrador
                    @endcan
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endif