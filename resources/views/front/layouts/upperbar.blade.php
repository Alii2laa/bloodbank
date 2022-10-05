<div class="upper-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="language">
                    <a href="#" class="ar active"></a>
                    <a href="#" class="en inactive"></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="social">
                    <div class="icons">
                        <a href="{{$settings->fb_link}}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$settings->in_link}}" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="{{$settings->tw_link}}" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="{{$settings->yt_link}}" class="youtube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <!-- not a member-->
            <div class="col-lg-4">
                <div class="info" dir="ltr">
                    <div class="phone">
                        <i class="fas fa-phone-alt"></i>
                        <p>+966506954964</p>
                    </div>
                    <div class="e-mail">
                        <i class="far fa-envelope"></i>
                        <p>name@name.com</p>
                    </div>
                </div>

                @if(Auth::guard('client')->check())
                <div class="member">
                    <p class="welcome">مرحباً بك</p>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth('client')->user()->name}}
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('front.home')}}">
                                <i class="fas fa-home"></i>
                                الرئيسية
                            </a>
                            <a class="dropdown-item" href="{{route('profile.data')}}">
                                <i class="far fa-user"></i>
                                معلوماتى
                            </a>
                            <a class="dropdown-item" href="{{route('front.password.show')}}">
                                <i class="fa fa-lock"></i>
                                تغيير كلمة المرور
                            </a>
                            <a class="dropdown-item" href="{{route('peripherals.data')}}">
                                <i class="far fa-bell"></i>
                                اعدادات الاشعارات
                            </a>
                            <a class="dropdown-item" href="{{route('post.favourited')}}">
                                <i class="far fa-heart"></i>
                                المفضلة
                            </a>
                            <a class="dropdown-item" href="{{route('front.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                تسجيل الخروج
                            </a>
                            <form id="logout-form" action="{{route('front.logout')}}" method="POST" style="display: none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                @endif



            </div>

        </div>
    </div>
</div>

