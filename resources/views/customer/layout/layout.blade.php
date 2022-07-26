<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/customer.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/cus.css')}}">
        <link rel="stylesheet" href="{{asset('css/cart.css')}}">
        <link rel="stylesheet" href="{{asset('css/carttwo.css')}}">
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Trang chủ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link activel" aria-current="page" href="#!">Danh mục</a></li>
                        <li class="nav-item"><a class="nav-link activel" aria-current="page" href="{{route('product.listcus',$id=0)}}">Tất cả sản phẩm</a></li>
                        @foreach ($data1 as $item)
                        <li class="nav-item"><a class="nav-link" href="{{route('product.listcus',$item->id)}}">{{$item->name}}</a></li>
                        @endforeach
                        {{-- <li class="nav-item"><a class="nav-link" href="#!">Quản cáo</a></li> --}}
                        @if (Auth::guard('web')->user() != null)
                        <li class="nav-item"><a class="nav-link" href="{{route('order.index',Auth::guard('web')->user()->id)}}">Đơn hàng</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('order.history',Auth::guard('web')->user()->id)}}">LS mua hàng</a></li>
                        {{-- @endif --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tài khoản</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!" id="infor">Thông tin</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                {{-- <li><a class="dropdown-item" href="{{route('customer.regis')}}" id="register">Đăng kí</a></li>
                                <li><a class="dropdown-item" href="{{route('customer.login')}}" id="login">đăng nhập</a></li> --}}
                                {{-- @if (Auth::guard('web')->user() != null) --}}
                                {{-- <li><a class="dropdown-item" href="{{route('customer.login')}}" id="login">đăng nhập</a></li> --}}
                                <li><a class="dropdown-item" href="{{route('customer.logout')}}" id="checkout">Đăng xuất</a></li>
                                {{-- @endif --}}
                            </ul>
                        </li>
                        @else
                        <li class="nav-item"><a class="nav-link activel" aria-current="page" href="{{route('customer.regis')}}">Đăng kí</a></li>
                        <li class="nav-item"><a class="nav-link activel" aria-current="page" href="{{route('customer.login')}}">Đăng nhập</a></li>
                        @endif
                    </ul>
                    <form class="d-flex" action="{{route('cart.list')}}">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">{{ $count }}</span>
                        </button>
                    </form>
                </div>
            </div>
            @if (Auth::guard('web')->user() != null)
            <span class="accounname">
                <span>Xin chào:</span>{{ Auth::guard('web')->user()->name }}
            </span>
            @endif
        </nav>
        <!-- Header-->
        {{-- <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="contain">
                @foreach ($data3 as $banner)
                   <img src="{{ asset($banner->image)}}" alt="{{$banner->title}}" style="width:100%" id="{{$banner->id}}" class="slide" idx="{{$banner->id}}">
                   @endforeach
                <img class="btn-change" id="next" src="icon/next.png" alt="next">
                <img class="btn-change" id="prev" src="icon/prev.png" alt="prev">
                </div>
                <br>
                <div class="butto">
                <div class="change-img text-center">
                    <button class="active">1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>4</button>
                </div>
                </div>
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header> --}}
        <!-- Section-->
      <tbody>
        @section('content')
        @show
    </tbody>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            @foreach ($data2 as $infor)
                <table class="text-white infor col-md-3">
                    <tr>
                        <td>SĐT:</td>
                        <td>{{$infor->hotline}}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{$infor->email}}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ:</td>
                        <td>{{$infor->address}}</td>
                    </tr>
                </table>
            @endforeach
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        {{-- @if(Auth::guard('web')->check() == null)
    <script>
         var el = document.getElementById('logout');
          el.remove();
          var ul = document.getElementById('infor');
          ul.remove();
    </script>
    @else
         <script>
          var el = document.getElementById('register');
          el.remove();
            var al = document.getElementById('login');
          al.remove();
         </script>
    @endif --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}
        <script src="{{asset('js/customer.js')}}"></script>
        <script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
       @yield('js')
    </body>
</html>
