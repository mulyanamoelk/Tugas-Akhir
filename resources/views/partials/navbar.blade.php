
<header>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/">Weblog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href=" {{url('/home/dashboard')}} ">Home </a
        </li>
        <li class="nav-item">
          <a class="nav-link" href=" {{url('/newArticle')}} ">New Article</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href=" {{url('/about')}} ">About</a>
          </li>
      </ul>

    </div>

    <div class="flex flex-col">

        @if(Route::has('login'))
            <div class="absolute top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
                @auth
                    <a href="{{ route('home') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase text-light">{{ __('Dashboard') }}</a>
                @else
                    <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase text-light" >{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase text-light">{{ __('Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif

    </div>
  </nav>

</header>





