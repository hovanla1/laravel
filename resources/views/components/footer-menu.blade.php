<div class="container">
    <div class="row">


        {{-- @foreach ($list_menu as $row_menu)
        @if ($row_menu->MenuSub->count())
                <li class="dropdown"><a href="{{route('slug.home',['slug'=>$row_menu->link])}}">{{$row_menu->name}}<i class="fa fa-angle-down"></i></a>
                    <ul role="menu" class="sub-menu">
                        @foreach ($row_menu->MenuSub as $menu_sub)
                        @if($menu_sub->status==1)
                            <li><a href="{{route('slug.home',['slug'=>$menu_sub->link])}}">{{$menu_sub->name}}</a></li>
                        @endif
                        @endforeach
                    </ul>
                </li>
            @else
                <li><a href="{{route('slug.home',['slug'=>$row_menu->link])}}">{{$row_menu->name}}</a></li>
            @endif
        @endforeach --}}


        @foreach ($list_menu as $row_menu)
        @if ($row_menu->MenuSub->count())
        <div class="col-sm-2">
            <div class="single-widget">
                <h2>{{$row_menu->name}}</h2>
                <ul class="nav nav-pills nav-stacked">
                    @foreach ($row_menu->MenuSub as $menu_sub)
                    @if($menu_sub->status==1)
                        <li><a href="{{route('slug.home',['slug'=>$menu_sub->link])}}">{{$menu_sub->name}}</a></li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        @endforeach

        <div class="col-sm-3 col-sm-offset-1">
            <div class="single-widget">
                <h2>Thông tin liên hệ</h2>
                <address>
                    <p>{{$config->shop_name}}</p>
                    <p>SĐT: {{$config->phone}}</p>
                    <p>{{$config->email}}</p>
                    <p>Địa chỉ: {{$config->address}}</p>
                </address>
                <div class="social-networks">
                    {{-- <ul>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </li>
                    </ul> --}}
                    <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="300" data-height="70" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
                </div>
            </div>
        </div>

    </div>
</div>
