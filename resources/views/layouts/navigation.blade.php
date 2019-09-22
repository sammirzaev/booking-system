<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-2">
                    <div id="colorlib-logo"><a href="{{ route('index') }}">SAYYAH.UZ</a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li class="active"><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="#">Hotels</a></li>
                        <li><a href="#">Cars</a></li>
                        <li><a href="#">Tours</a></li>
                        <li><a href="#">Activities</a></li>
                        <li><a href="#">Flight</a></li>
                        <li><a href="#">Train</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        @if(auth()->guest())
                            <li class="has-dropdown">
                                <a href="{{ route('login') }}">
                                    Login
                                </a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('register') }}">Register </a></li>
                                </ul>
                            </li>
                        @else
                            <li class="has-dropdown">
                                <a href="#">
                                    Dashboard
                                </a>
                                <ul class="dropdown">
                                    <li><a href="#"><i class="fa fa-heart"></i> Wishlist </a></li>
                                    <li><a href="#"><i class="fa fa-cart-arrow-down"></i> Cart </a></li>
                                    <li><a href="#"><i class="fa fa-wpexplorer"></i> Orders </a></li>
                                    <li><a href="#"><i class="fa fa-bell"></i> Notification </a></li>
                                    <li><a href="#"><i class="fa fa-cog"></i> Settings </a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-key"></i> Logout </a></li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>