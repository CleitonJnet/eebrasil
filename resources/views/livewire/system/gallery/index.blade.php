<div>

    @if(session('login-role') == 6)
        <div class="flex justify-between px-4 py-2 mb-2 font-bold text-white rounded bg-slate-700">
            <div style="font-family: 'Cinzel', serif;">{{ $event->course->name }}</div>
            <div>{{ $event->church->name }}</div>
        </div>

        @if ($multimedia->count()<=12)
            <x-form wire:submit.prevent='save' class="grid gap-4" enctype="multipart/form-data">

            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600" x-data>
                    @if ($photo != null)

                    @if ($this->photo->getClientOriginalExtension() == 'png' || $this->photo->getClientOriginalExtension() == 'jpg' || $this->photo->getClientOriginalExtension() == 'jpeg')
                        <img src="{{ asset($photo->temporaryUrl()) }}" class="absolute top-0 left-auto object-cover max-w-full max-h-full" alt="...">
                    @else
                        <div>Arquivo não suportado</div>
                    @endif

                    @else
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique aqui para enviar uma foto do evento.</span></p>
                        <p class="text-xs text-gray-500 dark:text-gray-200">PNG, JPG ou JPEG</p>
                    </div>

                    @endif
                    <div @click="$refs.input.click()" class="absolute top-0 left-0 z-20 flex items-center justify-center w-full h-full overflow-hidden font-bold text-center rounded-lg text-white hover:bg-black/60 hover:opacity-100 backdrop-blur-[1px] transition-all opacity-0">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 mb-3 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-200 dark:text-gray-200"><span class="font-semibold">Clique aqui para enviar uma foto do evento.</span></p>
                            <p class="text-xs text-gray-200 dark:text-gray-200">PNG, JPG ou JPEG</p>
                        </div>
                    </div>

                    <input id="dropzone-file" wire:model='photo' type="file" class="hidden" />

                </label>
            </div>

            @if ($photo != null)

            <x-form.input.text iname="getName" ilabel="Título da foto" autofocus />

            @endif



            <div class="w-full py-1">
                @error('photo') <div class="text-red-800 bg-red-50 error">{{ $message }}</div> @enderror
                @error('getName') <div class="text-red-800 bg-red-50 error">{{ $message }}</div> @enderror
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>

            </x-form>

        @else
            <div>Maximo de fotos alcançado</div>
        @endif
    @endif

    <div class="grid grid-cols-8 gap-1 mt-10">
        @foreach ($multimedia as $attachment)
        <button type="button" class="overflow-hidden border-4 border-white rounded-md shadow-md bg-white/20 hover:bg-white">
            <div class="relative h-40 bg-center bg-cover backdrop-blur-sm bg-white/30" style="background-image: url({{ asset('storage/'.$attachment->path_thumbnail) }});">
                <div class=""></div>
                <div class="absolute bottom-0 left-0 w-full px-1 pt-1 truncate bg-white">{{ $attachment->name }}</div>
            </div>
        </button>
        @endforeach
    </div>
</div>
