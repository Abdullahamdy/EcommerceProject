@php
    $current_page = \Route::currentRouteName();

@endphp

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{config('app.name')}} </div>
    </a>
    <hr class="sidebar-divider my-0">
    @role(['admin'])

    @foreach($admin_side_menu as $menu)
        @if(count($menu->appearChildren) == 0)

            <li class="nav-item {{$menu->id == getParentShowOf($current_page) ? 'active' : null}}">

                <a href="{{route('admin.'. $menu->as)}}" class="nav-link">
                    <i class="{{$menu->icon != ''  ? $menu->icon: 'fas-fa-home'}}"></i>
                    <span>{{$menu->display_name}}</span></a>
            </li>

            <hr class="sidebar-divider">

        @else
        <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{in_array($menu->parent_show,[getParentShowOf($current_page),getParentOf($current_page)]) ? 'active':null}}">
                <a class="nav-link {{in_array($menu->parent_show,[getParentShowOf($current_page),getParentOf($current_page)]) ? 'collapsed':null}}"
                   href="#"
                   data-toggle="collapse"
                   data-target="#collapse_{{$menu->route}}"
                   aria-expanded="{{$menu->parent_show == getParentOf($current_page) && getParentOf($current_page) != '' ? 'false': 'true'}}"
                   aria-controls="collapse_{{$menu->route}}">
                    <i class="{{$menu->icon != ''  ? $menu->icon: 'fas-fa-home'}}"></i>
                    <span>{{$menu->display_name}}</span>
                </a>


                @if($menu->appearChildren !== null && count($menu->appearChildren) > 0)

                    <div id="collapse_{{$menu->route}}"

                         class="collapse {{in_array($menu->parent_show,[getParentShowOf($current_page),getParentOf($current_page)]) ? 'show' : null}}"
                         aria-labelledby="heading_{{$menu->route}}"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @foreach($menu->appearChildren as $sub_menu)

                                <a
                                    class="collapse-item {{getParentOf($current_page) != null && (int) (getParentIdOf($current_page)+1) == $sub_menu->id ? 'active': null}}"
                                    href="{{route('admin.'.$sub_menu->as)}}">{{$sub_menu->display_name}}</a>
                            @endforeach
                        </div>
                    </div>

                @endif
            </li>



        @endif




    @endforeach
    @endrole


    @role(['supervisor'])

    @foreach($admin_side_menu as $menu)
        @permission($menu->name)


        @if(count($menu->appeardChildren) == 0)


        <!-- Nav Item - Dashboard -->
            <li class="nav-item {{$menu->id == getParentShowOf($current_page) ? active : null}}">
                <a href="{{route('admin.'.$menu->as)}}" class="nav-link">
                    <i class="{{$menu->icon != ''  ? $menu->icon: 'fas-fa-home'}}"></i>
                    <span>{{$menu->display_name}}</span></a>
            </li>

            <hr class="sidebar-divider">

        @else
        <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{in_array($menu->parent_show,[getParentShowOf($current_page),getParentOf($current_page)] ? 'active':null)}}">
                <a class="nav-link {{in_array($menu->parent_show,[getParentShowOf($current_page),getParentOf($current_page)] ? 'collapsed':null)}}"
                   href="#" data-toggle="collapse"
                   data-target="#collapse{{$menu->route}}"
                   aria-expanded="{{$menu->parent_show == getParentOf($current_page) && getParentOf($current_page) != '' ? 'false': 'true'}}"
                   aria-controls="collapse{{$menu->route}}">
                    <i class="{{$menu->icon != ''  ? $menu->icon: 'fas-fa-home'}}"></i>
                    <span>{{$menu->display_name}}</span>
                </a>
                @if($menu->appeardChildren && count($menu->appeardChildren) > 0 != null)
                    @dd(2)
                    <div id="collapse{{$menu->route}}"
                         class="collapse {{in_array($menu->parent_show,[getParentShowOf($current_page),getParentOf($current_page)] ? 'show':null)}}"
                         aria-labelledby="heading{{$menu->route}}"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @foreach($menu->appeardChildren as $sub_menu)
                                @permission($sub_menu->name)
                                <a class="collapse-item {{getParentOf($current_page) != null && (int) (getParentIdOf($current_page)+1) == $sub_menu->id ? 'active': null}}"
                                   href="{{route('admin.'.$sub_menu->as)}}">{{$sub_menu->display_name}}</a>
                                @endpermission
                            @endforeach
                        </div>
                    </div>

                @endif
            </li>



        @endif
        @endpermission




    @endforeach
    @endrole


</ul>
<!-- End of Sidebar -->
