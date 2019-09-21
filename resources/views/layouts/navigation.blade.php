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
                            <li><a href="{{ route('login') }}">Sign In</a></li>
                        @else
                            <li><a href="{{ route('user.index') }}">Dashboard</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Sign Out</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>