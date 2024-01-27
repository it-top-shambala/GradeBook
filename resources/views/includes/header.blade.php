<header class="border-bottom border-primary border-2 row justify-content-center ">
    <nav class="d-flex justify-content-between navbar navbar-expand-lg bg-body-tertiary col-9 bg-success-subtle">
        <x-ul>
            <x-lia :path="__('home')" :value="__('Главная')"/>
            <x-lia x-a :path="__('about')" :value="__('О нас')"/>
        </x-ul>
        @if (session('user'))
            <x-ul>
                <x-lia :path="__('order')" :value="__('мои заказы')"/>
                <x-lia x-a :path="__('search_orders')" :value="__('поиск заказов')"/>
            </x-ul>
        @else
            <x-ul>
                <x-lia :path="__('login')" :value="__('Войти')"/>
                <x-lia :path="__('registration')" :value="__('Регистрация')"/>
            </x-ul>
        @endif

    </nav>
</header>
