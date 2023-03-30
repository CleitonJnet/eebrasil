<x-form.block>
    <div style="display: grid; gap: 5px; grid-column: span 5 / span 5;">
        <label for="zipcode"></label>
        <input value="{{ $address['zipcode'] }}" type="text" id="zipcode" name="zipcode" placeholder="CEP" style="display: block; width: 100%; padding: 8px 10px; border-radius: 5px; border: none; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box;">
    </div>
    <div style="display: grid; gap: 5px; grid-column: span 1 / span 1;">
        <label for="btn_search_zipcode"></label>
        <button wire:click="search_zipcode" type="button" style="border: none; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box;border-radius: 5px; font-size: 15pt; padding: 5px;" title="Buscar pelo CEP">&#128270;</button>
    </div>

    <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">{{ session('message') }}</div>

    <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">
        <label for="street"></label>
        <input value="{{ $address['street'] }}" type="text" id="street" name="street" placeholder="Logradouro" style="display: block; width: 100%; padding: 8px 10px; border-radius: 5px; border: none; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box;">
    </div>
    <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">
        <label for="number"></label>
        <input value="{{ $address['number'] }}" type="text" id="number" name="number" placeholder="Nº" style="display: block; width: 100%; padding: 8px 10px; border-radius: 5px; border: none; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box;">
    </div>
    <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">
        <label for="complement"></label>
        <input value="{{ $address['complement'] }}" type="text" id="complement" name="complement" placeholder="Complemento" style="display: block; width: 100%; padding: 8px 10px; border-radius: 5px; border: none; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box;">
    </div>
    <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">
        <label for="neighborhood"></label>
        <input value="{{ $address['neighborhood'] }}" type="text" id="neighborhood" name="neighborhood" placeholder="Bairro" style="display: block; width: 100%; padding: 8px 10px; border-radius: 5px; border: none; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box;">
    </div>
    <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">
        <label for="city"></label>
        <input value="{{ $address['city'] }}" type="text" id="city" name="city" placeholder="Cidade" style="display: block; width: 100%; padding: 8px 10px; border-radius: 5px; border: none; box-shadow: 0 0 2px 1px rgba(0,0,0,.5); box-sizing: border-box;">
    </div>
    <div style="display: grid; gap: 5px; grid-column: span 6 / span 6;">
        <label for="zone"></label>
        <select value="{{ $address['zone'] }}" id="zone" name="zone" style="display: block; width: 100%; padding: 8px 10px; border-radius: 5px; border: none; box-shadow: 0 0 2px 1px rgba(0,0,0,.5) ">
            <option value="" hidden>Selecione...</option>
            @foreach ($zones as $zone)
            <option value="{{ $zone->id }}">{{ $zone->initial }}</option>
            @endforeach
        </select>
    </div>
</x-form.block>
