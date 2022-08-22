<header class="header">
    <a href="" class="header-name">Abderrahmane</a>

    <ion-icon name="menu-outline" class="header__toggle" id="nav-toggle"></ion-icon>
    <nav class="nav" id="nav-menu">

        <div class="nav__content">
            <ion-icon name="close-outline" class="nav__close" id="nav-close"></ion-icon>
             <div class="nav__prifil">
                <div class="nav_img">
                    @auth
                    <img src="{{asset(Auth::user()->image)}}" alt="">
                    @else
                    <img src="{{asset('images/perfil.png')}}" alt="">
                    @endauth
                </div>

                <div class="nav__info">
                    @auth
                     <a href="" class="nav__name">{{Auth::user()->name}}</a> <br/>
                     <span class="nav__profession">Manager</span>
                    @else
                     <a href="" class="nav__name">EmpDahs</a> <br/>
                    @endauth


                </div>
             </div>

            <div class="nav__menu">
                <ul class="nav__list">

                    <li class="nav__item {{Route::currentRouteName() == 'home' ? 'active' : ''}}"  ><a href="/" class="nav__link ">Home</a></li>
                    <li class="nav__item  {{Route::currentRouteName() == 'depts.index' ? 'active' : ''}}"><a href="/admin/depts" class="nav__link">Departements</a></li>
                    <li class="nav__item {{Route::currentRouteName() == 'employes.index' ? 'active' : ''}}"><a href="/admin/employes" class="nav__link">Employes</a></li>
                    @auth
                    <li class="nav__item"  >
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="nav__link" style="background-color: transparent;border:none;color:white" >
                                Logout
                            </button>
                        </form>
                    </li>
                    @else
                    <li class="nav__item "><a href="{{url('/login')}}" class="nav__link ">login</a></li>
                    @endauth


                </ul>
            </div>

            <div class="nav__social">
                <a href="#" class="nav__social-icon">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
                <a href="#" class="nav__social-icon">
                    <ion-icon name="logo-github"></ion-icon>
                </a>
                <a href="#" class="nav__social-icon">
                    <ion-icon name="logo-behance"></ion-icon>
                </a>
            </div>
        </div>


    </nav>

</header>

