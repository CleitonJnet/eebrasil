<form {{$attributes}} style="
        display: grid;
        gap: 10px;
        box-sizing: border-box;
        background-color: rgba(0, 0, 0,.05);
        border-radius: 10px;
        border: 2px solid #0088ae;
        padding: 10px;
        ">
        @csrf
    <div style="display: grid; gap: 20px; position: relative;">{{ $slot }}</div>
    <div style="display: flex; justify-content: flex-end"><button style="background-color: #004356; padding: 7px 20px; border-radius: 5px; color: #fff" type="submit">{{$label_submit}}</button></div>
</form>
