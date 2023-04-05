<div>
    <div class="grid grid-cols-5 gap-1 mb-2 text-center">
        <div class="p-2 rounded text-slate-300 @if($step == 1 || $step == null)  bg-slate-700 @endif">Verificação</div>
        <div class="p-2 rounded text-slate-300 @if($step == 2)                   bg-slate-700 @endif">Perfil</div>
        <div class="p-2 rounded text-slate-300 @if($step == 3)                   bg-slate-700 @endif">Igreja</div>
        <div class="p-2 rounded text-slate-300 @if($step == 4)                   bg-slate-700 @endif">Resumo</div>
        <div class="p-2 rounded text-slate-300 @if($step == 5)                   bg-slate-700 @endif">Confirmação</div>
    </div>

    <form style="display: grid; gap: 10px; box-sizing: border-box; background-color: rgba(0, 0, 0,.05); border-radius: 10px; border: 2px solid #0088ae; padding: 10px; ">
            @csrf
        <div style="display: grid; gap: 20px; position: relative;">
        @switch($step)
                @case(1)
                    <x-form.block>
                        <div class="col-span-full">Digite seu email</div>
                        <button type="button" style="width: 400px;" class="px-4 py-2 rounded-r-3xl bg-slate-900 text-slate-400" wire:click='defineStep(2)'>Verificar cadastro</button>
                    </x-form.block>
                    @break

                @case(2)
                    <x-form.block>
                        <div class="col-span-full">Verifica se já está cadastrado no sistema.</div>
                        <button type="button" style="width: 400px;" class="px-4 py-2 rounded-r-3xl bg-slate-900 text-slate-400" wire:click='defineStep(3)'>Casdastro da Igreja</button>
                    </x-form.block>
                    @break

                @case(3)
                    <x-form.block>
                        <div class="col-span-full">Caso não esteja cadastrado no sistema deverá verificar a igreja</div>
                        <button type="button" style="width: 400px;" class="px-4 py-2 rounded-r-3xl bg-slate-900 text-slate-400" wire:click='defineStep(4)'>Resumo da inscrição</button>
                    </x-form.block>
                    @break
                @case(4)
                    <x-form.block>
                        <div class="col-span-full">Resumo da Inscrição</div>
                        <button type="button" style="width: 400px;" class="px-4 py-2 rounded-r-3xl bg-slate-900 text-slate-400" wire:click='defineStep(5)'>Confirmar inscrição</button>
                    </x-form.block>
                    @break

                @case(5)
                    <x-form.block>
                        <div class="col-span-full">Confirmação da Inscrição</div>
                    </x-form.block>
                    @break

                @default
                    <x-form.block>
                        <div class="col-span-full">Digite seu email</div>
                        <button type="button" style="width: 400px;" class="px-4 py-2 rounded-r-3xl bg-slate-900 text-slate-400" wire:click='defineStep(2)'>Verificar cadastro</button>
                    </x-form.block>
            @endswitch
        </div>
    </form>

</div>
