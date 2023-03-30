<div>
    <style>
        ::-webkit-scrollbar{ width: 4px; height: 5px; }
        ::-webkit-scrollbar-button{ width: 0px; height: 0px; }
        ::-webkit-scrollbar-thumb{ background: rgba(68, 80, 99, 0.5); border: 0px none beige; border-radius: 2px; }
        ::-webkit-scrollbar-thumb:hover {background: rgba(68, 80, 99, 0.5);}
        ::-webkit-scrollbar-thumb:active{background: rgba(68, 80, 99, 0.5);}
        ::-webkit-scrollbar-track{ background: white; border: 2px none rgba(68, 80, 99, 0.5); }
    </style>

    @if (session('login-role') == 6) <x-teacher.events :year="$year" /> @else <x-office.events :year="$year" /> @endif

</div>

