<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">@auth
      {{ Auth::user()->fullname }}
    @endauth</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="عرض/إخفاء لوحة التنقل">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form action="{{ route('search.top') }}" class="w-100" id="search">
      @csrf
      <input class="form-control form-control-dark w-100" type="text" placeholder="جستجو" aria-label="جستجو" name="search">
    </form>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="{{ route('logout') }}">خروج</a>
     
      </li>
    </ul>
  </header>