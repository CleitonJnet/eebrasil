<div style="display: grid; gap: 5px; grid-column: span {{ $icolspan }} / span {{ $icolspan }};">
    <label for="{{ $iname }}">{{ $ilabel }}</label>
    <select wire:model='{{ $iname }}' id="{{ $iname }}" name="{{ $iname }}" {{ $attributes }}
    @if($disabled) disabled @endif @if($irequired) required @endif
    style="
        display: block;
        /* width: calc( 100% + 20px); */
        width: 100%;
        padding: 8px 10px;
        border-radius: 5px;
        border: none;
        box-shadow: 0 0 2px 1px rgba(0,0,0,.5)
        ">
        <option value="" hidden>Selecione...</option>
        {{ $slot }}
    </select>
</div>
