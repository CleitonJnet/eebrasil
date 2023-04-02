<div>
    <div class="grid grid-cols-11 gap-4">
        <div class="col-span-2">
            @if (session('login-role') == 6)
            <div class="grid gap-4 mb-4">
                <button type="button" wire:click="showModalCreateStudent" class="flex items-center justify-start h-10 px-2 rounded-sm bg-sky-600 text-sky-50" href="{{ route('system.student.create',$event->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" fill="currentColor" viewBox="0 0 32 32"><path d="M16 21.916c-4.797.02-8.806 3.369-9.837 7.856l-.013.068a.75.75 0 0 0 1.464.325l.001-.005c.875-3.885 4.297-6.744 8.386-6.744s7.511 2.859 8.375 6.687l.011.057a.75.75 0 0 0 .732.59h.001a.745.745 0 0 0 .165-.019l-.005.001a.751.751 0 0 0 .572-.898l.001.005c-1.045-4.554-5.055-7.903-9.849-7.924h-.002zM9.164 10.602a4.676 4.676 0 1 0-4.676-4.676 4.682 4.682 0 0 0 4.675 4.676zm0-7.852a3.176 3.176 0 1 1-3.176 3.176A3.18 3.18 0 0 1 9.163 2.75zm13.762 7.852a4.676 4.676 0 1 0-4.676-4.676 4.682 4.682 0 0 0 4.675 4.676zm0-7.852a3.176 3.176 0 1 1-3.176 3.176 3.18 3.18 0 0 1 3.176-3.176zm7.896 17.09c-.878-3.894-4.308-6.759-8.406-6.759-.423 0-.839.031-1.246.089l.046-.006a.717.717 0 0 0-.133.047l.004-.002c-.751-2.129-2.745-3.627-5.089-3.627a5.387 5.387 0 0 0-5.068 3.561l-.012.038c-.017-.004-.03-.014-.047-.017a8.35 8.35 0 0 0-1.195-.084h-.007a8.653 8.653 0 0 0-8.392 6.701l-.011.058a.75.75 0 0 0 1.464.325l.001-.005c.737-3.207 3.56-5.565 6.937-5.579h.002c.335 0 .664.024.985.07l-.037-.004c-.008.119-.036.232-.036.354a5.417 5.417 0 0 0 10.833 0v-.001c0-.12-.028-.233-.036-.352.016-.002.031.005.047.001.294-.044.634-.068.98-.068h.011-.001a7.14 7.14 0 0 1 6.93 5.531l.009.048a.745.745 0 0 0 .897.571l-.005.001a.751.751 0 0 0 .572-.898l.001.005zM16 18.916h-.001a3.917 3.917 0 1 1 3.917-3.917V15A3.92 3.92 0 0 1 16 18.916z"/></svg>
                    <span class="ml-2">Cadastrar Aluno</span>
                </button>
            </div>
            @endif
            <div>
                <div class="flex justify-between p-1 text-sm rounded bg-slate-200">
                    <div class="font-semibold">Alunos inscritos:</div>
                    <div>{{ $tot_students }}</div>
                </div>
                <div class="flex justify-between p-1 text-sm rounded">
                    <div class="font-semibold">Alunos pagantes:</div>
                    <div>{{ $tot_payment }}</div>
                </div>
                <div class="flex justify-between p-1 text-sm rounded bg-slate-200">
                    <div class="font-semibold">Alunos receberam kits:</div>
                    <div>{{ $tot_kit }}</div>
                </div>
                <div class="flex justify-between p-1 text-sm rounded">
                    <div class="font-semibold">Alunos finalizaram o curso:</div>
                    <div>{{ $tot_accredited }}</div>
                </div>
            </div>

        </div>

        <div class="col-span-9">
            <div class="flex justify-between px-4 py-2 font-bold text-white rounded bg-slate-700">
                <div style="font-family: 'Cinzel', serif;">{{ $event->course->name }}</div>
                <div>{{ $event->church->name }}</div>
            </div>

            <div style="border: solid 1px rgb(3, 105, 161); border-radius: 5px; overflow: hidden; margin: 20px 0 60px;">
                <div class="grid grid-cols-7 p-2 bg-slate-200">
                    <div class="flex items-center justify-start col-span-4">Aluno</div>
                    <div class="flex items-center justify-center col-span-1 leading-5 text-center truncate" title="Treinamento completo">Pagamento</div>
                    <div class="flex items-center justify-center col-span-1 leading-5 text-center truncate" title="Recebeu material">Recebeu <br> material</div>
                    <div class="flex items-center justify-center col-span-1 leading-5 text-center truncate" title="Treinamento completo">Treinamento <br> completo</div>
                </div>

                @foreach ($per_church as $_church)
                <div class="p-2 font-semibold text-white bg-sky-700">{{ $loop->iteration < 10 ? '0'.$loop->iteration : $loop->iteration }} - {{$_church->churches_name}}</div>
                    @foreach ($event->students()->where('church_id',$_church->church_id)->orderBy('name')->get() as $student)
                    <div class="grid grid-cols-7 gap-2 p-2 @if($student->pivot->payment==1 && $student->pivot->accredited==1 && $student->pivot->kit==1) odd:bg-sky-900/40 even:bg-sky-700/40 @else odd:bg-slate-200 even:bg-slate-100 @endif">
                        <div class="flex items-center justify-start col-span-4">{{ $loop->iteration < 10 ? '0'.$loop->iteration : $loop->iteration }} - <span class="mx-2">@if($student->pivot->payment==1 || $student->pivot->accredited==1 || $student->pivot->kit==1 ) &#10022; @else &#10023; @endif</span> <div class="truncate" title="{{ $student->name }}">{{ $student->name }}</div></div>
                        <div class="flex items-center justify-center col-span-1">
                            @if (session('login-role') == 6)
                                <label class="relative inline-flex items-center cursor-pointer focus:border-none focus:outline-none" style="height: 25px; width: 45px">
                                    <input wire:click="togglePayment({{ $student->id }}, {{ $event->id }}, {{ $student->pivot->payment }})" type="checkbox" value="0" class="sr-only peer" @if($student->pivot->payment==1) checked @endif>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-sky-900 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-sky-700"></div>
                                </label>
                            @else
                                @if($student->pivot->payment==1)
                                <div>Pago</div>
                                @else
                                <div>Pendente</div>
                                @endif
                            @endif
                        </div>
                        <div class="flex items-center justify-center col-span-1">
                            @if (session('login-role') == 6)
                                <label class="relative inline-flex items-center cursor-pointer focus:border-none focus:outline-none" style="height: 25px; width: 45px">
                                    <input wire:click="toggleReceivedKit({{ $student->id }}, {{ $event->id }}, {{ $student->pivot->kit }})" type="checkbox" value="0" class="sr-only peer" @if($student->pivot->kit==1) checked @endif>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-sky-900 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-sky-700"></div>
                                </label>
                            @else
                                @if($student->pivot->payment==1)
                                <div>entregue</div>
                                @else
                                <div>Pendente</div>
                                @endif
                            @endif
                        </div>
                        <div class="flex items-center justify-center col-span-1">
                            @if (session('login-role') == 6)
                                <label class="relative inline-flex items-center cursor-pointer focus:border-none focus:outline-none" style="height: 25px; width: 45px">
                                    <input wire:click="toggleAccreditation({{ $student->id }}, {{ $event->id }}, {{ $student->pivot->accredited }})" type="checkbox" value="0" class="sr-only peer" @if($student->pivot->accredited==1) checked @endif>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-sky-900 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-sky-700"></div>
                                </label>
                            @else
                                @if($student->pivot->payment==1)
                                <div>Completo</div>
                                @else
                                <div>Incompleto</div>
                                @endif
                            @endif
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>

        </div>
    </div>

    <x-modal wire:model='modalCreateStudent' maxWidth='7xl'>
        <div class="flex justify-between">
            <div class="px-4 py-2 font-bold">Cadastro de novos alunos</div>
            <button type="button" wire:click="hiddenModalCreateStudent" class="p-2 hover:bg-red-700 hover:text-red-100">Fechar &#x2716; </button>
        </div>
        <div style="padding: 20px; display: grid; gap: 20px;">
            <h3 class="font-bold">Dados da igreja:</h3>
            <button wire:click="showModalSelectChurch" type="button" class="grid grid-cols-2 p-4 text-left border rounded border-sky-500 text-sky-900 bg-sky-100 hover:bg-sky-200/60">
                @isset ($church_selected)
                <div class="text-sm font-semibold">{{ $church_selected->name }}</div>
                <div class="text-xs">{{ __('Pastor') }}: {{ $church_selected->pastor }}</div>
                <div class="text-xs col-span-full">{{ address($church_selected->street, $church_selected->number, $church_selected->complement, $church_selected->neighborhood, $church_selected->city, isset($church_selected->zone) ? $church_selected->zone->initial:null, $church_selected->zipcode) }}</div>
                @else
                <div>Selecione uma igreja</div>
                @endisset
            </button>

            <div style="display: grid; gap: 10px; grid-template-columns: 5fr 2fr;">
                <div style="display:  @isset($church_selected) block @else none @endisset">

                    <h3 class="mb-2 font-bold">Dados do participante:</h3>

                    <x-form wire:submit.prevent='create' class="grid gap-4">
                        @if($ver_email)
                        <div class="grid grid-cols-2 px-4 py-1 mb-1 text-sm font-semibold rounded bg-sky-700 text-sky-100">
                            <div>
                                <div class="text-left">{{ $user->name }}</div>
                                <div class="text-left">{{ date('d/m/Y',strtotime($user->birth)) }}</div>
                                <div class="text-left">{{ $user->email }}</div>
                                <div class="text-left">{{ telep($user->phone) }}</div>
                            </div>
                            <div>
                                @isset($user->church)
                                <div class="text-left">{{ $user->church->name }}</div>
                                <div class="text-left">{{ $user->church->pastor }}</div>
                                @endisset
                            </div>

                            <hr class="my-1 col-span-full">
                            @isset ($user->church)
                                @if ($user->church->id != $church_selected->id)
                                <button wire:click="select_student({{$user->id}}, {{0}})" class="py-1 my-1 mr-1 rounded bg-sky-100 text-sky-800">Mante na igreja de origem</button>
                                <button wire:click="select_student({{$user->id}}, {{1}})" class="py-1 my-1 ml-1 rounded bg-sky-100 text-sky-800">Atualizar igreja</button>
                                @else
                                <button wire:click="select_student({{$user->id}}, {{0}})" class="py-1 my-1 mr-1 rounded bg-sky-100 text-sky-800 col-span-full">Cadastrar participante</button>
                                @endif
                            @else
                            <button wire:click="select_student({{$user->id}}, {{1}})" class="py-1 my-1 mr-1 rounded bg-sky-100 text-sky-800 col-span-full">Cadastrar participante</button>
                            @endisset
                        </div>
                        @endif

                        @if (session()->has('message'))
                            <div class="p-2 text-green-200 bg-green-700 rounded ">
                                {{ session('message') }}
                            </div>
                        @endif

                        <x-form.block>
                            <x-form.input.email wire:change='verify_email' wire:keyup='verify_email' iname="email" ilabel="E-mail" :irequired="true" icolspan="12" />

                            <x-form.select iname="is_pastor" ilabel="É Pastor?" icolspan="6"  :disabled="$ver_email">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </x-form.select>
                            <x-form.input.text iname="name" ilabel="Nome completo" icolspan='6' :disabled="$ver_email" />
                            <x-form.input.tel iname="phone" ilabel="Telefone" icolspan="6"  :disabled="$ver_email" />
                            <x-form.select iname="gender" ilabel="Sexo" icolspan="6"  :disabled="$ver_email">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </x-form.select>
                            <x-form.input.date iname="birth" ilabel="Data de Nascimento" icolspan='6'  :disabled="$ver_email" />
                            <x-form.input.text iname="ministery" ilabel="Ministério que desenvolve na igreja" icolspan="6"  :disabled="$ver_email" />
                        </x-form.block>
                    </x-form>

                </div>
                <div>

                    <div class="font-bold">Membros desta igreja: ({{ $tot_members_per_church }})</div>

                    @foreach ($members_per_church as $member)
                    <button wire:click="select_student({{$member->id}}, {{ 0 }})" class="block leading-7 text-sky-800">
                        @if($this->event->students()->where('user_id',$member->id)->count()==0) &#10023; @else &#10022; @endif {{ $member->name }}
                    </button>
                    @endforeach

                    <div>{{ $members_per_church ? $members_per_church->links() : null }}</div>
                </div>

            </div>

        </div>
    </x-modal>

    <x-modal wire:model='modalSelectChurch' maxWidth='5xl'>
        <div title="{{ __('Church responsible for the event') }}:" style="padding: 20px; display: grid; gap: 20px;">
            <div style="display: grid; gap: 10px">

                <form wire:submit="search">
                    <x-form.input.text wire:model='search_church' wire:click='resetPagination' ilabel="{{ __('Search church') }}" placeholder="{{ __('Search church') }}" iname="search_church" />
                </form>

                <div class="grid gap-1">
                    @foreach ($churches as $church)
                    <button type="button" wire:click.prevent='selectChurch({{ $church->id }})' class="grid grid-cols-2 p-4 text-left border rounded border-sky-500 text-sky-900 bg-sky-100 hover:bg-sky-200/60">
                        <div>
                            <div class="text-sm font-semibold">{{ $church->name }}</div>
                            <div class="text-xs">{{ __('Pastor') }}: {{ $church->pastor ?? '-' }}</div>
                        </div>
                        <div>
                            <div class="text-sm">{{ $church->neighborhood ?? '-' }}</div>
                            <div class="text-xs">{{ $church->city ?? '-' }} - {{ $church->zone_id != null ? $church->zone->initial : '' }}</div>
                        </div>
                    </button>
                    @endforeach

                    <div>{{ $churches->links() }}</div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-1 col-span-full">
                <button wire:click.prevent='hiddenModalSelectChurch' type="button" class="p-4 text-white rounded-md bg-slate-700 hover:bg-slate-800">{{ __('Close') }}</button>
                <button wire:click.prevent='showModalNewChurch' type="button" class="p-4 text-white rounded-md bg-slate-700 hover:bg-slate-800">{{ __('Church not found above') }}/ {{ __('New church') }}</button>
            </div>
        </div>
    </x-modal>

    <x-modal wire:model='modalNewChurch' maxWidth='6xl' :id="session('login-role')">
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
    </x-modal>
</div>
