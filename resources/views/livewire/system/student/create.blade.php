<x-form wire:submit.prevent='create' class="grid gap-4">
    <x-form.block>
        <x-form.input.text iname="name" ilabel="Nome completo" icolspan='6' />
        <x-form.input.email iname="email" ilabel="E-mail" icolspan="6" />
        <x-form.input.date iname="birth" ilabel="Aniversário" icolspan='4' />
        <x-form.select iname="gender" ilabel="Sexo" icolspan="4">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </x-form.select>
        <x-form.input.tel iname="phone" ilabel="Telefone" icolspan="4" />
    </x-form.block>

    <x-form.block>
        <x-form.input.text iname="church" ilabel="Nome da Igreja" icolspan="4" />
        <x-form.input.text iname="ministery" ilabel="Ministério que desenvolve na igreja" icolspan="4" />
        <x-form.input.text iname="pastor" ilabel="Nome do pastor" icolspan="4" />
    </x-form.block>

    <x-form.block>
        <x-form.input.text iname="zipcode" ilabel="CEP" icolspan="4" />
        <x-form.input.text iname="street" ilabel="Logradouro" icolspan="8" required />
        <x-form.input.text iname="number" ilabel="Número" icolspan="4" required />
        <x-form.input.text iname="complement" ilabel="Complemento" icolspan="4" />
        <x-form.input.text iname="neighborhood" ilabel="Bairro" icolspan="4" required />
        <x-form.input.text iname="city" ilabel="Cidade" icolspan="4" required />
        <x-form.select ilabel="UF" iname="zone_id" icolspan="4" required>
            @foreach ($zones as $zone)
            <option value="{{$zone->id}}">{{$zone->initial}}</option>
            @endforeach
        </x-form.select>

    </x-form.block>
    <x-form.block>
        <x-form.textarea iname="comment" ilabel="Comentário" icolspan="12" />
    </x-form.block>

</x-form>
