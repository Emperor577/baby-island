<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
            @component('admin.aside.menu-item', [
                'className' => 'active',
                'link' => route('admin.index'),
                'icon' => 'fa fa-laptop',
                'name' => 'Dashboard'
             ]) @endcomponent

            <!-- /.menu-title -->
                @component('admin.aside.menu-title', [
                    'name' => 'Elements'
                ]) @endcomponent

                @component('admin.aside.menu-item', [
                    'link' => '',
                    'icon' => 'fa fa-id-card-o',
                    'name' => 'Consumers'
                ]) @endcomponent
                @component('admin.aside.menu-item', [
                    'link' => '',
                    'icon' => 'fa fa-television',
                    'name' => 'Sliders'
                ]) @endcomponent
                @component('admin.aside.menu-item',[
                    'link' => '',
                    'icon' => 'fa fa-shopping-cart',
                    'name' => 'Products'
                ]) @endcomponent
                @component('admin.aside.menu-item',[
                    'link' => '',
                    'icon' => 'fa fa-cart-arrow-down',
                    'name' => 'Orders'
                ]) @endcomponent
              
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
