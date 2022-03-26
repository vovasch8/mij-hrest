<!-- Inner sidebar -->
<div class="inner-sidebar">
    <!-- Inner sidebar header -->
    <div class="inner-sidebar-header justify-content-center">
        <button  class="btn btn-primary has-icon btn-block" type="button" @auth  data-toggle="modal" data-target="#createTopicModal" @else onclick="window.location.href='{{route('login')}}'" @endauth>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-2">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Нова Тема
        </button>
    </div>
    <!-- /Inner sidebar header -->

    <!-- Inner sidebar body -->
    <div class="inner-sidebar-body p-0">
        <div class="p-3 h-100" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: -16px;">
                <div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" style="height: 100%; ">
                            <div class="simplebar-content" style="padding: 16px;">
                                <nav id="nav-category" @if(isset($active) && $active) active-category="{{$active}}" @else active-category="0" @endif class="nav nav-pills nav-gap-y-1 flex-column">
                                    <a category_id="0" href="{{route('forum')}}" class="nav-link nav-link-faded has-icon">Всі категорії</a>
                                    @foreach($categories as $category)
                                        <a category_id="{{$category->id}}" href="{{route('filter-topics', $category->id)}}" class="nav-link nav-link-faded has-icon">{{$category->name}}</a>
                                    @endforeach
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: 234px; height: 292px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 151px; display: block; transform: translate3d(0px, 0px, 0px);"></div></div>
        </div>
    </div>
    <!-- /Inner sidebar body -->
</div>
<!-- /Inner sidebar -->

<script>
    let active = document.getElementById('nav-category').getAttribute('active-category');
    document.querySelector("a[category_id='"+ active +"']").classList.add('active');
</script>
