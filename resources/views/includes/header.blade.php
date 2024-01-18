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
    </nav>
</header>
