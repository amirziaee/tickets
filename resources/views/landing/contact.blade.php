@extends('layouts.index-front')

@section('body')

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h4 class="float-md-start mb-0">سامانه ارسال پیام</h4>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link {{ url()->current() === route('home') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}">خانه</a>
                    <a class="nav-link {{ url()->current() === route('aboutus') ? 'active' : '' }}"
                        href="{{ route('aboutus') }}">در باره ما</a>
                    <a class="nav-link" href="{{ route('contactus') }}">تماس با ما</a>
                    @auth
                        <a class="nav-link {{ url()->current() === route('contactus') ? 'active' : '' }}"
                            href="{{ route('logout') }}">خروج</a>
                    @endauth
                    @guest
                        <a class="nav-link" href="{{ route('login') }}">ورود</a>
                    @endguest
                </nav>
            </div>
        </header>

        <main class="px-3 content-main">
            <h1>تماس با ما</h1>
            <p class="lead ">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز و
                جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
            <p class="lead">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-lg btn-success fw-bold border-white">داشبرد</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-lg btn-success fw-bold border-white">شروع کن</a>
                @endguest

            </p>
        </main>

        <footer class="mt-auto text-white-50">
            <p>طراحی شده توسط امیر حسین ضیائی</p>
        </footer>
    </div>


@endsection
