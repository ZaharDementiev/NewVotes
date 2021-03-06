<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <!-- viewport -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Route::current() && Route::current()->getName() == 'live')
        <title>Флирт - лента сексуальных предпочтений, желаний, фантазий, откровений и секретов</title>
        <meta name="description" content="На сайте FlirtVirt вы можете написать о своих сексуальных фантазиях и желаниях, обсудить откровенные истории, поделиться интимными секретами.">
        <meta name="keywords" content="сексуальные желания женщин, сексуальные фантазии девушек, интимные женские секреты">
    @elseif(Route::current() && Route::current()->getName() == 'virt')
        <title>Вирт - онлайн поиск девушек для виртуального секса</title>
        <meta name="description" content="На сайте FlirtVirt вы можете найти девушку по рейтингу для вирта. Интимные переписки, голосовые сообщения, видеозвонки, обмен фото и видео.">
        <meta name="keywords" content="вирт, вирт секс, вирт по ватсап, вирт по вайберу, вирт телеграмм, вирт скайп">
    @elseif(Route::current() && Route::current()->getName() == 'discussed')
        <title>Обсуждаемые публикации женщин на Lady Secrets</title>
        <meta name="description" content="Самые обсуждаемые женские темы на Lady Secrets.">
    @elseif(Route::current() && Route::current()->getName() == 'popular')
        <title>Популярные публикации женщин на Lady Secrets</title>
        <meta name="description" content="Самые просматриваемые и популярные публикации на Lady Secrets.">
    @elseif(Route::current() && Route::current()->getName() == 'tags')
        <title>Тематические категории публикаций на Lady Secrets</title>
        <meta name="description" content="Все темы обсуждений на сайте Lady Secrets.">
    @else
        {!! Artesaos\SEOTools\Facades\SEOTools::generate(true) !!}
    @endif
<!-- Scripts -->
    <script src="{{asset('js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/follow.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/load-more.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    {{--    <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/emojionearea.min.css')}}">
    <script src="{{ asset('js/emojionearea.min.js') }}"></script>
    {{--        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
    <link href="{{asset('css/site.css')}}" rel="stylesheet">
    {{--    <link rel="stylesheet" href="{{asset('css/all.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<!-- Yandex.Metrika counter -->
<!--<script type="text/javascript" defer>
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(55702444, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/55702444" style="position:absolute; left:-9999px;" alt="" /></div></noscript>!-->
{{--<!-- /Yandex.Metrika counter -->--}}
<div class="wrapper-load"
     style="width: 100%; height: 99999px; z-index: 9999999999; position: absolute; background-color: #ffffff;
     @if(Route::current() && Route::current()->getName() == 'show')
             display:block;
     @else
             display:none;
     @endif
             " ;>
    <div class="wrap-load"></div>
</div>
<div class="wrap-top_mobile_head">
    <div class="container">
        <div class="top_mobile_head">
            <div class="top_mobile_head-logo">
                <a href="/">
                    <img src="/img/logo.svg" alt="" class="logo_img">
                </a>
            </div>
            @auth
                <div class="top_mobile_head-publish">
                    <a href="{{route('add-post')}}">
                        <div class="top_mobile_head-publish-icon">
                            <img src="/img/publish_icon.svg" alt="">
                        </div>
                        <span>Опубликовать</span>
                    </a>
                </div>
            @endauth

            @guest
                <div class="top_mobile_head-publish-authorization">
                    <div class="wrap-authorization">
                        <div class="sign_in authorization-el unselectable signIn_open">
                            <div class="authorization-icon authorization-icon__sign_in"></div>
                            <span>Вход</span>
                        </div>
                        <div class="registration authorization-el unselectable registration_open">
                            <div class="authorization-icon authorization-icon__registration"></div>
                            <span>Регистрация</span>
                        </div>
                    </div>
                </div>
            @endguest

        </div>
    </div>
</div>

<div class="wrap-menu-window-mobile">
    <div class="container">
        <div class="menu-window-mobile-top">
            <search></search>

            @auth
                <div class="user">
                    <a href="{{route('profile', Auth::user()->name)}}" class="user_first_a">
                        <div class="user-img"
                             style="background-image: url(/storage/images/avatars/{{Auth::user()->avatar}});"></div>
                        <span>{{Auth::user()->name}}
                            <span>Перейти в профиль</span>
                        </span>
                    </a>
                    <a href="{{route('profile', Auth::user()->name)}}">
                        <div class="arr_link">
                            <img src="/img/arr_user.svg" alt="">
                        </div>
                    </a>
                </div>
            @endauth
        </div>
    </div>
    <div class="menu-window-mobile-maian">
        <div class="container">
            <ul class="menu-pages">
                <li class="{{(request()->is('*my/tags')) ? 'active' : ''}}">
                    <a href="{{route('my-tags')}}">
                        <div class="icon_li best"></div>
                        <span>Мои подписки</span>
                    </a>
                </li>
                <li class="{{ (request()->is('*favorites*')) ? 'active' : '' }}">
                    <a href="{{route('favorites')}}">
                        <div class="icon_li bookmark"></div>
                        <span>Закладки</span>
                    </a></li>
                <li class="
                                {{ ((request()->is('*tags*')) && !(request()->is('*my/tags*'))) ? 'active' : '' }}">
                    <a href="{{route('tags')}}">
                        <div class="icon_li topics"></div>
                        <span>Теги</span>
                    </a></li>
                @can('add-tag')
                    <li class="
                                    {{ (request()->is('*tag/edit*')) ? 'active' : '' }}">
                        <a href="{{ route('tag-edit') }}">
                            <div class="icon_li topics"></div>
                            <span>Теги (админ)</span>
                        </a>
                    </li>
                @endcan
                @can('add-tag')
                    <li class="
                                    {{ (request()->is('*registered*')) ? 'active' : '' }}">
                        <a href="{{ route('registered') }}">
                            <img src="/img/user.svg" alt="">
                            <span> Пользователи (админ)</span>
                        </a>
                    </li>
                @endcan
                @can('approve-post')
                    <li class="
                                    {{ (request()->is('*unapproved*')) ? 'active' : '' }}">
                        <a href="{{ route('unapproved') }}">
                            <div class="icon_li notification">
                                <unapproved-count></unapproved-count>
                            </div>
                            <span>Модерация</span>
                        </a>
                    </li>
                @endcan

                <li><a href="/settings">
                        <div class="icon_li settings"></div>
                        <span>Настройки</span>
                    </a></li>
                <li><a onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                       href="{{ route('logout') }}">
                        <div class="icon_li exit"></div>
                        Выйти
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <ul class="site-info">
            <li>
                <a href="#">Условия</a>
            </li>
            <li>
                <a href="#">Политика конфиденциальности</a>
            </li>
            <li>
                <a href="#">Файлы cookie</a>
            </li>
            <li>
                <a href="/pages/support.html">Служба поддержки</a>
            </li>
        </ul>
    </div>
</div>


@auth
    @if(auth()->user()->email_verified_at == null)
        <div class="confirm-email">
            <div class="close close-mail"></div>
            <p>Пожалуйста подтвердите свой E-mail</p>
        </div>
    @endif
@endauth
@if(session()->has('notify'))
    <div class="confirm-email">
        <div class="close close-mail"></div>
        <p>{{ session()->get('notify') }}</p>
    </div>
@endif
<div id="wrap-content">
    <div class="container" id="app">
        <div id="wrap-content-content">
            <div class="wrap-main-content">

                <div class="wrap-left-menu">
                    <div class="left-menu-content">
                        <a class="logo" href="/">
                            <img src="/img/logo.svg" alt="" class="logo_img">
                        </a>
                        <nav class="menu">
                            <ul class="menu-pages">

                                <li @if(Route::current()) class="{{ Route::current()->getName() == 'live' ? 'active' : '' }} mobShow live" @endif>
                                    <a href="{{ route('live') }}">
                                        <div class="icon_li main"></div>
                                        <span>Флирт</span>
                                    </a></li>
                                    <li class="{{ (request()->is('*virt*')) ? 'active' : '' }} mobShow tape">
                                        <a href="{{ route('virt') }}">
                                            <div class="icon_li tape">
                                                {{--                                                @auth--}}
                                                {{--                                                    <live-notifications :user="{{ Auth::user() }}"></live-notifications>--}}
                                                {{--                                                @endauth--}}
                                            </div>
                                            <span>Вирт</span>
                                        </a>
                                    </li>
                                {{--                            @auth--}}
                                {{--                                <li class="{{ (request()->is('*my*')) ? 'active' : '' }} mobShow tape">--}}
                                {{--                                    <a href="{{ route('my-tags') }}">--}}
                                {{--                                        <div class="icon_li tape">--}}
                                {{--                                            @auth--}}
                                {{--                                                <live-notifications :user="{{ Auth::user() }}"></live-notifications>--}}
                                {{--                                            @endauth--}}
                                {{--                                        </div>--}}
                                {{--                                        <span>Моя лента</span>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                                {{--                            @endauth--}}
                                {{--                            @guest--}}
                                {{--                                <li class="{{ (request()->is('*my*')) ? 'active' : '' }} mobShow tape">--}}
                                {{--                                    <a href="{{ route('my-tags') }}" onclick="preventDefault() " class="signIn_open">--}}
                                {{--                                        <div class="icon_li tape">--}}
                                {{--                                        </div>--}}
                                {{--                                        <span>Моя лента</span>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                                {{--                            @endguest--}}
                                {{--                            <li class="{{ (request()->is('*popular*')) ? 'active' : '' }}"><a href="{{route('popular')}}">--}}
                                {{--                                    <div class="icon_li best"></div>--}}
                                {{--                                    <span>Лучшее</span>--}}
                                {{--                                </a></li>--}}
                                {{--                            <li class="{{ (request()->is('*discussed*')) ? 'active' : '' }}">--}}
                                {{--                                <a href="{{route('discussed')}}">--}}
                                {{--                                    <div class="icon_li discuss"></div>--}}
                                {{--                                    <span>Обсуждаемое</span>--}}
                                {{--                                </a>--}}
                                {{--                            </li>--}}
                                @auth
                                    <li class="mobShow messages {{ (request()->is('*chat*')) || (request()->is('*dialogs*')) ? 'active' : '' }}">
                                        <a href="{{ route('dialogs') }}">
                                            <div class="icon_li messages">

                                                <messages-count :user="{{Auth::user()}}"></messages-count>

                                            </div>
                                            <span>Сообщения</span>
                                        </a></li>
                                @endauth
                                @guest
                                    <li class="mobShow messages
                                    {{ (request()->is('*chat*')) || (request()->is('*dialogs*')) ? 'active' : '' }}">
                                        <a href="{{ route('dialogs') }}" onclick="preventDefault()" class="signIn_open">
                                            <div class="icon_li messages">
                                            </div>
                                            <span>Сообщения</span>
                                        </a>
                                    </li>
                                @endguest
                                @auth
                                    <li class=" {{ (request()->is('*notifications*')) ? 'active' : '' }} mobShow notification">
                                        <a href="{{ route('notifications') }}">
                                            <div class="icon_li notification">
                                                <notifications-count :user="{{ Auth::user() }}"></notifications-count>
                                            </div>
                                            <span>Уведомления</span>
                                        </a></li>
                                @endauth
                                @guest
                                    <li class=" {{ (request()->is('*notifications*')) ? 'active' : '' }} mobShow notification">
                                        <a href="{{ route('notifications') }}"
                                           onclick="preventDefault()" class="signIn_open">
                                            <div class="icon_li notification">
                                            </div>
                                            <span>Уведомления</span>
                                        </a>
                                    </li>
                                @endguest
                                @auth
                                    {{--                                <li class="{{ (request()->is('*popular*')) ? 'active' : '' }}"><a href="{{route('popular')}}">--}}
                                    <li class="{{(request()->is('*my/tags')) ? 'active' : ''}}">
                                        <a href="{{route('my-tags')}}">
                                            <div class="icon_li best"></div>
                                            <span>Мои подписки</span>
                                        </a>
                                    </li>
                                @endauth
                                @auth
                                    <li class="{{ (request()->is('*favorites*')) ? 'active' : '' }}">
                                        <a href="{{ route('favorites') }}">
                                            <div class="icon_li bookmark"></div>
                                            <span>Закладки</span>
                                        </a>
                                    </li>
                                @endauth
                                @guest
                                    <li class="{{ (request()->is('*favorites*')) ? 'active' : '' }}">
                                        <a href="{{ route('favorites') }}" onclick="preventDefault()"
                                           class="signIn_open">
                                            <div class="icon_li bookmark"></div>
                                            <span>Закладки</span>
                                        </a>
                                    </li>
                                @endguest
                                <li class="
                                {{ ((request()->is('*tags*')) && !(request()->is('*my/tags*'))) ? 'active' : '' }}">
                                    <a href="{{ route('tags') }}">
                                        <div class="icon_li topics"></div>
                                        <span>Теги</span>
                                    </a>
                                </li>
                                @can('add-tag')
                                    <li class="
                                {{ (request()->is('*tag/edit*')) ? 'active' : '' }}">
                                        <a href="{{ route('tag-edit') }}">
                                            <div class="icon_li topics"></div>
                                            <span>Теги (админ)</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('add-tag')
                                    <li class="
                                    {{ (request()->is('*registered*')) ? 'active' : '' }}">
                                        <a href="{{ route('registered') }}">
                                            <div class="icon_li topics"></div>
                                            <span>Пользователи (админ)</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('approve-post')
                                    <li class="
                                    {{ (request()->is('*unapproved*')) ? 'active' : '' }}">
                                        <a href="{{ route('unapproved') }}">
                                            <div class="icon_li notification">
                                                <unapproved-count></unapproved-count>
                                            </div>
                                            <span>Модерация</span>
                                        </a>
                                    </li>
                                @endcan
                                <li class="mobMenu mobBurger">
                                    <a>
                                        <div class="icon_li mobBurger"></div>
                                        <span>Меню</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        @auth
                            <div class="link_post btn-green">
                                <a href="{{ route('add-post') }}">Опубликовать</a>
                            </div>
                        @endauth
                        @guest
                            <div class="link_post btn-green">
                                <a href="{{ route('add-post') }}" onclick="preventDefault()" class="signIn_open">Опубликовать</a>
                            </div>
                        @endguest
                        <ul class="site-info site-info_desctop">
                            <li>
                                <a href="#">О проекте</a>
                            </li>
                            <li>
                                <a href="#">Правила</a>
                            </li>
                            <li>
                                <a href="#">Помощь</a>
                            </li>
                            <li>
                                <a href="/pages/support.html">Контакты</a>
                            </li>
                        </ul>

                        <p class="foot-info-site">© 2020 flirtvirt.com - сайт поиска девушек для вирта.
                            <br><br>Контакты: info@flirtvirt.com</p>

                    </div>
                </div>

                <div class="main-content">

                    <div class="main-content-top">
                        <search></search>
                        @auth
                            <div class="user unselectable">
                                <div class="user-img"
                                     style="background-image: url(/storage/images/avatars/{{Auth::user()->avatar}});"></div>
                                <span>{{Auth::user()->name}}</span>
                                <div class="user-menu">
                                    <ul>
                                        <li><a href="{{ route('profile', Auth::user()->name) }}">
                                                <img src="/img/user.svg" alt="">
                                                <span>Мой профиль</span>
                                            </a>
                                        </li>
                                        <li><a href="/settings">
                                                <img src="/img/settigns_icons/settings.svg" alt="">
                                                <span>Настройки</span>
                                            </a></li>
                                        <li><a onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                               href="{{ route('logout') }}">
                                                <img src="/img/settigns_icons/logout.svg" alt="">
                                                <span>Выйти</span>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                </form>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                                <div class="user-arrow unselectable"></div>
                            </div>
                        @endauth

                        @guest
                            <div class="wrap-authorization desctop">
                                <div class="sign_in authorization-el unselectable signIn_open">
                                    <div class="authorization-icon authorization-icon__sign_in"></div>
                                    <span>Вход</span>
                                </div>
                                <div class="registration authorization-el unselectable registration_open">
                                    <div class="authorization-icon authorization-icon__registration"></div>
                                    <span>Регистрация</span>
                                </div>
                            </div>
                        @endguest


                    </div>

                    <section class="sec-tape">
                        @yield('content')
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@guest
    @if(Route::current())
        <div class="wrap-pop-up" id="sign_in"
             @if(Route::current() && Route::current()->getName() == 'login')
             style="display:block !important;" @endif
        >
            <div class="pop-up-body">
                <div class="pop-up-body-authorization">
                    <div class="close close-window"></div>
                    <h4>Авторизация</h4>
                    <div class="bg-danger error" id="loginfailedFull">
                        <i class="fa fa-times" aria-hidden="true"></i> Неправильно введены логин или пароль!
                    </div>

                    <form id="formLogin" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="body-authorization-top">
                            <div class="inputs">
                                <input placeholder="email или логин" name="email" id="email" type="text"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <input placeholder="Пароль" id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="forgot">
                                <a href="#" class="forgotPass_open">Забыли пароль?</a>
                            </div>
                            <button type="submit">Войти</button>
                            <div class="auth_btn registration_open">
                                <a href="#">Регистрация</a>
                            </div>
                        </div>
                        <div class="body-authorization-foot">
                            <p>или</p>
                            <div class="wrap-socials">
                                <div class="social-el">
                                    <a href="#">
                                        <img src="/img/socials/twitter.png" alt="">
                                    </a>
                                </div>
                                <div class="social-el">
                                    <a href="#">
                                        <img src="/img/socials/vk.png" alt="">
                                    </a>
                                </div>
                                <div class="social-el">
                                    <a href="#">
                                        <img src="/img/socials/facebook.png" alt="">
                                    </a>
                                </div>
                                <div class="social-el">
                                    <a href="#">
                                        <img src="/img/socials/googleplus.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="wrap-pop-up" id="registration">
            <div class="pop-up-body">
                <div class="pop-up-body-authorization">
                    <div class="close close-window"></div>
                    <h4>Регистрация</h4>
                    <form class="form" id="formRegister" method="post">
                        @csrf
                        <div class="body-authorization-top">
                            <div class="wrap-radio form__radio">
                                <label class="wrap-radio__el radio-el">
                                    <img src="/img/icons/female.svg" alt="" class="radio-el__icon">
                                    <span class="radio-el__text">Женщина:</span>
                                    <span class="radio-el__inp radio" for="sex1">
                            <input type="radio" name="sex" class="radio__inp" id="sex1"
                                   value="{{ \App\User::GENDER_FEMALE }}">
                            <span class="radio__dec">
                              <span class="radio__dec-circle"></span>
                            </span>
                            </span>
                                </label>
                                <label class="wrap-radio__el radio-el" for="sex2">
                                    <img src="/img/icons/male.svg" alt="" class="radio-el__icon">
                                    <span class="radio-el__text">Мужчина:</span>
                                    <span class="radio-el__inp radio">
                            <input type="radio" name="sex" class="radio__inp" id="sex2"
                                   value="{{ \App\User::GENDER_MALE }}">
                            <span class="radio__dec">
                              <span class="radio__dec-circle"></span>
                            </span>
                          </span>
                                </label>
                            </div>
                            <div class="wrap-select form__select">
                                <div class="wrap-select__title">Дата рождения:</div>
                                <div class="wrap-select__content">
                                    <select name="year" class="select-el" required="">
                                        <option disabled>Год</option>
                                        @for($i = 2001; $i >= 1940; $i--)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    <select class="select-el" name="month" required="">
                                        <option disabled>Месяц</option>
                                        <option value="1">январь</option>
                                        <option value="2">февраль</option>
                                        <option value="3">март</option>
                                        <option value="4">апрель</option>
                                        <option value="5">май</option>
                                        <option value="6">июнь</option>
                                        <option value="7">июль</option>
                                        <option value="8">август</option>
                                        <option value="9">сентябрь</option>
                                    </select>
                                    <select class="select-el" name="day" required="">
                                        <option disabled>День</option>
                                        @for($i = 1; $i <= 31; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="inp-el">
                                    <div class="inp-el__text">Логин может состоять только из латинскиз букв, символов и
                                        цифр
                                    </div>
                                    <input type="text" name="name" placeholder="Логин">
                                </div>
                                <div class="inp-el">
                                    <input type="text" name="email" placeholder="E-mail">
                                </div>
                                <div class="inp-el">
                                    <input type="password" name="password" placeholder="Пароль">
                                </div>
                                <div class="inp-el">
                                    <input type="password" name="password_confirmation" placeholder="Пароль еще раз">
                                </div>
                            </div>
                            <div class="wrap-checkbox unselectable">
                                <label>
                                    <div class="checkbox-el">
                                        <input type="checkbox" required="">
                                        <div class="checkbox"></div>
                                    </div>
                                    <span>Создавая аккаунт, я соглашаюсь с правилами сервиса<br> и даю согласие на обработку персональных данных</span>
                                </label>
                            </div>
                            <button type="submit">Создать аккаунт</button>
                            <div class="auth_btn signIn_open">
                                <a href="#">Авторизация</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="wrap-pop-up" id="forgot-pass">
            <div class="pop-up-body">
                <div class="pop-up-body-authorization">
                    <div class="close close-window"></div>
                    <p class="infoPopUp">
                        На ваш е-майл будут отправлены дальнейшие инструкции для восстановления пароля
                    </p>
                    <h4>Введите E-mail</h4>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="body-authorization-top">
                            <div class="inputs">
                                <input type="email" name="email" value="{{ old('email') }}"
                                       required autocomplete="email" autofocus placeholder="E-mail">
                            </div>
                            <button type="submit">Отправить</button>
                        </div>

                        <div class="body-authorization-foot">
                            <p>или</p>
                            <div class="wrap-socials">
                                <div class="social-el">
                                    <a href="#">
                                        <img src="/img/socials/twitter.png" alt="">
                                    </a>
                                </div>
                                <div class="social-el">
                                    <a href="#">
                                        <img src="/img/socials/vk.png" alt="">
                                    </a>
                                </div>
                                <div class="social-el">
                                    <a href="#">
                                        <img src="/img/socials/facebook.png" alt="">
                                    </a>
                                </div>
                                <div class="social-el">
                                    <a href="#">
                                        <img src="/img/socials/googleplus.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="wrap-pop-up" id="reset-pass"
             @if(Route::current() && Route::current()->getName() == 'password.reset') style="display:block !important;" @endif
        >
            <div class="pop-up-body">
                <div class="pop-up-body-authorization">
                    <div class="close close-window"></div>
                    {{--                <p class="infoPopUp">--}}
                    {{--                    Введите ваш email и новый пароль--}}
                    {{--                </p>--}}
                    <h4>Введите ваш email и новый пароль</h4>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @if(Route::current() && Route::current()->getName() == 'password.reset')
                            <input type="hidden" name="token" value="{{ $token }}">
                        @endif
                        <div class="body-authorization-top">
                            <div class="inputs">
                                <input type="email" name="email" value="{{ old('email') }}"
                                       required autocomplete="email" autofocus placeholder="E-mail">
                                <input name="password" type="password" placeholder="Пароль">
                                <input name="password_confirmation" type="password" placeholder="Пароль ещё раз">

                            </div>
                            @error('password')--}}
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button type="submit">Отправить</button>
                        </div>

                        <div class="body-authorization-foot">
                            <p>или</p>
                            <div class="wrap-socials">
                                <div class="social-el">
                                    <a href="#">
                                        <img src="/img/socials/twitter.png" alt="">
                                    </a>
                                </div>
                                <div class="social-el">
                                    <a href="#">
                                        <img src="/img/socials/vk.png" alt="">
                                    </a>
                                </div>
                                <div class="social-el">
                                    <a href="#">
                                        <img src="/img/socials/facebook.png" alt="">
                                    </a>
                                </div>
                                <div class="social-el">
                                    <a href="#">
                                        <img src="/img/socials/googleplus.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="wrap-pop-up" id="error-files">
            <div class="pop-up-body">
                <div class="pop-up-body-authorization">
                    <div class="close close-window"></div>
                    <p class="infoPopUp">
                        Вы можете добавить не более <span class="count_max"></span> фото
                    </p>
                    <div class="body-authorization-top">
                        <button class="close-window">Отмена</button>
                    </div>
                </div>
            </div>
        </div>


    @endif
@endguest

@auth
    <div class="wrap-pop-up popUp" id="modal-settings">
        <div class="pop-up-body popUp__body popUp__body_settings">
            <div class="popUp__message">
                <div class="close close-window"></div>
                <div class="popUp__settings">
                    <div class="settings-content-el">
                        <div class="settings-content-el-top unselectable">
                            <div class="settings-content-el-left">
                                <span>Обо мне</span>
                            </div>
                            <div class="settings-content-el-right">
                                <div class="arr_settigns">
                                    <img src="/img/arr_blue.svg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="settings-content-el-body">
                            <form class="form-settigns-el" method="post" action="{{route('save-about')}}">
                                @csrf
                                <textarea class="textarea about_textarea" name="about_user" maxlength="280">@if(auth()->user()->about != null){{auth()->user()->about}}@endif</textarea>
                                <div class="btn-green">
                                    <button type="submit">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="settings-content-el">
                        <div class="settings-content-el-top unselectable">
                            <div class="settings-content-el-left">
                                <span>Ссылка</span>
                            </div>
                            <div class="settings-content-el-right">
                                <div class="arr_settigns">
                                    <img src="/img/arr_blue.svg" alt="">
                                </div>
                            </div>
                        </div>
                        @if(auth()->user()->vip)
                            <div class="settings-content-el-body">
                                <form class="form-settigns-el" method="post" action="{{route('save-link')}}">
                                    @csrf
                                    <input type="text" class="inp" name="link" value="{{auth()->user()->link}}">
                                    <div class="btn-green">
                                        <button type="submit">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="settings-content-el-body" style="display: block;">
                                <form class="form-settigns-el">
                                    <div class="vip-block">
                                        <div class="vip-block__icon"></div>
                                        <div class="vip-block__text">Доступно для VIP</div>
                                    </div>
                                    <div class="btn-green">
                                        <button type="submit">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="settings-content-el">
                        <div class="settings-content-el-top unselectable">
                            <div class="settings-content-el-left">
                                <span>Вирт общение</span>
                            </div>
                            <div class="settings-content-el-right">
                                <div class="arr_settigns">
                                    <img src="/img/arr_blue.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="settings-content-el-body">
                            <form class="form-settigns-el" method="post" action="{{route('save-services')}}">
                                @csrf
                                <div class="checkboxes">
                                <label class="checkboxes__el checkbox-el">
                                    <span class="checkbox-el__checkbox checkbox">
                                        <input type="checkbox" name="service[]" value="переписка" class="checkbox__inp">
                                        <span class="checkbox__dec"></span>
                                    </span>
                                    <span class="checkbox-el__text">переписка</span>
                                </label>
                                <label class="checkboxes__el checkbox-el">
                                    <span class="checkbox-el__checkbox checkbox">
                                        <input type="checkbox" name="service[]" value="фото архив" class="checkbox__inp" >
                                        <span class="checkbox__dec"></span>
                                    </span>
                                    <span class="checkbox-el__text">фото архив</span>
                                </label>
                                <label class="checkboxes__el checkbox-el">
                                    <span class="checkbox-el__checkbox checkbox">
                                        <input type="checkbox" name="service[]" value="голосовые сообщения" class="checkbox__inp">
                                        <span class="checkbox__dec"></span>
                                    </span>
                                    <span class="checkbox-el__text">голосовые сообщения</span>
                                </label>
                                <label class="checkboxes__el checkbox-el">
                                    <span class="checkbox-el__checkbox checkbox">
                                        <input type="checkbox" name="service[]" value="видео архив" class="checkbox__inp">
                                        <span class="checkbox__dec"></span>
                                    </span>
                                    <span class="checkbox-el__text">видео архив</span>
                                </label>
                                <label class="checkboxes__el checkbox-el">
                                    <span class="checkbox-el__checkbox checkbox">
                                        <input type="checkbox" name="service[]" value="видеосообщения" class="checkbox__inp">
                                        <span class="checkbox__dec"></span>
                                    </span>
                                    <span class="checkbox-el__text">видеосообщения</span>
                                </label>
                                <label class="checkboxes__el checkbox-el">
                                    <span class="checkbox-el__checkbox checkbox">
                                        <input type="checkbox" name="service[]" value="фото на заказ" class="checkbox__inp">
                                        <span class="checkbox__dec"></span>
                                    </span>
                                    <span class="checkbox-el__text">фото на заказ</span>
                                </label>
                                <label class="checkboxes__el checkbox-el">
                                    <span class="checkbox-el__checkbox checkbox">
                                        <input type="checkbox" name="service[]" value="видеозвонок" class="checkbox__inp">
                                        <span class="checkbox__dec"></span>
                                    </span>
                                    <span class="checkbox-el__text">видеозвонок</span>
                                </label>
                                <label class="checkboxes__el checkbox-el">
                                    <span class="checkbox-el__checkbox checkbox">
                                        <input type="checkbox" name="service[]" value="видео на заказ" class="checkbox__inp">
                                        <span class="checkbox__dec"></span>
                                    </span>
                                    <span class="checkbox-el__text">видео на заказ</span>
                                </label>
                                </div>
                                <div class="btn-green">
                                    <button type="submit">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="settings-content-el">
                        <div class="settings-content-el-top unselectable">
                            <div class="settings-content-el-left">
                                <span>Контакты</span>
                            </div>
                            <div class="settings-content-el-right">
                                <div class="arr_settigns">
                                    <img src="/img/arr_blue.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="settings-content-el-body">
                            <form class="form-settigns-el" method="post" action="{{route('save-contacts')}}">
                                @csrf

                                <div class="wrap-socialContacts">
                                    <div class="wrap-socialContacts__el socialContact-el">
                                        <div class="socialContact-el__left">
                                            <img src="/img/socialContact/whatsapp.png" alt=""
                                                 class="socialContact-el__icon">
                                            <div class="socialContact-el__text">Whatsapp:</div>
                                        </div>
                                        @if(auth()->user()->vip)
                                            <input type="text" class="socialContact-el__inp inp" name="whatsapp"
                                                   value="{{auth()->user()->whatsapp}}">
                                        @else
                                            <div class="vip-block socialContact-el__inp">
                                                <div class="vip-block__icon"></div>
                                                <div class="vip-block__text">Доступно для VIP</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="wrap-socialContacts__el socialContact-el">
                                        <div class="socialContact-el__left">
                                            <img src="/img/socialContact/tel.png" alt="" class="socialContact-el__icon">
                                            <div class="socialContact-el__text">Telegram:</div>
                                        </div>
                                        @if(auth()->user()->vip)
                                            <input type="text" class="socialContact-el__inp inp" name="telegram"
                                                   value="{{auth()->user()->telegram}}">
                                        @else
                                            <div class="vip-block socialContact-el__inp">
                                                <div class="vip-block__icon"></div>
                                                <div class="vip-block__text">Доступно для VIP</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="wrap-socialContacts__el socialContact-el">
                                        <div class="socialContact-el__left">
                                            <img src="/img/socialContact/viber.png" alt=""
                                                 class="socialContact-el__icon">
                                            <div class="socialContact-el__text">Viber:</div>
                                        </div>
                                        @if(auth()->user()->vip)
                                            <input type="text" class="socialContact-el__inp inp" name="viber"
                                                   value="{{auth()->user()->viber}}">
                                        @else
                                            <div class="vip-block socialContact-el__inp">
                                                <div class="vip-block__icon"></div>
                                                <div class="vip-block__text">Доступно для VIP</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="wrap-socialContacts__el socialContact-el">
                                        <div class="socialContact-el__left">
                                            <img src="/img/socialContact/skype.png" alt=""
                                                 class="socialContact-el__icon">
                                            <div class="socialContact-el__text">Skype:</div>
                                        </div>
                                        @if(auth()->user()->vip)
                                            <input type="text" class="socialContact-el__inp inp" name="skype"
                                                   value="{{auth()->user()->skype}}">
                                        @else
                                            <div class="vip-block socialContact-el__inp">
                                                <div class="vip-block__icon"></div>
                                                <div class="vip-block__text">Доступно для VIP</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="btn-green">
                                    <button type="submit">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="settings-content-el">
                        <div class="settings-content-el-top unselectable">
                            <div class="settings-content-el-left">
                                <span>Теги</span>
                            </div>
                            <div class="settings-content-el-right">
                                <div class="arr_settigns">
                                    <img src="/img/arr_blue.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="settings-content-el-body" style="display: none;">
                            <form class="form-settigns-el" method="post" action="{{route('save-tags')}}">
                                @csrf
                                <div class="select">
                                    @php $tags = \App\Tag::all() @endphp
                                    <select class="select_jq select2-hidden-accessible"
                                            data-placeholder="выберите не более 4-х тегов, начните вводить текст"
                                            multiple="" data-select2-id="2" tabindex="-1" aria-hidden="true"
                                            name="tags[]">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="btn-green">
                                    <button type="submit">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endauth

<div class="wrap-pop-up popUp" id="modal-review">
    <div class="pop-up-body popUp__body popUp__body_settings">
        <div class="popUp__message">
            <div class="close close-window"></div>
            <div class="popUp__content">
                <form method="post" id="form-feedback">
                    @csrf
                    <div class="block-title block-title_margin">
                        <div class="block-title__title title_small">Оценить</div>
                        <div class="rating rating_left rating_action">
                            <div class="rating__el rating-el rating-el_active"></div>
                            <div class="rating__el rating-el"></div>
                            <div class="rating__el rating-el"></div>
                            <div class="rating__el rating-el"></div>
                            <div class="rating__el rating-el"></div>
                            <input type="hidden" name="rating" class="rating_action__inp" value="1">
                        </div>
                    </div>
                    <div class="block-title block-title_margin">
                        <div class="block-title__title title_small">Оставить отзыв:</div>
                        <div class="wrap-radio">
                            <label class="wrap-radio__el radio-el">
                              <span class="radio-el__inp radio">
                                <input type="radio" checked name="think" value="1" class="radio__inp">
                                <span class="radio__dec">
                                  <span class="radio__dec-circle"></span>
                                </span>
                              </span>
                                <span class="radio-el__text">Положительно</span>
                            </label>
                            <label class="wrap-radio__el radio-el">
                              <span class="radio-el__inp radio">
                                <input type="radio" name="think" value="0" class="radio__inp">
                                <span class="radio__dec">
                                  <span class="radio__dec-circle"></span>
                                </span>
                              </span>
                                <span class="radio-el__text">Отрицательно</span>
                            </label>
                        </div>
                        <textarea class="textarea block-title__textarea feedback_field" name="text" maxlength="280"></textarea>
                    </div>
                    <button type="submit" class="btn btn_big">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>

@yield('scripts')

<script src="/js/jquery.fancybox.min.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/slick.min.js"></script>
<script>
    $(document).ready(function () {
        $("#registerfailedFull").slideUp();
        $('#loginfailedFull').slideUp();

        var loginForm = $("#formLogin");
        var registerForm = $("#formRegister");
        let loginHtml = $('#formLogin').html();
        let registerHtml = $('#formRegister').html();
        loginForm.submit(function (e) {
            e.preventDefault();
            var formData = loginForm.serialize();
            $.ajax({
                url: '{{ url("login") }}',
                type: 'POST',
                data: formData,
                {{-- Send CSRF Token over ajax --}}
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function () {
                    $('.wrapper-load').fadeIn();

                    $("#loginfailedFull").slideUp();

                    $("#formLogin").html('<i class="fa fa-spinner fa-spin fa-fw"></i>');
                    $("#formLogin").prop("disabled", true);
                },
                success: function (data) {
                    window.location.reload(true);
                },
                error: function (data) {
                    console.log(loginHtml);
                    $("#loginfailedFull").slideDown();
                    $("#formLogin").prop("disabled", false);
                    $('#formLogin').html(loginHtml);
                    $('.wrapper-load').fadeOut(300);

                }
            });
        });

        registerForm.submit(function (e) {
            e.preventDefault();
            var formData = registerForm.serialize();
            $.ajax({
                url: '{{ url("register") }}',
                type: 'POST',
                data: formData,
                {{-- Send CSRF Token over ajax --}}
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function () {
                    $("#registerfailedFull").slideUp();
                    // $("#formRegister").html('<i class="fa fa-spinner fa-spin fa-fw"></i>');
                    $('.wrapper-load').fadeIn();
                    $("#formRegister").prop("disabled", true);
                },
                error: function (data) {
                    $("#registerfailedFull").html('');
                    $("#registerfailedFull").append('<ul>');
                    let obj = jQuery.parseJSON(data.responseText);
                    let values = Object.values(obj.errors);

                    for (value of values) {
                        $("#registerfailedFull").append('<li>' + value[0] + '</li>');
                    }

                    $("#registerfailedFull").slideDown();
                    $("#formRegister").prop("disabled", false);
                    $('#formRegister').html(registerHtml);
                    $("#registerfailedFull").append('</ul>');
                    $('.wrapper-load').fadeOut(300);
                },
                success: function (data) {
                    //ym(55702444, 'reachGoal', 'register');
                    setTimeout(function () {
                        window.location.reload(true)
                    }, 500);
                }
            });
        });
    });
</script>

<script>
    function openFeedbackForm(id) {
        let form = $('#form-feedback');
        let url = '/feedbacks/save/' + id;
        form.attr('action', url);
    }
</script>

<script>
    $(document).ready(function () {
       $('.form-settigns-el').on('submit', function () {
           let url = $(this).attr('action');
           let data = $(this).serialize();

           $.post(url, data).then((resp) => {
               let firstParent = $(this).parent();
               let secondParent = $(this).parent().parent();
               secondParent.removeClass('active');
               firstParent.slideUp(250);
           });

           return false;
       })
    });
</script>

</body>
</html>
