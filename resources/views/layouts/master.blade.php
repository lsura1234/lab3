<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title','TEST')</title>
        
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('vendor/chartjs/Chart.min.js')}}"></script>
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
   
        <link rel="stylesheet" href="{{asset('vendor/toastr/toastr.min.css')}}">
        <script src="{{asset('vendor/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('js/angular.min.js')}}"> </script>
    </head>
    <body>
        <nav class="navbar-default navbar-static-top">
            <div class="container">
            <div class = "navbar-header">
                <a href="#" class="navbar-brand">BikeShop</a>
            </div>
           
            <div id ="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                <li><a href="{{URL::to('home')}}">หน้าแรก</a></li>
                @guest
                @else
                    <li><a href="{{URL::to('product')}}">ข้อมูลสินค้า</a></li>
                <li><a href="{{URL::to('chart')}}">รายงาน</a></li>
                
                @endguest
                </ul>


                <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{URL::to('cart/view')}}" > <i class="fa fa-shopping-cart"></i>
                        ตะกร้า <span class="label label-danger">
                        {!! count(Session::get('cart_items')) !!}</span></a></li>
                        @guest
                          <li><a href="{{route('login')}}">ล็อคอิน</a></li>
                          <li><a href="{{route('register')}}">ลงทะเบียน</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    {{Auth::user()->name}} <span class="caret"></span>
                                </a>
                            </li>
                        <a href="{{URL::to('logout')}}" class="btn btn-primary"><i class="fa fa-logout"></i>ออกจากระบบ</a>
                        @endguest
                </ul>
            
            </div>
        </div>
        </nav>
        @yield("content")
        @if(session('msg'))
            @if(session('ok'))
                <script>toastr.success("{{session('msg')}}")</script>
            @else
                 <script>toastr.error("{{session('msg')}}")</script>
            @endif
        @endif
        {{-- <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <strong>หัวข้อ</strong>
                </div>
            </div>
            <div class="panel-body">
                ใส่เนื้อหาไปตรงนี้
            </div>
        </div>
        <div class="container">
                <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคาขาย</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>P001</td>
                                <td>ชุดจักรยานขนาด XL</td>
                                <td>2500.00</td>
                            </tr>
                            <tr>
                                    <td>P001</td>
                                    <td>ชุดจักรยานขนาด XL</td>
                                    <td>2500.00</td>
                                </tr>
                                <tr>
                                        <td>P001</td>
                                        <td>ชุดจักรยานขนาด XL</td>
                                        <td>2500.00</td>
                                    </tr>
                        </tbody>
                    </table>
        </div>
        <a href="#" class="btn btn-default"><i class="fa fa-home"></i>Default</a>
        <a href="#" class="btn btn-primary">Primary</a>
        <a href="#" class="btn btn-info">Info</a>
        <a href="#" class="btn btn-success">Success</a>
        <a href="#" class="btn btn-warning">Warning</a>
        <a href="#" class="btn btn-danger">Danger</a>

        <div class="form-inline">
            <input type="text" class="form-control" placeholder="ชื่อผู้ใช้">
            <input type="password" class="form-control" placeholder="รหัสผ่าน">
            <button class="btn btn-primary">เข้าสู่ระบบ</button>
        </div>
        
        <div class="form-group">
            <label>ชื่อ-นามสกุล</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>ที่อยู่</label>
            <textarea rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">เพิ่มข้อมูล</button>        
        </div>

        <div class="form-group has-error">
                <label>ชื่อ-นามสกุล</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group has-error">
                <label>ที่อยู่</label>
                <textarea rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">เพิ่มข้อมูล</button>        
            </div> --}}
        
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    </body>
</html>