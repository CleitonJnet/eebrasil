<div>
    <div class="grid grid-cols-5 gap-1 mb-2 text-center">
        <div class="p-2 rounded text-slate-300 @if ($step == 1 || $step == null) bg-slate-700 @endif">E-mail</div>
        <div class="p-2 rounded text-slate-300 @if ($step == 2) bg-slate-700 @endif">Perfil</div>
        <div class="p-2 rounded text-slate-300 @if ($step == 3) bg-slate-700 @endif">Igreja</div>
        <div class="p-2 rounded text-slate-300 @if ($step == 4) bg-slate-700 @endif">Resumo</div>
        <div class="p-2 rounded text-slate-300 @if ($step == 5) bg-slate-700 @endif">Confirmação</div>
    </div>

    <form onkeydown="return event.key != 'Enter';"
        style="display: grid; gap: 10px; box-sizing: border-box; background-color: rgba(0, 0, 0,.05); border-radius: 10px; border: 2px solid #0088ae; padding: 10px;">
        <div style="display: grid; gap: 20px; position: relative;">
            @switch($step)
                @case(1)
                    <x-form.block>
                        <x-form.input.email wire:keyup='verify_email' iname="email" ilabel="E-mail" :irequired="true" icolspan="12" autofocus />
                        <div class="grid grid-cols-2 gap-1 col-span-full">
                        @if (strpbrk($email, '@' ))
                            <button type="button" class="col-start-2 py-2 rounded-r-3xl bg-slate-900 text-slate-400" wire:click='defineStep(2)'>Verificar email</button>
                        @else
                            <div class="col-start-2 py-2 text-center rounded-r-3xl bg-slate-900 text-slate-400">Digite seu e-mail para avançar</div>
                        @endif
                        </div>
                    </x-form.block>
                @break

                @case(2)

                <div style="display: grid; gap: 15px; grid-template-columns: repeat(2, 1fr); background-color: #fff; border-radius: 5px; padding: 20px; box-shadow: 0 0 1px 2px rgba(0,0,0,.5); ">
                    @if ($this->user != null)

                        {{-- PARTICIPANTE CADASTRADO --}}
                        <h2 class="font-bold col-span-full">Dados do participante</h2>
                        <div class="col-span-full text-slate-500">E-mail: <strong>{{ $email }}</strong></div>
                        <div class="col-span-full">É pastor: {{ $user->pastor == 0 ? 'Não' : 'Sim' }}</div>
                        <div class="col-span-full">Nome: {{ ($user->name)?$user->name:'-' }}</div>
                        <div class="col-span-full">Sexo: @if($user->gender) {{ ($user->gender == 'M')? 'Masculino':'Feminino' }} @else 'Não informado' @endif </div>
                        <div class="col-span-full">Telefone: {{ ($user->phone)? substr(telep($user->phone), 0, 2). ' #####'. substr(telep($user->phone), -4):'Não informado' }}</div>


                    @else

                        {{-- PARTICIPANTE NÃO CADASTRADO --}}
                        <div class="col-span-full text-slate-500">E-mail: <strong>{{ $email }}</strong></div>
                        <x-form.select iname="is_pastor" ilabel="É Pastor?" icolspan="1">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </x-form.select>
                        <x-form.input.text iname="name" ilabel="Nome completo" icolspan='1' />
                        <x-form.input.tel iname="phone" ilabel="Telefone" icolspan="1" />
                        <x-form.select iname="gender" ilabel="Sexo" icolspan="1">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </x-form.select>
                        <x-form.input.date iname="birth" ilabel="Data de Nascimento" icolspan='1' />
                        <x-form.input.text iname="ministery" ilabel="Ministério que desenvolve na igreja" icolspan="1" />


                    @endif

                    <div class="grid grid-cols-2 gap-1 col-span-full">
                        <button type="button" class="py-2 rounded-l-3xl bg-slate-900 text-slate-400" wire:click='defineStep(1)'>Corrigir e-mail</button>
                        <button type="button" class="py-2 rounded-r-3xl bg-slate-900 text-slate-400" wire:click='defineStep(3)'>Identificar Igreja</button>
                    </div>
                </div>

                @break

                @case(3)
                    <x-form.block>
                        @if ($user != null)
                        {{-- PARTICIPANTE CADASTRADO --}}

                            @if ($user->church_id != null || $church_selected != null)
                                {{-- PARTICIPANTE COM IGREJA --}}
                                <h2 class="font-bold col-span-full">Dados da igreja</h2>
                                <div class="col-span-full">Igreja: {{ $user->church->name          ?? $church_selected->name          }} </div>
                                <div class="col-span-full">Pastor: {{ $user->church->pastor        ?? $church_selected->pastor        }} </div>
                                <div class="col-span-full">Bairro: {{ $user->church->neighborhood  ?? $church_selected->neighborhood  }} </div>
                                <div class="col-span-full">Cidade: {{ $user->church->city          ?? $church_selected->city          }} </div>
                                <div class="col-span-full">UF:     {{ $user->church->zone->initial ?? $church_selected->zone->initial }} </div>

                            @else
                                {{-- SELECIONAR IGREJA DO PARTICIPANTE --}}
                                <div class="col-span-full">


                                    <form wire:submit="search">
                                        <x-form.input.text wire:model='search_church' wire:click='resetPagination' ilabel="{{ __('Search church') }}" placeholder="{{ __('Search church') }}" iname="search_church" />
                                    </form>

                                    <div class="grid gap-1">
                                        @foreach ($churches as $church)
                                        <button type="button" wire:click.prevent='selectChurch({{ $church->id }})' class="grid grid-cols-2 p-4 text-left border rounded border-sky-500 text-sky-900 bg-sky-100 hover:bg-sky-200/60">
                                            <div>
                                                <div class="text-sm font-semibold">{{ $church->name }}</div>
                                                <div class="text-xs">{{ __('Pastor') }}: {{ $church->pastor ?? '-' }}</div>
                                            </div>
                                            <div>
                                                <div class="text-sm">{{ $church->neighborhood ?? '-' }}</div>
                                                <div class="text-xs">{{ $church->city ?? '-' }} - {{ $church->zone_id != null ? $church->zone->initial : '' }}</div>
                                            </div>
                                        </button>
                                        @endforeach

                                        <div>{{ $churches->links() }}</div>
                                    </div>


                                </div>

                            @endif

                        @else
                        {{-- PARTICIPANTE NÃO CADASTRADO E IGREJA DESCONHECIDA AQUI DEVE-SE BUSCAR A IGREJA OU CADASTRAR A NOVA IGREJA --}}
                        <div class="col-span-full">


                            <form wire:submit="search">
                                <x-form.input.text wire:model='search_church' wire:click='resetPagination' ilabel="{{ __('Search church') }}" placeholder="{{ __('Search church') }}" iname="search_church" />
                            </form>

                            <div class="grid gap-1">
                                @foreach ($churches as $church)
                                <button type="button" wire:click.prevent='selectChurch({{ $church->id }})' class="grid grid-cols-2 p-4 text-left border rounded border-sky-500 text-sky-900 bg-sky-100 hover:bg-sky-200/60">
                                    <div>
                                        <div class="text-sm font-semibold">{{ $church->name }}</div>
                                        <div class="text-xs">{{ __('Pastor') }}: {{ $church->pastor ?? '-' }}</div>
                                    </div>
                                    <div>
                                        <div class="text-sm">{{ $church->neighborhood ?? '-' }}</div>
                                        <div class="text-xs">{{ $church->city ?? '-' }} - {{ $church->zone_id != null ? $church->zone->initial : '' }}</div>
                                    </div>
                                </button>
                                @endforeach

                                <div>{{ $churches->links() }}</div>
                            </div>


                        </div>
                        @endif
                        <div class="grid grid-cols-2 gap-1 col-span-full">
                            <button type="button" class="py-2 rounded-l-3xl bg-slate-900 text-slate-400" wire:click='defineStep(2)'>Perfil</button>
                            <button type="button" class="py-2 rounded-r-3xl bg-slate-900 text-slate-400" wire:click='defineStep(4)'>Resumo da inscrição</button>
                        </div>

                    </x-form.block>
                @break

                @case(4)
                    <x-form.block>
                        @if ($this->user != null)
                        <div class="grid grid-cols-2 gap-2 col-span-full">
                            <div>
                                <h2 class="font-bold">Dados do participante</h2>
                                <div class="text-slate-500">E-mail: <strong>{{ $email }}</strong></div>
                                <div>É pastor: {{ $user->pastor == 0 ? 'Não' : 'Sim' }}</div>
                                <div>Nome: {{ ($user->name)?$user->name:'-' }}</div>
                                <div>Sexo: @if($user->gender) {{ ($user->gender == 'M')? 'Masculino':'Feminino' }} @else 'Não informado' @endif </div>
                                <div>Telefone: {{ ($user->phone)? substr(telep($user->phone), 0, 2). ' #####'. substr(telep($user->phone), -4):'Não informado' }}</div>
                            </div>
                            <div>
                                @if ($user->church_id != null || $church_selected != null)
                                    {{-- PARTICIPANTE COM IGREJA --}}
                                    <h2 class="font-bold col-span-full">Dados da igreja</h2>
                                    <div class="col-span-full">Igreja: {{ $user->church->name          ?? $church_selected->name          }} </div>
                                    <div class="col-span-full">Pastor: {{ $user->church->pastor        ?? $church_selected->pastor        }} </div>
                                    <div class="col-span-full">Bairro: {{ $user->church->neighborhood  ?? $church_selected->neighborhood  }} </div>
                                    <div class="col-span-full">Cidade: {{ $user->church->city          ?? $church_selected->city          }} </div>
                                    <div class="col-span-full">UF:     {{ $user->church->zone->initial ?? $church_selected->zone->initial }} </div>

                                @else

                                    <h2 class="font-bold col-span-full">Igreja não identificada</h2>

                                @endif
                            </div>
                        </div>
                        @else
                        <div class="grid grid-cols-2 gap-2 col-span-full">
                            <div>
                                <h2 class="font-bold">Dados do participante</h2>
                                <div class=" text-slate-500">E-mail: <strong>{{ $email }}</strong></div>
                                <div>É pastor: {{ $is_pastor == 0 ? 'Não' : 'Sim' }}</div>
                                <div>Nome: {{ ($name)?$name:'-' }}</div>
                                <div>Sexo: @if($gender) {{ ($gender == 'M')? 'Masculino':'Feminino' }} @else 'Não informado' @endif </div>
                                <div>Telefone: {{ ($phone)? substr(telep($phone), 0, 2). ' #####'. substr(telep($phone), -4):'Não informado' }}</div>
                            </div>
                            <div>
                                <h2 class="font-bold">Dados da igreja</h2>
                                <div class="">Igreja: {{ isset($church_selected)?$church_selected->name:'-' }}</div>
                                <div>Pastor: {{ isset($church_selected)?$church_selected->pastor:'-' }}</div>
                                <div>Bairro: {{ isset($church_selected)?$church_selected->neighborhood:'-' }}</div>
                                <div>Cidade: {{ isset($church_selected)?$church_selected->city:'-' }}</div>
                                <div>UF: {{ isset($church_selected->zone)?$church_selected->zone->initial:'-' }}</div>
                            </div>
                        </div>
                        @endif

                        <div class="grid grid-cols-2 gap-1 col-span-full">
                            <button type="button" class="py-2 rounded-l-3xl bg-slate-900 text-slate-400" wire:click='defineStep(3)'>Cadastro da Igreja</button>
                            <button type="button" class="py-2 rounded-r-3xl bg-slate-900 text-slate-400" wire:click='defineStep(5)'>Confirmar inscrição</button>
                        </div>

                    </x-form.block>
                @break

                @case(5)
                    <x-form.block>
                        <div class="col-span-full">Confirmação da Inscrição</div>
                    </x-form.block>
                @break

            @endswitch
        </div>
    </form>

</div>
