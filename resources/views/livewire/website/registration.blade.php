<div>

    <x-form wire:submit.prevent='create' class="grid gap-4">

        {{-- @if($ver_email)
        <div class="grid grid-cols-2 px-4 py-1 mb-1 text-sm font-semibold rounded bg-sky-700 text-sky-100">
            <div>
                <div class="text-left">{{ $user->name }}</div>
                <div class="text-left">{{ date('d/m/Y',strtotime($user->birth)) }}</div>
                <div class="text-left">{{ $user->email }}</div>
                <div class="text-left">{{ telep($user->phone) }}</div>
            </div>
            <div>
                @isset($user->church)
                <div class="text-left">{{ $user->church->name }}</div>
                <div class="text-left">{{ $user->church->pastor }}</div>
                @endisset
            </div>

            <hr class="my-1 col-span-full">
            @isset ($user->church)
                @if ($user->church->id != $church_selected->id)
                <button wire:click="select_student({{$user->id}}, {{0}})" class="py-1 my-1 mr-1 rounded bg-sky-100 text-sky-800">Mante na igreja de origem</button>
                <button wire:click="select_student({{$user->id}}, {{1}})" class="py-1 my-1 ml-1 rounded bg-sky-100 text-sky-800">Atualizar igreja</button>
                @else
                <button wire:click="select_student({{$user->id}}, {{0}})" class="py-1 my-1 mr-1 rounded bg-sky-100 text-sky-800 col-span-full">Cadastrar participante</button>
                @endif
            @else
            <button wire:click="select_student({{$user->id}}, {{1}})" class="py-1 my-1 mr-1 rounded bg-sky-100 text-sky-800 col-span-full">Cadastrar participante</button>
            @endisset
        </div>
        @endif --}}

        @if (session()->has('message'))
            <div class="p-2 text-green-200 bg-green-700 rounded ">
                {{ session('message') }}
            </div>
        @endif

        <x-form.block>
            <button wire:click="showModalSelectChurch" type="button" class="grid grid-cols-2 p-4 text-left border rounded col-span-full border-sky-500 text-sky-900 bg-sky-100 hover:bg-sky-200/60">
                @isset ($church_selected)
                <div>
                    <div class="text-sm font-semibold">{{ $church_selected->name }}</div>
                    <div class="text-xs">{{ __('Pastor') }}: {{ $church_selected->pastor ?? '-' }}</div>
                </div>
                <div>
                    <div class="text-sm">{{ $church_selected->neighborhood ?? '-' }}</div>
                    <div class="text-xs">{{ $church_selected->city ?? '-' }} - {{ $church_selected->zone_id != null ? $church_selected->zone->initial : '' }}</div>
                </div>
                @else
                <div class="text-center col-span-full">Selecione sua igreja</div>
                @endisset
            </button>

            <x-form.input.email wire:change='verify_email' wire:keyup='verify_email' iname="email" ilabel="Seu e-mail" :irequired="true" icolspan="12" />

            <x-form.select iname="is_pastor" ilabel="Você é pastor?" icolspan="6"  :disabled="$ver_email">
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </x-form.select>
            <x-form.input.text iname="name" ilabel="Seu nome completo:" icolspan='6' :disabled="$ver_email" />
            <x-form.input.tel iname="phone" ilabel="Seu telefone:" icolspan="6"  :disabled="$ver_email" />
            <x-form.select iname="gender" ilabel="Qual o seu sexo?" icolspan="6"  :disabled="$ver_email">
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </x-form.select>
            <x-form.input.date iname="birth" ilabel="Sua data de nascimento:" icolspan='6'  :disabled="$ver_email" />
            <x-form.input.text iname="ministery" ilabel="Ministério que desenvolve na igreja?" icolspan="6"  :disabled="$ver_email" />

        </x-form.block>
    </x-form>



    <x-modal wire:model='modalSelectChurch' maxWidth='5xl'>
        <div class="flex items-center justify-between">
            <div class="px-4 py-2 font-bold">Qual o nome da sua igreja?</div>
            <button wire:click='hiddenModalSelectChurch' class="px-4 py-2 border">Fechar</button>
        </div>
        <div style="padding: 20px; display: grid; gap: 20px;">
            <div style="display: grid; gap: 10px">

                <form wire:submit="search">
                    <x-form.input.text wire:model='search_church' wire:click='resetPagination' ilabel="{{ __('Digite o nome completo de sua igreja.') }}" placeholder="{{ __('Digite o nome completo de sua igreja.') }}" iname="search_church" autofocus />
                </form>

                @if ($search_church != null && Str::length($search_church)>=3)
                <div class="grid gap-1">

                    @if ($churches->count()>0)
                    <div class="flex items-end justify-between font-bold text-amber-900">
                        <div>Clique no nome da sua igreja:</div>
                        <small>Está em ordem alfabética.</small>
                    </div>

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
                    @else
                        <div class="leading-5 text-red-900">
                            <div>Nenhuma igreja com esse nome foi encontrada.</div>
                            <div class="italic font-light">Verifique se digitou o nome corretamente.</div>
                        </div>
                    @endif

                    <button wire:click.prevent='showModalNewChurch' class="mt-10 italic text-amber-900">Caso a sua igreja não esteja na lista acima clique aqui para cadastrar.</button>
                </div>
                @endif
            </div>
        </div>
    </x-modal>

    <x-modal wire:model='modalNewChurch' maxWidth='6xl' :id="session('login-role')">
        <form wire:submit.prevent="addNewChurch">
            <div style="display: grid; gap: 20px; background-color: beige;">

                <h2 style="padding: 10px 20px;background-color: #fff;">Nova Igreja</h2>

                <div style="display: grid; gap: 20px; padding: 10px 20px;">
                    <h3>Informação Básica da Igreja</h3>
                    <x-form.block>
                        <x-form.input.text iname="church_name"   ilabel="{{ __('Name da Igreja') }}"     placeholder="{{ __('Name da Igreja') }}"           icolspan="6" />
                        <x-form.input.text iname="church_pastor" ilabel="{{ __('Pastor da Igreja') }}"   placeholder="{{ __('Nome do pastor da Igreja') }}" icolspan="6" />
                        <x-form.input.text iname="church_phone"  ilabel="{{ __('Telefone da Igreja') }}" placeholder="{{ __('Telefone da Igreja') }}"       icolspan="6" />
                        <x-form.input.text iname="church_email"  ilabel="{{ __('Email da Igreja') }}"    placeholder="{{ __('Email da Igreja') }}"          icolspan="6" />
                    </x-form.block>

                    <h3>Endereço da igreja</h3>
                    {{-- INÍCIO - BLOCO ENDEREÇO --}}
                    <x-form.block>
                        <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">
                            <label for="church_zipcode">CEP</label>
                            <div style="display: block; width: 100%; border-radius: 5px; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box; overflow: hidden; position: relative;">
                                <input type="text" wire:model="church_zipcode" id="church_zipcode" name="church_zipcode" placeholder="CEP" style="border: none; width: 100%; padding-right: 50px;">
                                <button type="button" wire:click="search_zipcode_church" title="Buscar pelo CEP" style="width: 50px; position: absolute; right: 0; background-color: #cecece; padding: 8px">&#128270;</button>
                            </div>
                        </div>

                        <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">{{ session('message') }}</div>

                        <x-form.input.text iname="church_street" ilabel="Logradouro" icolspan="6" required />
                        <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">
                            <div class="flex"><label for="church_number">Número</label>/<label for="church_complement">Complemento</label></div>
                            <div style="display: flex; width: 100%; border-radius: 5px; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box; overflow: hidden; position: relative;">
                                <input type="text" wire:model="church_number" id="church_number" name="church_number" placeholder="Nº" style="border: none; width: 40%; border-right: solid #3d3d3d 1px">
                                <input type="text" wire:model="church_complement" id="church_complement" name="church_complement" placeholder="Complemento" style="border: none; width: 60%;">
                            </div>
                        </div>

                        <x-form.input.text iname="church_neighborhood" ilabel="Bairro" icolspan="6" required />
                        <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">
                            <div class="flex"><label for="church_city">Cidade</label>/<label for="church_zone">UF</label></div>
                            <div style="display: flex; width: 100%; border-radius: 5px; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box; overflow: hidden; position: relative;">
                                <input type="text" wire:model="church_city" id="church_city" name="church_city" placeholder="Cidade" style="border: none; width: 70%; border-right: solid #3d3d3d 1px">
                                <select wire:model='church_zone' id="church_zone" name="church_zone" style="border: none; width: 30%;">
                                    <option value="" hidden>Selecione a UF</option>
                                    @foreach ($zones as $zone)
                                    <option value="{{$zone->id}}" title="{{ $zone->name }}">{{$zone->initial}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </x-form.block>
                    {{-- FIM - BLOCO ENDEREÇO --}}


                <div style="display: flex; justify-content: flex-end; gap: 5px; padding: 20px">
                    <button wire:click.prevent='hiddenModalNewChurch' type="button" class="p-3 text-white rounded-md bg-slate-700 hover:bg-slate-800">{{ __('Cancel') }}</button>
                    <button type="submit" class="px-8 py-3 text-white rounded-md bg-sky-800">{{ __('Save') }}</button>
                </div>

            </div>
        </form>
    </x-modal>

    <x-modal wire:model='modalCreateStudent' maxWidth='7xl'>
        <div class="flex justify-between">
            <div class="px-4 py-2 font-bold">Cadastro de novos alunos</div>
            <button type="button" wire:click="hiddenModalCreateStudent" class="p-2 hover:bg-red-700 hover:text-red-100">Fechar &#x2716; </button>
        </div>
        <div style="padding: 20px; display: grid; gap: 20px;">
            <h3 class="font-bold">Dados da igreja:</h3>
            <button wire:click="showModalSelectChurch" type="button" class="grid grid-cols-2 p-4 text-left border rounded border-sky-500 text-sky-900 bg-sky-100 hover:bg-sky-200/60">
                @isset ($church_selected)
                <div class="text-sm font-semibold">{{ $church_selected->name }}</div>
                <div class="text-xs">{{ __('Pastor') }}: {{ $church_selected->pastor }}</div>
                <div class="text-xs col-span-full">{{ address($church_selected->street, $church_selected->number, $church_selected->complement, $church_selected->neighborhood, $church_selected->city, isset($church_selected->zone) ? $church_selected->zone->initial:null, $church_selected->zipcode) }}</div>
                @else
                <div>Selecione uma igreja</div>
                @endisset
            </button>

            <div style="display: grid; gap: 10px; grid-template-columns: 5fr 2fr;">
                <div style="display:  @isset($church_selected) block @else none @endisset">

                    <h3 class="mb-2 font-bold">Dados do participante:</h3>

                    <x-form wire:submit.prevent='create' class="grid gap-4">
                        @if($ver_email)
                        <div class="grid grid-cols-2 px-4 py-1 mb-1 text-sm font-semibold rounded bg-sky-700 text-sky-100">
                            <div>
                                <div class="text-left">{{ $user->name }}</div>
                                <div class="text-left">{{ date('d/m/Y',strtotime($user->birth)) }}</div>
                                <div class="text-left">{{ $user->email }}</div>
                                <div class="text-left">{{ telep($user->phone) }}</div>
                            </div>
                            <div>
                                @isset($user->church)
                                <div class="text-left">{{ $user->church->name }}</div>
                                <div class="text-left">{{ $user->church->pastor }}</div>
                                @endisset
                            </div>

                            <hr class="my-1 col-span-full">
                            @isset ($user->church)
                                @if ($user->church->id != $church_selected->id)
                                <button wire:click="select_student({{$user->id}}, {{0}})" class="py-1 my-1 mr-1 rounded bg-sky-100 text-sky-800">Mante na igreja de origem</button>
                                <button wire:click="select_student({{$user->id}}, {{1}})" class="py-1 my-1 ml-1 rounded bg-sky-100 text-sky-800">Atualizar igreja</button>
                                @else
                                <button wire:click="select_student({{$user->id}}, {{0}})" class="py-1 my-1 mr-1 rounded bg-sky-100 text-sky-800 col-span-full">Cadastrar participante</button>
                                @endif
                            @else
                            <button wire:click="select_student({{$user->id}}, {{1}})" class="py-1 my-1 mr-1 rounded bg-sky-100 text-sky-800 col-span-full">Cadastrar participante</button>
                            @endisset
                        </div>
                        @endif

                        @if (session()->has('message'))
                            <div class="p-2 text-green-200 bg-green-700 rounded ">
                                {{ session('message') }}
                            </div>
                        @endif

                        <x-form.block>
                            <x-form.input.email wire:change='verify_email' wire:keyup='verify_email' iname="email" ilabel="E-mail" :irequired="true" icolspan="12" />

                            <x-form.select iname="is_pastor" ilabel="É Pastor?" icolspan="6"  :disabled="$ver_email">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </x-form.select>
                            <x-form.input.text iname="name" ilabel="Nome completo" icolspan='6' :disabled="$ver_email" />
                            <x-form.input.tel iname="phone" ilabel="Telefone" icolspan="6"  :disabled="$ver_email" />
                            <x-form.select iname="gender" ilabel="Sexo" icolspan="6"  :disabled="$ver_email">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </x-form.select>
                            <x-form.input.date iname="birth" ilabel="Data de Nascimento" icolspan='6'  :disabled="$ver_email" />
                            <x-form.input.text iname="ministery" ilabel="Ministério que desenvolve na igreja" icolspan="6"  :disabled="$ver_email" />
                        </x-form.block>
                    </x-form>

                </div>

            </div>

        </div>
    </x-modal>

</div>
