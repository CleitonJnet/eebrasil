<x-pages>
    <x-slot name="title_page">Ministérios</x-slot>
    <x-slot name="breadcrumb">
        <span>Ministérios</span>
    </x-slot>

    <div class="page-ministeries">
        <div style="display: flex; align-items: center; height: 100%;">
            <p>Durante anos, Evangelismo Explosivo tem impactado vidas em todo o mundo, capacitando os crentes a compartilharem sua fé. Milhões já foram treinados e, por sua vez, treinaram milhares de outros irmãos. Além disso, anualmente, um número incontável de pessoas se comprometem com Cristo através de Evangelismo Explosivo e centenas de igrejas experimentam um crescimento significativo.</p>
        </div>
        <div style="overflow: hidden">
            <img src="{{ asset('img/training-africa.jpg') }}" style="border-radius: 20px; max-height: 100% ;max-width: 100%; object-fit: cover;" alt="...">
            <div style="position: absolute; bottom: 0; left: 0; background-color: white; border-radius: 0 10px 0 20px; padding: 5px 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Evangelismo Explosivo na África</div>
        </div>
        <div>
            <img src="{{ asset('img/training-asia.jpg') }}" style="border-radius: 20px; max-height: 100% ;max-width: 100%; object-fit: cover;" alt="...">
            <div style="position: absolute; bottom: 0; left: 0; background-color: white; border-radius: 0 10px 0 20px; padding: 5px 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Evangelismo Explosivo na Ásia</div>
        </div>
        <div style="display: flex; align-items: center; height: 100%;">
            <p>Oferecemos treinamentos de evangelismo e discipulado para todas as gerações, tornando mais fácil para os servos de Cristo compartilharem as boas novas de salvação com amor e confiança. Assim, estamos ajudando as pessoas a levarem seus conhecidos a uma relação de intimidade com Jesus. Convidamos você a conferir nossos ministérios de treinamentos e se juntar a nós!</p>
        </div>
    </div>
    <div style="margin-top: 80px"><img src="{{ asset('img/training-photo1.jpg') }}" alt="..." style="border-radius: 20px; max-height: 280px; max-width: 100%; min-width: 100%; object-fit: cover;"></div>

    <div class="page-eed">

        <div class="parts">
            <a class="part grid-btn-left" href="{{ route('kidsee') }}">
                <div class="banner-book">
                    <img src="{{ asset('img/eekids.png') }}" alt="logo" class="book" />
                </div>
                <div class="more">
                    <div>Ministério Infantil:</div>
                    <div>EE-Kids</div>
                </div>
            </a>
            <a class="part grid-btn-right" href="{{ route('eed') }}">
                <div class="more">
                    <div>Ministério para Jovens e Adultos:</div>
                    <div>Escola de Evangelismo e Discipulado</div>
                </div>
                <div class="banner-book">
                    <img src="{{ asset('img/books.png') }}" alt="logo" class="book" />
                </div>
            </a>
        </div>

    </div>
</x-pages>
