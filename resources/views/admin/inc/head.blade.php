
<header class="main-header">
    <!-- Logo -->
    <a href="/pages/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>LUX</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>LUX</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('img/ceo1.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->email }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('img/ceo1.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  Bartolo Jed - Web Developer
                  <small>Member since Nov. 2012</small>
                  
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="text-center">
                  {{-- <a type="submit" class="btn btn-default btn-flat">Sign out</a> --}}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                      <button type="submit" class="btn btn-dafault">
                        Sign out
                      </button>
                      @csrf
                  </form>

                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
