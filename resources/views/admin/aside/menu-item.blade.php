<li @isset($className) class="{{ $className }}" @endisset>
    <a href="{{ $link }}">
        <i class="menu-icon @isset($icon) {{ $icon }} @endisset"></i>{{ $name }}
    </a>
</li>