<li class="nav-item">
    <a @php
    if($link!=""){ echo 'href="'.url('/').$link.'"';}
    @endphp
    class="nav-link " @php if(isset($onclick)){ echo 'onclick="' .$onclick.'"'; } @endphp>
        <i class="{{$icon}}"></i>
        <p>{{$text}}</p>
    </a>
</li>