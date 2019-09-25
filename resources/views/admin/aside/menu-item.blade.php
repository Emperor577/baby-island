<li @isset($className) class="{{ $className }} @if(strpos(url()->current(), $key_name)) active @endif" @endisset>
    <a href="{{ $link }}">
        <i class="menu-icon @isset($icon) {{ $icon }} @endisset"></i>{{ $name }}
    </a>
</li>