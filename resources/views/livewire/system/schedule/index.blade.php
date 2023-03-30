<div class="grid @if (session('login-role') == 6) grid-cols-12 @else grid-cols-10 @endif gap-2">
    @if (session('login-role') == 6)
    <div class="col-span-2">
        <div class="grid gap-1 mb-4">
            <button type="button" wire:click='resetPlan' class="flex items-center justify-start h-10 px-2 rounded-sm bg-sky-600 text-sky-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" fill="currentColor" viewBox="0 0 32 32"><path d="M16 21.916c-4.797.02-8.806 3.369-9.837 7.856l-.013.068a.75.75 0 0 0 1.464.325l.001-.005c.875-3.885 4.297-6.744 8.386-6.744s7.511 2.859 8.375 6.687l.011.057a.75.75 0 0 0 .732.59h.001a.745.745 0 0 0 .165-.019l-.005.001a.751.751 0 0 0 .572-.898l.001.005c-1.045-4.554-5.055-7.903-9.849-7.924h-.002zM9.164 10.602a4.676 4.676 0 1 0-4.676-4.676 4.682 4.682 0 0 0 4.675 4.676zm0-7.852a3.176 3.176 0 1 1-3.176 3.176A3.18 3.18 0 0 1 9.163 2.75zm13.762 7.852a4.676 4.676 0 1 0-4.676-4.676 4.682 4.682 0 0 0 4.675 4.676zm0-7.852a3.176 3.176 0 1 1-3.176 3.176 3.18 3.18 0 0 1 3.176-3.176zm7.896 17.09c-.878-3.894-4.308-6.759-8.406-6.759-.423 0-.839.031-1.246.089l.046-.006a.717.717 0 0 0-.133.047l.004-.002c-.751-2.129-2.745-3.627-5.089-3.627a5.387 5.387 0 0 0-5.068 3.561l-.012.038c-.017-.004-.03-.014-.047-.017a8.35 8.35 0 0 0-1.195-.084h-.007a8.653 8.653 0 0 0-8.392 6.701l-.011.058a.75.75 0 0 0 1.464.325l.001-.005c.737-3.207 3.56-5.565 6.937-5.579h.002c.335 0 .664.024.985.07l-.037-.004c-.008.119-.036.232-.036.354a5.417 5.417 0 0 0 10.833 0v-.001c0-.12-.028-.233-.036-.352.016-.002.031.005.047.001.294-.044.634-.068.98-.068h.011-.001a7.14 7.14 0 0 1 6.93 5.531l.009.048a.745.745 0 0 0 .897.571l-.005.001a.751.751 0 0 0 .572-.898l.001.005zM16 18.916h-.001a3.917 3.917 0 1 1 3.917-3.917V15A3.92 3.92 0 0 1 16 18.916z"/></svg>
                <span class="ml-2">Redefinir Plano</span>
            </button>
            <button type="button" wire:click='deletePlan' class="flex items-center justify-start h-10 px-2 rounded-sm bg-sky-600 text-sky-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" fill="currentColor" viewBox="0 0 32 32"><path d="M16 21.916c-4.797.02-8.806 3.369-9.837 7.856l-.013.068a.75.75 0 0 0 1.464.325l.001-.005c.875-3.885 4.297-6.744 8.386-6.744s7.511 2.859 8.375 6.687l.011.057a.75.75 0 0 0 .732.59h.001a.745.745 0 0 0 .165-.019l-.005.001a.751.751 0 0 0 .572-.898l.001.005c-1.045-4.554-5.055-7.903-9.849-7.924h-.002zM9.164 10.602a4.676 4.676 0 1 0-4.676-4.676 4.682 4.682 0 0 0 4.675 4.676zm0-7.852a3.176 3.176 0 1 1-3.176 3.176A3.18 3.18 0 0 1 9.163 2.75zm13.762 7.852a4.676 4.676 0 1 0-4.676-4.676 4.682 4.682 0 0 0 4.675 4.676zm0-7.852a3.176 3.176 0 1 1-3.176 3.176 3.18 3.18 0 0 1 3.176-3.176zm7.896 17.09c-.878-3.894-4.308-6.759-8.406-6.759-.423 0-.839.031-1.246.089l.046-.006a.717.717 0 0 0-.133.047l.004-.002c-.751-2.129-2.745-3.627-5.089-3.627a5.387 5.387 0 0 0-5.068 3.561l-.012.038c-.017-.004-.03-.014-.047-.017a8.35 8.35 0 0 0-1.195-.084h-.007a8.653 8.653 0 0 0-8.392 6.701l-.011.058a.75.75 0 0 0 1.464.325l.001-.005c.737-3.207 3.56-5.565 6.937-5.579h.002c.335 0 .664.024.985.07l-.037-.004c-.008.119-.036.232-.036.354a5.417 5.417 0 0 0 10.833 0v-.001c0-.12-.028-.233-.036-.352.016-.002.031.005.047.001.294-.044.634-.068.98-.068h.011-.001a7.14 7.14 0 0 1 6.93 5.531l.009.048a.745.745 0 0 0 .897.571l-.005.001a.751.751 0 0 0 .572-.898l.001.005zM16 18.916h-.001a3.917 3.917 0 1 1 3.917-3.917V15A3.92 3.92 0 0 1 16 18.916z"/></svg>
                <span class="ml-2">Excluir Plano</span>
            </button>
        </div>
    </div>
    @endif

    <div class="col-span-10">
        <div class="flex justify-between px-4 py-2 font-bold text-white rounded-t bg-slate-700">
            <div style="font-family: 'Cinzel', serif;">{{ $event->course->name }}</div>
            <div>{{ $event->church->name }}</div>
        </div>
        <div class="relative rounded bg-white/50" style="max-height: calc(100vh - 330px); overflow: auto;">

            @foreach ($days as $day)
                <div class="sticky top-0 left-0 w-full py-2 font-bold text-center text-white bg-sky-500">{{ day_month($day->date) }}</div>
                @foreach ($event->schedules()->where('date',$day->date)->get() as $schedule)
                <div class="grid grid-cols-12 px-3 py-2 odd:bg-slate-100 even:bg-slate-200">
                    <div class="col-span-2 text-sm text-left font-bold">{{ date('H:i',strtotime($schedule->start)) }} - {{ date('H:i',strtotime($schedule->end)) }}</div>
                    <div class="col-span-9 text-sm text-left">{{ $schedule->unity->name }}</div>
                    <div class="col-span-1 text-sm text-right">{{ $times = workload($schedule->end, $schedule->start) }}</div>
                </div>
                @php $minutes[] = $times @endphp
                @endforeach
            @endforeach
        </div>
        Carga horária total: {{ workload_lot($minutes) }}
    </div>
</div>
