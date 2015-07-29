<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--     <title>Laravel 5.1 with Custom Authentication</title> -->
    <title>和民福会计供需平台</title>
    
    <link data-turbolinks-track="true" href="css/choose-city.css" media="all" rel="stylesheet" />
<!--     <link href="{{ asset("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css") }}" rel="stylesheet"> -->
    <link href="{{ asset("//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="/css/navbar.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">和民福会计供需平台</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">地区<span class="caret"></span></a>
<!--                             <ul class="dropdown-menu"> -->
<!--                                 <li><a href="/items">物料</a></li> -->
<!--                             </ul> -->
                        </li>
<!--                         <li class="dropdown"> -->
<!--                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">产品<span class="caret"></span></a> -->
<!--                             <ul class="dropdown-menu"> -->
<!--                                 <li><a href="/items">物料</a></li> -->
<!--                             </ul> -->
<!--                         </li> -->
<!--                         <li class="dropdown"> -->
<!--                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">销售<span class="caret"></span></a> -->
<!--                             <ul class="dropdown-menu"> -->
<!--                                 <li><a href="#">销售订单</a></li> -->
<!--                                 <li><a href="#">客户</a></li> -->
<!--                             </ul> -->
<!--                         </li> -->
                        <li><a href="/accountingorder1s">企业找会计</a></li>
                        <li><a href="#">代理记账</a></li>
                        <li><a href="#">纳税申报</a></li>
                        <li><a href="#">其他服务</a></li>
                        <li><a href="#">中小企业沙龙</a></li>
                        <li><a href="#">会计从业人员社区</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if((Auth::check()))
                            <li><a href="#">{!! Auth::user()->name !!}</a></li>
                            <li><a href="accountingorder1s/create">发布信息</a></li>
                            <li><a href="/auth/logout">退出登录</a></li>
                        @else
                            {!! Redirect::to('auth/login'); !!}
<!--                             {!! redirect('/') !!} -->
                        @endif
                    </ul>
                </div>
            </div>
        </nav>       
        <input type="text" id="road_leave_city" /> 
        <div class="panel panel-default">
                @yield('main')
            </div>
        </div>
    </div>
<!--     <div class="navbar navbar-inverse navbar-fixed-top" role="navigation"> -->
<!--         <div class="container"> -->
<!--             <div class="navbar-header"> -->
<!--                 <a class="navbar-brand" href="#">Project name</a> -->
<!--             </div> -->
<!--             <div class="navbar-form navbar-right"> -->
<!--                 @if((Auth::check())) -->
<!--                     <a class="btn btn-danger" href="/auth/logout">Log Out</a> -->
<!--                 @else -->
<!--                     <a href="/auth/login" class="btn btn-success">Log In</a> -->
<!--                     <a href="/auth/register" class="btn btn-primary">Sign Up</a> -->
<!--                 @endif -->
<!--             </div> -->
<!--         </div> -->
<!--     </div> -->
        
    
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script data-turbolinks-track="true" src="js/jquery.min.js?body=1"></script>
    <script data-turbolinks-track="true" src="js/configCity.js?body=1"></script>
    <script data-turbolinks-track="true" src="js/jquery.chooseCity.js?body=1"></script>
    <script data-turbolinks-track="true" src="js/index.js?body=1"></script>
</body>
</html>
