<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">

            @foreach(admin_sidebar() as $item)
                @if(isset($item['items']))
                    @if(isset($item['permission']) && Entrust::can($item['permission']) || Entrust::hasRole('root'))
                        <li class="sub-menu">
                            <a href="javascript:;" class="{{ isset($item['pattern_active']) ? (Request::is($item['pattern_active']) ? 'active': '') : '' }}">
                                <i class="{{ array_get($item, 'icon') }}"></i>
                                <span>{{ array_get($item, 'title') }}</span>
                            </a>
                            <ul class="sub">
                            @foreach($item['items'] as $subItem)
                                <li class="{{ isset($subItem['pattern_active']) ? (Request::is($subItem['pattern_active']) ? 'active': '') : '' }}">
                                    <a href="{{ array_get($subItem, 'url') }}">{{ array_get($subItem, 'title') }}</a>
                                </li>
                            @endforeach
                            </ul>
                        </li>
                    @endif
                @else
                    @if(isset($item['permission'])
                        && Entrust::can($item['permission'])
                        && array_get($item, 'active') == 1
                        || Entrust::hasRole('root') && array_get($item, 'active') == 1)
                    <li>
                        <a class="{{ isset($item['pattern_active']) ? (Request::is($item['pattern_active']) ? 'active': '') : '' }}" href="{{ array_get($item, 'url') }}">
                            <i class="{{ array_get($item, 'icon') }}"></i>
                            <span>{{ array_get($item, 'title') }}</span>
                        </a>
                    </li>
                    @endif
                @endif
            @endforeach
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
