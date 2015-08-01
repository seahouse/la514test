<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERP</title>
    <link href="{{ asset("//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="/css/navbar.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/erp">XXX</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">                        
<!--                         <li class="dropdown"> -->
<!--                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><input type="text" id="road_leave_city" /></a> -->
<!--                         </li> -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">产品<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/items">物料</a></li>
                                <li><a href="/itemclasses">物料类别</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">销售<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">销售订单</a></li>
                                <li><a href="#">客户</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if((Auth::check()))
                            <li><a href="#">{!! Auth::user()->name !!}</a></li>
                            <li><a href="/auth/logout">退出登录</a></li>
                        @else
                            {!! Redirect::to('auth/login'); !!}
<!--                             {!! redirect('/') !!} -->
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="panel panel-default">
                @yield('main')
            </div>
        </div>        
    </div>
    
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>