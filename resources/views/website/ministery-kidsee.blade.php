<x-pages>
    <x-slot name="title_page">EE-Kids</x-slot>
    <x-slot name="breadcrumb">
        <a href="{{ route('ministeries') }}">Ministérios</a>
        <span class="breadcrumb-separator">&#8250;</span>
        <span>EE-Kids</span>
    </x-slot>

    <div class="page-eekids" >
        <div class="column2">
            <img src="{{ asset('img/training-kids-call.jpg') }}" style="border-radius: 20px; max-height: 100% ;max-width: 100%; object-fit: cover;" alt="...">
        </div>
        <div class="column1">
            <div>
                <p>EE-Kids é um ministério de treinamento para crianças que visa ensiná-las a ganhar outras crianças para Cristo, fortalecendo sua fé e incentivando-as a compartilharem o Evangelho.</p>
                <p>Em diversas igrejas que desenvolvem este ministério em todo o mundo, as crianças saem com seus líderes de equipe, visitando famílias e compartilhando a mensagem de Jesus. Investir em treinar as crianças entre 8 e 12 anos através do EE-Kids é um investimento eterno.</p>
                <p>Acreditamos que a Grande Comissão de Jesus deve ser seguida por todos, não apenas por adultos ou até mesmo por jovens. O EE-Kids oferece uma base sólida para o crescimento espiritual das crianças e as inspira a responder com entusiasmo e empolgação ao chamado de Jesus para sermos suas testemunhas. Este programa desenvolve uma visão de mundo baseada no entendimento de que, sem fé em Jesus, estamos todos perdidos em nossos pecados.</p>
                <p>O EE-Kids é uma abordagem interativa e visual que ensina aos estudantes do quarto, quinto e sexto ano em diante a mensagem clara do Evangelho e os capacita a compartilhá-la com outros. A metodologia também é baseada no relacionamento, e numa classe ideal de EE-Kids, existe um adulto para cada 2 ou 3 crianças, que juntos aos professores aprendem a compartilhar o aprendizado de cada semana. O EE-Kids fornece ferramentas de ensino lúdico para tornar a aprendizagem da mensagem do Evangelho uma grande festa.</p>
            </div>
        </div>
    </div>


    <div class="container btns-to-session"><a href="{{ route('hopeforkids') }}">Esperança Para Crianças</a></div>

</x-pages>
