<div style="display: grid; gap: 5px; grid-column: span {{ $icolspan }} / span {{ $icolspan }};">
    <label for="{{ $iname }}">{{ $ilabel }}</label>
    <textarea wire:model='{{ $iname }}' id="{{ $iname }}" name="{{ $iname }}" rows="10" {{ $attributes }}
    @if($disabled) disabled @endif @if($irequired) required @endif
    style="
        display: block;
        width: 100%;
        padding: 8px 10px;
        border-radius: 5px;
        border: none;
        box-shadow: 0 0 2px 1px rgba(0,0,0,.5);
        box-sizing: border-box;
    ">{{ $ivalue }}</textarea>
</div>
