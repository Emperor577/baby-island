<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="menu-icon {{ $parentIcon }}"></i>{{ $parentName }}
    </a>
    <ul class="sub-menu children dropdown-menu">
        <?php $i = 0; $l = 0; ?>

        @foreach(array_get($children, 'names') as $child)
            <li>
                <i class="{{ array_get($children, 'icons')[$i++] }}"></i>
                <a href="{{ array_get($children, 'links')[$l++] }}">{{ $child }}</a>
            </li>
        @endforeach
    </ul>
</li>