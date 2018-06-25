<div id="header">
    <div class="header">
        <h1 id="logo">
            <a href="{{url('/')}}"/>
            <img src="{{asset('resources/views/home/style/images/logo.png')}}" height="65px" alt="小文Blog" title="小文Blog" />
            </a>
        </h1>
        <div id="mainnav">
            <ul id="nav">
                <li class="menu-item-has-children submenu top"><a href="{{url('/')}}/">首页</a></li>
                @foreach($navs as $v)
                <li class="menu-item-has-children submenu top"><a href="{{$v['url']}}">{{$v['name']}} <span class="sign "></span></a>
                    @if(isset($v['child']) && $v['child'])
                    <ul class="sub-menu">
                        @foreach($v['child'] as $n)
                        <li><a href="{{$n['url']}}">{{$n['name']}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
        <!-- <div class="rightnav">
            <ul>
                <li ><a href="javascript:;">登录</a></li>
                <li class="active"><a href="javascript:;">注册</a></li>
            </ul>
        </div> -->
    </div>
</div>