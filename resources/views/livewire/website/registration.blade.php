<div>
    <div class="grid grid-cols-5 gap-1 mb-2 text-center">
        <div class="p-2 rounded-3xl @if ($step == 1 || $step == null) bg-amber-900 text-amber-100 @else text-amber-700 @endif">E-mail</div>
        <div class="p-2 rounded-3xl @if ($step == 2) text-amber-100 bg-amber-900 @else text-amber-700 @endif">Perfil</div>
        <div class="p-2 rounded-3xl @if ($step == 3) text-amber-100 bg-amber-900 @else text-amber-700 @endif">Igreja</div>
        <div class="p-2 rounded-3xl @if ($step == 4) text-amber-100 bg-amber-900 @else text-amber-700 @endif">Resumo</div>
        <div class="p-2 rounded-3xl @if ($step == 5) text-amber-100 bg-amber-900 @else text-amber-700 @endif">Confirmação</div>
    </div>

    <form onkeydown="return event.key != 'Enter';" class="box-border grid gap-2 p-2 rounded-md" style="background-color: rgba(0, 0, 0,.05); border: 2px solid #0088ae;">
        <div class="relative grid gap-2">

        @switch($step)
            @case(1)

                <x-form.block>
                    <div class="col-span-full" @if(filter_var($email, FILTER_VALIDATE_EMAIL)) wire:keydown.enter="defineStep(2)" @endif><x-form.input.email wire:keyup='verify_email' iname="email" ilabel="Seu e-mail" :irequired="true" icolspan="12" autofocus /></div>
                </x-form.block>

                @if(filter_var($email, FILTER_VALIDATE_EMAIL))
                <button type="button" wire:click="defineStep(2)">Verificar</button>
                @else
                <span >Digite um email válido</span>
                @endif

                @break

            @case(2)
                <x-form.block>
                <div class="col-span-full">
                    @if ($user != null)
                        {{-- PARTICIPANTE CADASTRADO --}}
                        <h2 class="font-bold col-span-full">Dados do participante</h2>
                        <div class="italic col-span-full text-slate-500"><strong>E-mail: {{ $email }}</strong></div>
                        <div class="col-span-full"><strong>Nome: </strong> {{ ($user->name)?$user->name:'-' }}</div>
                        <div class="col-span-full"><strong>Telefone: </strong> {{ ($user->phone)? substr(telep($user->phone), 0, 2). ' #####'. substr(telep($user->phone), -4):'Não informado' }}</div>
                    @else
                        {{-- PARTICIPANTE NÃO CADASTRADO --}}
                        <div class="grid grid-cols-2 gap-2">
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
                        </div>
                    @endif
                </div>
                </x-form.block>

                <button type="button" wire:click="defineStep(1)">Corrigir e-mail</button>
                <button type="button" wire:click="defineStep(3)">Verificar Igreja</button>

                @break

            @case(3)
                <x-form.block>
                    <div class="col-span-full">
                    <h2 class="font-bold col-span-full">Dados da Igreja</h2>
                    @if ($user != null)
                        @if ($user->church_id != null)
                        <div><strong>Nome da Igreja:        </strong>{{ $user->church->name }}</div>
                        <div><strong>Nome do Pastor:        </strong>{{ $user->church->pastor?$user->church->pastor:'-' }}</div>
                        <div><strong>Endereço da Igreja:    </strong>{{ address($user->church->street,$user->church->number,$user->church->complemet,$user->church->neighborhood,$user->church->city,$user->church->zone->initial, $user->church->zipcode) }}</div>

                        @elseif ($church_selected != null)
                        <div><strong>Nome da Igreja:        </strong>{{ $church_selected->name }}</div>
                        <div><strong>Pastor da Igreja:        </strong>{{ $church_selected->pastor?$church_selected->pastor:'-' }}</div>
                        <div><strong>Endereço da Igreja:    </strong>{{ address($church_selected->street,$church_selected->number,$church_selected->complemet,$church_selected->neighborhood,$church_selected->city,$church_selected->zone->initial, $church_selected->zipcode) }}</div>
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
                        {{-- SELECIONAR IGREJA DO PARTICIPANTE --}}
                        <div class="col-span-full">

                        @if ($church_selected != null)
                            <div><strong>Nome da Igreja:        </strong>{{ $church_selected->name }}</div>
                            <div><strong>Pastor da Igreja:        </strong>{{ $church_selected->pastor?$church_selected->pastor:'-' }}</div>
                            <div><strong>Endereço da Igreja:    </strong>{{ address($church_selected->street,$church_selected->number,$church_selected->complemet,$church_selected->neighborhood,$church_selected->city,$church_selected->zone->initial, $church_selected->zipcode) }}</div>
                        @else
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
                        @endif
                        </div>
                    @endif
                    </div>
                </x-form.block>

                <button type="button" wire:click="defineStep(2)">Voltar</button>
                <button type="button" wire:click="defineStep(4)">Avançar</button>

                @break

            @case(4)
                <x-form.block>
                    <div class="col-span-6">

                        {{-- PARTICIPANTE CADASTRADO --}}
                        <h2 class="font-bold">Dados do participante</h2>
                        <div class="italic text-slate-500"><strong>E-mail: {{ $email }}</strong></div>
                        <div class=""><strong>Nome:         </strong> {{ $name }}</div>
                        <div class=""><strong>Telefone:     </strong> {{ $phone!=null? substr(telep($phone), 0, 2). ' #####'. substr(telep($phone), -4):'Não informado' }}</div>

                    </div>
                    <div class="col-span-6">
                        {{-- IGREJA DO PARTICIPANTE --}}
                        <h2 class="font-bold ">Dados da Igreja</h2>
                        @if ($user != null)
                            @if ($user->church_id != null)
                                <div><strong>Nome da Igreja:     </strong>   {{ $user->church->name }}</div>
                                <div><strong>Nome do Pastor:     </strong>   {{ $user->church->pastor?$user->church->pastor:'-' }}</div>
                                <div><strong>Endereço da Igreja: </strong>   {{ address($user->church->street,$user->church->number,$user->church->complemet,$user->church->neighborhood,$user->church->city,$user->church->zone->initial, $user->church->zipcode) }}</div>
                            @else
                                <div><strong>Nome da Igreja:     </strong>  {{ $church_selected->name }}</div>
                                <div><strong>Nome do Pastor:     </strong>  {{ $church_selected->pastor?$church_selected->pastor:'-' }}</div>
                                <div><strong>Endereço da Igreja: </strong>  {{ address($church_selected->street,$church_selected->number,$church_selected->complemet,$church_selected->neighborhood,$church_selected->city,$church_selected->zone->initial, $church_selected->zipcode) }}</div>
                            @endif
                        @elseif ($church_selected != null)
                            <div><strong>Nome da Igreja:     </strong>  {{ $church_selected->name }}</div>
                            <div><strong>Nome do Pastor:     </strong>  {{ $church_selected->pastor?$church_selected->pastor:'-' }}</div>
                            <div><strong>Endereço da Igreja: </strong>  {{ address($church_selected->street,$church_selected->number,$church_selected->complemet,$church_selected->neighborhood,$church_selected->city,$church_selected->zone->initial, $church_selected->zipcode) }}</div>
                        @endif
                    </div>
                </x-form.block>

                <button type="button" wire:click="defineStep(3)">Voltar</button>
                <button type="button" wire:click="defineStep(5)">Confirmo</button>

                @break
            @case(5)
                Orientações
                @break

        @endswitch


        </div>
    </form>

</div>
