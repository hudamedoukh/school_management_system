 @php
    $menu_name =' ';
    $page_title1=' ';
    $link_page1='';
    $page_title2 = ' ';
    $page_title3 ='';


@endphp
@section()
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">{{ $menu_name }}</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ $link_page1 }}"><i class="mdi mdi-home-outline"></i>{{ $page_title1 }}</a></li>
                        <li class="breadcrumb-item" aria-current="page">{{ $page_title2 }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page_title3 }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
