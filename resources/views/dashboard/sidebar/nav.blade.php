<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('dashboard')  ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
            <span data-feather="inbox"></span>
            صندوق پیام
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('send.message')  ? 'active' : '' }}" aria-current="page" href="{{ route('send.message') }}">
            <span data-feather="send"></span>
           ارسال پیام
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('draft.message')  ? 'active' : '' }}" aria-current="page" href="{{ route('draft.message') }}">
            <span data-feather="draft"></span>
            پیش نویس ها
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('sent.message')  ? 'active' : '' }}" aria-current="page" href="{{ route('sent.message') }}">
            <span data-feather="sent"></span>
            ارسال شده 
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('delete.message')  ? 'active' : '' }}" aria-current="page" href="{{ route('delete.message') }}">
            <span data-feather="trash"></span>
            حذف شده
          </a>
        </li>
        

        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('info')  ? 'active' : '' }}" aria-current="page" href="{{ route('info') }}">
            <span data-feather="information"></span>
            اطلاعات
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('advance.search')  ? 'active' : '' }}" aria-current="page" href="{{ route('advance.search') }}">
            <span data-feather="home"></span>
              جستجوی پیشرفته
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('home') }}">
            <span data-feather="home"></span>
            مشاهده وب سایت
          </a>
        </li>
      
      </ul>


    </div>
  </nav>