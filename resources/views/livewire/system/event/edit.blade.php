<div class="mb-16">
    <x-form wire:submit.prevent="update">
        <x-form.block>

            <x-form.input.number iname="price" ilabel="Valor destinado ao EE" icolspan="4"  min="0" max="100" step=".01" />
            <x-form.input.number iname="price_church" ilabel="Valor destinado a Igreja" icolspan="4" />
            <x-form.input.number iname="discount" ilabel="Desconto em cada inscrição" icolspan="4" />
            <x-form.select ilabel="Status do evento" iname="status" icolspan="4" required>
                <option value="0">Cancelado</option>    {{-- * 0. Cancelado  - rgb(255, 221, 221) cinza    --}}
                <option value="1">Planejando</option>   {{-- * 1. Planejando - rgb(244, 225, 140) amarelo  --}}
                <option value="2">Confirmado</option>   {{-- * 2. Confirmado - rgb(166, 249, 221) Verde    --}}
                <option value="3">Finalizado</option>    {{-- * 3. Executado  - rgb(255, 255, 255) branco   --}}
            </x-form.select>
            <x-form.input.number iname="kits" ilabel="Kits recebidos pelo EE" icolspan="4" />
            <x-form.input.url iname="url" ilabel="Link" icolspan="4" />

        </x-form.block>

        <x-form.block>

            <x-form.select ilabel="Curso" iname="course" icolspan="6" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </x-form.select>
            <x-form.select ilabel="Professor" iname="teacher" icolspan="6" required>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
                @if($teachers == []) <option value="" disabled>Primeiro selecione o curso</option> @endif
            </x-form.select>
            <x-form.select ilabel="Plano de Aula" iname="lesonplan" icolspan="6">
                @foreach ($lesonplans as $plan)
                <option value="{{ $plan->id }}" title="{{ $plan->name }} &rarr; {{ __($plan->day) }} @if($plan->schedule_default()->count()>0) {{ __(', a partir de: ') }} {{ date('H:i',strtotime($plan->schedule_default()->first()->start)) }}@endif">
                    {{ $plan->name }}
                    @if($plan->schedule_default()->count()>0)&rarr; {{ __($plan->day) }}{{ __(', a partir de: ') }} {{ date('H:i',strtotime($plan->schedule_default()->first()->start)) }}@endif
                </option>
                @endforeach
                @if($lesonplans == []) <option value="" disabled>Primeiro selecione o curso</option> @endif
            </x-form.select>

            <x-form.input.date wire:change='daysTraining' iname="date" ilabel="Data" icolspan="6" required />
            <x-form.input.tel iname="phone" ilabel="Telefone" icolspan="6" required />
            <x-form.input.email iname="email" ilabel="E-mail" icolspan="6" />
        </x-form.block>

        <x-form.block>
            @if ($church_selected == null)
            <x-form.button wire:click.prevent='showModalSelectChurch' iname="showModalSelectChurch" :ilabel="($event->church_id == null )?'Selecione a Igreja':$event->church->name" icolspan="12" />
            @else
            <x-form.button wire:click.prevent='showModalSelectChurch' iname="showModalSelectChurch" :ilabel="$church_selected->name" icolspan="12" />
            @endif
        </x-form.block>

        {{-- INÍCIO - BLOCO ENDEREÇO --}}
        <x-form.block>
            <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">
                <label for="zipcode">CEP</label>
                <div style="display: block; width: 100%; border-radius: 5px; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box; overflow: hidden; position: relative;">
                    <input type="text" wire:model="zipcode" id="zipcode" name="zipcode" placeholder="CEP" style="border: none; width: 100%; padding-right: 50px;">
                    <button type="button" wire:click="search_zipcode_event" title="Buscar pelo CEP" style="width: 50px; position: absolute; right: 0; background-color: #cecece; padding: 8px">&#128270;</button>
                </div>
            </div>

            <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">{{ session('message') }}</div>

            <x-form.input.text iname="street" ilabel="Logradouro" icolspan="6" required />
            <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">
                <div class="flex"><label for="number">Número</label>/<label for="complement">Complemento</label></div>
                <div style="display: flex; width: 100%; border-radius: 5px; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box; overflow: hidden; position: relative;">
                    <input type="text" wire:model="number" id="number" name="number" placeholder="Nº" style="border: none; width: 40%; border-right: solid #3d3d3d 1px">
                    <input type="text" wire:model="complement" id="complement" name="complement" placeholder="Complemento" style="border: none; width: 60%;">
                </div>
            </div>

            <x-form.input.text iname="neighborhood" ilabel="Bairro" icolspan="6" required />
            <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">
                <div class="flex"><label for="city">Cidade</label>/<label for="zone">UF</label></div>
                <div style="display: flex; width: 100%; border-radius: 5px; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box; overflow: hidden; position: relative;">
                    <input type="text" wire:model="city" id="city" name="city" placeholder="Cidade" style="border: none; width: 70%; border-right: solid #3d3d3d 1px">
                    <select wire:model='zone' id="zone" name="zone" style="border: none; width: 30%;">
                        <option value="" hidden>Selecione a UF</option>
                        @foreach ($zones as $zone)
                        <option value="{{$zone->id}}" title="{{ $zone->name }}">{{$zone->initial}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
        </x-form.block>
        {{-- FIM - BLOCO ENDEREÇO --}}

        <x-form.block>
            <x-form.textarea iname="comment" ilabel="Comentário" icolspan="12" />
        </x-form.block>
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

                    <h3>Líder de Evangelismo sobre a Igreja</h3>
                    <x-form.block>
                        <x-form.input.text iname="church_leader"       ilabel="{{ __('Leader') }}"            placeholder="{{ __('Leader') }}" icolspan="4" />
                        <x-form.input.text iname="church_leader_phone" ilabel="{{ __('Telefone do Líder') }}" placeholder="{{ __('Telefone do Líder') }}" icolspan="4" />
                        <x-form.input.text iname="church_leader_email" ilabel="{{ __('Email do Líder') }}"    placeholder="{{ __('Email do Líder') }}" icolspan="4" />
                    </x-form.block>


                    <x-form.block>
                        <x-form.textarea ilabel="{{ __('Algumas observações da igreja') }}" iname="church_comment" placeholder="{{ __('Comment') }}" icolspan="12" />
                    </x-form.block>
                </div>


                <div style="display: flex; justify-content: flex-end; gap: 5px; padding: 20px">
                    <button wire:click.prevent='hiddenModalNewChurch' type="button" class="p-3 text-white rounded-md bg-slate-700 hover:bg-slate-800">{{ __('Cancel') }}</button>
                    <button type="submit" class="px-8 py-3 text-white rounded-md bg-sky-800">{{ __('Save') }}</button>
                </div>

            </div>
        </form>
    </x-modal>

</div>
