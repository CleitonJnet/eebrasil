<div>
    <x-form wire:submit.prevent="create">
        {{-- <div class="absolute top-0 left-0 w-full p-4 text-center text-white rounded bg-sky-700">Teste</div> --}}

        <h2>{{ $event->course->name }}</h2>

        <x-form.block>
            @if ($btn_select_church == null)
            <x-form.button wire:click.prevent='showModalSelectChurch' iname="showModalSelectChurch" ilabel="Selecione a Igreja" icolspan="6" />
            @else
            <x-form.button wire:click.prevent='showModalSelectChurch' iname="showModalSelectChurch" :ilabel="$btn_select_church->name" icolspan="6" />
            @endif
            <x-form.select ilabel="Tipo de abordagem" iname="type" icolspan="6">
                <option value="1">Estilo de vida</option>
                <option value="2">indicação</option>
                <option value="3">Visitante da igreja</option>
                <option value="4">Estilo de vida</option>
            </x-form.select>
            <x-form.input.text iname="indicated" ilabel="Indicado por" icolspan="6" />
            <x-form.input.date iname="date" ilabel="Data para visita" icolspan="3" />
            <x-form.input.time iname="time" ilabel="Hora para visita" icolspan="3" />
        </x-form.block>

        <x-form.block>
            <x-form.input.text iname="prospect" ilabel="Nome do anfitrião" icolspan="6" />
            <x-form.input.text iname="phone" ilabel="Telefone" icolspan="6" />
            <x-form.input.text iname="email" ilabel="E-mail" icolspan="6" />
            <x-form.select ilabel="Sexo" iname="gender" icolspan="6">
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </x-form.select>
        </x-form.block>

        <x-form.block>
            <x-form.input.text iname="zipcode" ilabel="CEP" icolspan="3" />
            <x-form.input.text iname="street" ilabel="Logradouro" icolspan="7" />
            <x-form.input.text iname="number" ilabel="Número" icolspan="2" />
            <x-form.input.text iname="complement" ilabel="Complemento" icolspan="3" />
            <x-form.input.text iname="neighborhood" ilabel="Bairro" icolspan="3" />
            <x-form.input.text iname="city" ilabel="Cidade" icolspan="3" />
            <x-form.select ilabel="UF" iname="zone_id" icolspan="3">
                @foreach ($zones as $zone)
                <option value="{{$zone->id}}">{{$zone->initial}}</option>
                @endforeach
            </x-form.select>

        </x-form.block>
        <x-form.block>
            <x-form.textarea iname="comment" ilabel="Comente um pouco sobre quem poderá estar presente nesta visita" icolspan="12" />
        </x-form.block>

        @if (session()->has('message'))
        <div class="py-1 text-center text-green-100 bg-green-700">
            {{ session('message') }}
        </div>
    @endif

    </x-form>

    <x-modal wire:model='modalSelectChurch' maxWidth='5xl'>
        <div title="{{ __('Church responsible for the event') }}:" style="padding: 20px; display: grid; gap: 20px;">
            <div style="display: grid; gap: 10px">

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
            <div class="grid grid-cols-2 gap-1 col-span-full">
                <button wire:click.prevent='hiddenModalSelectChurch' type="button" class="p-4 text-white rounded-md bg-slate-700 hover:bg-slate-800">{{ __('Close') }}</button>
                <button wire:click.prevent='showModalNewChurch' type="button" class="p-4 text-white rounded-md bg-slate-700 hover:bg-slate-800">{{ __('Church not found above') }}/ {{ __('New church') }}</button>
            </div>
        </div>
    </x-modal>

</div>
