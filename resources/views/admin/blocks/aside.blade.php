<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
            @component('admin.aside.menu-item', [
                'link' => route('admin.index'),
                'icon' => 'fa fa-laptop',
                'name' => 'Dashboard',
             ]) @endcomponent

            <!-- /.menu-title -->
                @component('admin.aside.menu-title', [
                    'name' => 'Elements'
                ]) @endcomponent

                @component('admin.aside.menu-item', [
                    'link' => '',
                    'icon' => 'fa fa-bars',
                    'name' => 'Меню',
                ]) @endcomponent
                @component('admin.aside.menu-item', [
                    'link' => route('admin.sliders.index'),
                    'icon' => 'fa fa-television',
                    'name' => 'Слайдер',
                ]) @endcomponent
                @component('admin.aside.menu-item',[
                    'link' => route('admin.about-us.index'),
                    'icon' => 'fa fa-address-card-o',
                    'name' => 'О нас',
                ]) @endcomponent
                @component('admin.aside.menu-item',[
                    'link' => route('admin.testimonial.index'),
                    'icon' => 'fa fa-commenting-o',
                    'name' => 'Отзывы'
                ]) @endcomponent
                @component('admin.aside.menu-item',[
                      'link' => route('admin.gallery.index'),
                      'icon' => 'fa fa-picture-o',
                      'name' => 'Галерея'
                  ]) @endcomponent
                @component('admin.aside.menu-item',[
                      'link' => route('admin.staff.index'),
                      'icon' => 'fa fa-users',
                      'name' => 'Наш персонал'
                  ]) @endcomponent
                @component('admin.aside.menu-item',[
                    'link' => route('admin.price.index'),
                    'icon' => 'fa fa-users',
                    'name' => 'Порайст лист'
                ]) @endcomponent

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
