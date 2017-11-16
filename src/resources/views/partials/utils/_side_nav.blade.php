@if($side_nav && $side_nav['show'])
<div class="sidebar-wrapper @if($side_nav['theme']=='dark') sidebar-dark @endif">
    <ul class="sidebar-nav" id="sidebar">
        @foreach($side_nav['buttons'] as $button)
        <li>
            <a href="{!! url($button['route']) !!}" @if(Request::path()==$button['route']) class="active" @endif><span class="sub_icon glyphicon glyphicon-dashboard"></span> {{ $button['title'] }}</a>
        </li>
        @endforeach
    </ul>
</div>
@endif
