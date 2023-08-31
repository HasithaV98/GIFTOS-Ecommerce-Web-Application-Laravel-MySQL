<header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{url('/')}}">
          <span>
            Giftos
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('all_products')}}">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('whyus')}}">
                Why Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('testimonial')}}">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('contactus')}}">Contact Us</a>
            </li>
            
            <div class="user_option" id="user_gap">
            
            <a href="{{url('showcart')}}">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </a>
            <a href="{{url('show_order')}}">
              <img src="images/shopping-list.png" alt="" width="20px" height="17px" style="margin-bottom:4px">
            </a>
            <form class="form-inline ">
              <button class="btn nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
          @if(Route::has('login'))
          @auth
          <li class="nav-item" >
            <x-app-layout >
    
            </x-app-layout>
            @else
            </li>
            <li class="nav-item">
              <a class="btn btn-success" href="{{ route('login') }}" id="log_but" style="background-color:#ff9999;border:none">Login</a>
            </li>
            
            <li class="nav-item">
              <a class="btn btn-warning" href="{{route('register') }}" style="background-color:#ff9999;border:none;color:white">Register</a>
            </li>
            @endauth
            @endif
          </ul>
          
        </div>
      </nav>
    </header>