@if(auth()->user()->can('editar_colaborador'))
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
                {{ __(' Atualizar Cadastro') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white">
                        
                        <a href="{{ route('funcionarios.index') }}">
                            <x-button type="submit" class="m-4">{{ __('Voltar') }}</x-button>
                            
                        </a>
                        <br>
                        <br>

                        <!-- Validation Errors--> 
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />


                        <!--Forms Funcionario-->
                        <form action="{{ route('funcionarios.update',$funcionario->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

                            <div class="mt-10 sm:mt-0">
                                <div class="md:grid md:grid-cols-3 md:gap-6">
                                    <div class="md:col-auto">
                                        <div class="px-4 sm:px-0">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Informações Pessoais</h3>
                                            <p class="mt-1 text-sm text-gray-600">Dados pessoais do funcionário.</p>
                                        </div>
                                    </div>
                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="shadow overflow-hidden sm:rounded-md">
                                            <div class="px-4 py-5 bg-white sm:p-6">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="id" class="block text-sm font-medium text-gray-700">Matricula</label>
                                                        <input type="number" name="id" id="id" autocomplete="off" value="{{ $funcionario->id }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">    
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome Completo</label>
                                                        <input type="text" name="nome" id="nome" autocomplete="off" value="{{ $funcionario->nome }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">    
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>
                                                        <select id="sexo" name="sexo" autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            <option value="{{ $funcionario->sexo }}">{{ $funcionario->sexo }}</option>
                                                            <option value="">Selecione</option>
                                                            <option value="Masculino">Masculino</option>
                                                            <option value="Feminino">Feminino</option>
                                                            <option value="Outros">Outros</option>
                                                        </select>
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="data_nascimento" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                                                        <input type="date" name="data_nascimento" id="data_nascimento" autocomplete="off" value="{{ $funcionario->data_nascimento }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="estado_civil" class="block text-sm font-medium text-gray-700">Estado Civil</label>
                                                        <select id="estado_civil" name="estado_civil" autocomplete="off" value="{{ $funcionario->estado_civil }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            <option value="{{ $funcionario->estado_civil }}">{{ $funcionario->estado_civil }}</option>
                                                            <option value="">Selecione</option>
                                                            <option value="Solteiro">Solteiro</option>
                                                            <option value="Casado">Casado</option>
                                                            <option value="Separado">Separado</option>
                                                            <option value="Divorciado">Divorciado</option>
                                                            <option value="Viúvo">Viúvo</option>
                                                        </select>
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="telefone" class="block text-sm font-medium text-gray-700">(DDD) + Telefone</label>
                                                        <input type="tel" name="telefone" id="telefone" placeholder="(12)34567-8901" maxlength="15" autocomplete="off" value="{{ $funcionario->telefone }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                                                        <small>Preencha apenas com os números.</small>
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                                        <input type="email" name="email" id="email" autocomplete="off" value="{{ $funcionario->email }}" class="mr-64 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <br>
                                                    <p>
                                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                            <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
                                                            <input type="number" name="cep" id="cep" maxlength="8" autocomplete="off" value="{{ $funcionario->cep }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            <small>Preencha apenas com os números.</small>
                                                        </div>
                                                    </p>
                                                    <br>
                                                    <p>
                                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                            <label for="logradouro" class="block text-sm font-medium text-gray-700">Endereço</label>
                                                            <input type="text" name="logradouro" id="logradouro" autocomplete="off" value="{{ $funcionario->logradouro }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        </div>
                                                    </p>                                    
                                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                        <label for="numero" class="block text-sm font-medium text-gray-700">Número</label>
                                                        <input type="number" name="numero" id="numero" maxlength="5" autocomplete="off" value="{{ $funcionario->numero }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                        <label for="complemento" class="block text-sm font-medium text-gray-700">Complemento</label>
                                                        <input type="text" name="complemento" id="complemento" autocomplete="off" value="{{ $funcionario->complemento }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                        <label for="bairro" class="block text-sm font-medium text-gray-700">Bairro</label>
                                                        <input type="text" name="bairro" id="bairro" autocomplete="off" value="{{ $funcionario->bairro }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                        <label for="cidade" class="block text-sm font-medium text-gray-700">Cidade</label>
                                                        <input type="text" name="cidade" id="cidade" autocomplete="off" value="{{ $funcionario->cidade }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                        <label for="uf" class="block text-sm font-medium text-gray-700">Estado</label>
                                                        <input type="text" name="uf" id="uf" autocomplete="off" value="{{ $funcionario->uf }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                        <label for="pais" class="block text-sm font-medium text-gray-700">País</label>
                                                        <select id="pais" name="pais" autocomplete="off" value="{{ $funcionario->pais }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            <option value="{{ $funcionario->pais }}">{{ $funcionario->pais }}</option>
                                                            <option value="">Selecione</option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Bolívia">Bolívia</option>
                                                            <option value="Brasil">Brasil</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="Colômbia">Colômbia</option>
                                                            <option value="Equador">Equador</option>
                                                            <option value="Guiana">Guiana</option>
                                                            <option value="Guiana Francesa">Guiana Francesa</option>
                                                            <option value="Paraguai">Paraguai</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Uruguai">Uruguai</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>                                    
                                        </div> 
                                    </div>
                                </div>
                            </div>        
                            <br>
                            <br>                            
                            <div class="mt-10 sm:mt-0">
                                <div class="md:grid md:grid-cols-3 md:gap-6">
                                    <div class="md:col-auto">
                                        <div class="px-4 sm:px-0">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Informações do Funcionário</h3>
                                            <p class="mt-1 text-sm text-gray-600">Dados referentes a CBOL, do funcionário.</p>
                                        </div>
                                    </div>
                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <div class="shadow overflow-hidden sm:rounded-md">
                                            <div class="px-4 py-5 bg-white sm:p-6">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="tipo_contratacao" class="block text-sm font-medium text-gray-700">Tipo de Contratação</label>
                                                        <select id="tipo_contratacao" name="tipo_contratacao" autocomplete="off"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            <option value="{{ $funcionario->tipo_contratacao }}">{{ $funcionario->tipo_contratacao }}</option>
                                                            <option value="">Selecione</option>
                                                            <option value="CLT">CLT</option>
                                                            <option value="PJ">PJ</option>
                                                            <option value="Terceirizado">Terceirizado</option>
                                                            <option value="Outros">Outros</option>
                                                        </select>
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="data_admissao" class="block text-sm font-medium text-gray-700">Data de Admissão</label>
                                                        <input type="date" name="data_admissao" id="data_admissao" autocomplete="off" value="{{ $funcionario->data_admissao }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo</label>
                                                        <input type="text" name="cargo" id="cargo" autocomplete="off" value="{{ $funcionario->cargo }}" class="mr-64 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="area" class="block text-sm font-medium text-gray-700">Área</label>
                                                        <input type="text" name="area" id="cargo" autocomplete="off" value="{{ $funcionario->area }}" class="mr-64 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <br>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="salario" class="block text-sm font-medium text-gray-700">Salário</label>
                                                        <input type="text" name="salario" id="salario" value="{{ $funcionario->salario }}" class="mr-64 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>                                    
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <br>
                            <x-button type="submit" class="m-4">{{ __('Atualizar') }}</x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>
@endif