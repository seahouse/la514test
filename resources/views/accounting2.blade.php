@extends('navbar')

@section('main')
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/01.jpg" alt="123" style="width:100%;">
                <div class="carousel-caption">
<!--                     <h3>First slide label</h3> -->
                    <h3>和民福会计供需平台旨在提供一个能够平衡企业与会计之间的供需关系的的一体化平台，解决了诸多不需要专职会计的中小企业代理记账、纳税申报、会计培训、财务咨询、税务咨询、企业注册、企业注销及企业内控的诸多问题，也为熟悉以上业务的会计从业人员提供一个寻找合作单位的平台。
                    该平台除了提供了企业找会计、会计找企业的基本功能以外，还为企业与会计从业人员开通了代理记账、纳税申报、会计实务培训、财务及税务咨询、企业注册及注销、企业内控、中小企业沙龙、会计从业人员社区等多个模块，在本平台注册的企业和会计从业人员按所在县区注册，为供需双方迅速找到合作方提供了便捷的服务，其中企业找代帐会计、代帐会计找企业将首先以app与网站集合的形式加以推广。</h3>
                </div>
            </div>
            <div class="item">
                <img src="images/02.jpg" alt="..." style="width:100%;">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <img src="images/03.jpg" alt="..." style="width:100%;">
                <div class="carousel-caption">
                </div>
            </div>
        </div>
        
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@stop
