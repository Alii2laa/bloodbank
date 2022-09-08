<div class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('front/imgs/logo.png')}}" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{Route::currentRouteName() == 'front.home' ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('front.home')}}">الرئيسية <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{Route::currentRouteName() == 'about' ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('about')}}">عن بنك الدم</a>
                    </li>
                    <li class="nav-item {{Route::currentRouteName() == 'donations' ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('donations')}}">طلبات التبرع</a>
                    </li>
                    <li class="nav-item {{Request::is('client/posts') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('client/posts')}}">المقالات</a>
                    </li>
                    <li class="nav-item {{Route::currentRouteName() == 'contact.show' ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('contact.show')}}">اتصل بنا</a>
                    </li>
                </ul>

                <!--not a member-->
                @if(Auth::guard('client')->check())
                    <a href="{{route('donation.create.show')}}" class="donate">
                        <img src="{{asset('front/imgs/transfusion.svg')}}">
                        <p>طلب تبرع</p>
                    </a>
                @else
                    <div class="accounts">
                        <a href="{{route('front.register.show')}}" class="create">إنشاء حساب جديد</a>
                        <a href="{{route('front.login.show')}}" class="signin">الدخول</a>
                    </div>
                @endif

                <!--I'm a member



                -->

            </div>
        </div>
    </nav>
</div>
