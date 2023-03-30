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
