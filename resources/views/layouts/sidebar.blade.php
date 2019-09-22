<div class="col-one-forth aside-stretch animate-box">
    <div class="row">
        <div class="col-md-12 about">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="#">Wishlist <span class="media-left"></span><i class="fa fa-heart"></i></a></li>
                <li><a href="#">Cart <span class="media-left"></span><i class="ml-4 fa fa-cart-arrow-down"></i></a></li>
                <li><a href="#">Orders <span class="media-left"></span><i class="ml-4 fa fa-wpexplorer"></i></a></li>
                <li><a href="#">Notification <i class="ml-4 fa fa-bell"></i></a></li>
                <li><a href="#">Settings <span class="media-left"></span><i class="fa fa-cog"></i></a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout <span class="media-left"></span><i class="fa fa-key"></i></a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>