<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="/">Trang chủ</a></li>
                @foreach ($category as $item)
                    <li><a href="/category/{{ $item->id }}">{{ $item->name }}</a></li>
                @endforeach


                <li><a href="#">Liên hệ</a></li>

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
