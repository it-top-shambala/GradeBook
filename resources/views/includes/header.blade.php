<header class="border-bottom border-primary border-2 row justify-content-center ">
    <nav class="d-flex justify-content-between navbar navbar-expand-lg bg-body-tertiary col-9 bg-success-subtle">
        <div class="">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="/" class="nav-link {{activlink('home')}}">{{__('Главная')}}</a>
                </li>
                <li class="nav-item">
                    <a href="/about" class="nav-link {{activlink('about')}}">{{__('о нас')}}</a>
                </li>
            </ul>
        </div>
        @if (session('user'))
        <div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="/order" class="nav-link {{activlink('order')}}">{{__('мои заказы')}}</a>
                </li>
                <li class="nav-item">
                    <a href="/registration" class="nav-link {{activlink('registration')}}">{{__('поиск заказов')}}</a>
                </li>
            </ul>
        </div>
        @else
            <div class="">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{activlink('login')}}">{{__('Войти')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="/registration" class="nav-link {{activlink('registration')}}">{{__('Регистрация')}}</a>
                    </li>
                </ul>
            </div>
        @endif

    </nav>
</header>
