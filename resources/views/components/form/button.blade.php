<div style="display: grid; gap: 5px; grid-column: span {{ $icolspan }} / span {{ $icolspan }};">

    <label for="{{ $iname }}">{{ $ilabel }}</label>
    <button type="button" Wwire:click='{{ $iname }}' id="{{ $iname }}" {{ $attributes }} style="
        display: block;
        width: 100%;
        padding: 2px 10px;
        border-radius: 5px;
        border: none;
        box-shadow: 0 0 2px 1px rgba(0,0,0,.5);
        box-sizing: border-box;
        background-color: #fff;
        height: 35px;
        cursor: pointer;
        ">{{ $ilabel }}</button>
</div>
