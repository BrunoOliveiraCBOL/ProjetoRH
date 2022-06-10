@if(auth()->user()->can('criar_ferias'))
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Férias') }}
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
                            <a href="{{ route('ferias.create') }}">
                                <x-button type="submit" class="m-4">{{ __('Nova Programação de Férias') }}</x-button>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endif