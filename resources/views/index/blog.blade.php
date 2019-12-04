<div id="colorlib-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                <h2>{{__('index/blog.title')}}</h2>
                <p>{{__('index/blog.text')}}</p>
            </div>
        </div>
        <div class="blog-flex">
            <div class="f-entry-img" style="background-image: url({{ asset('img/blog-3.jpg') }});">
            </div>
            <div class="blog-entry aside-stretch-right">
                <div class="row">
                    <div class="col-md-12 animate-box">
                        <a href="#" class="blog-post">
                            <span class="img" style="background-image: url({{ asset('img/blog-1.jpg') }});"></span>
                            <div class="desc">
                                <span class="date">04-06-2019</span>
                                <h3>{{__('index/blog.first_title')}}</h3>
                                <span class="cat">{{__('index/blog.activities')}}</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 animate-box">
                        <a href="#" class="blog-post">
                            <span class="img" style="background-image: url({{ asset('img/blog-2.jpg') }});"></span>
                            <div class="desc">
                                <span class="date">01-09-2019</span>
                                <h3>{{__('index/blog.second_title')}}</h3>
                                <span class="cat">{{__('index/blog.activities')}}</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 animate-box">
                        <a href="#" class="blog-post">
                            <span class="img" style="background-image: url({{ asset('img/blog-4.jpg') }});"></span>
                            <div class="desc">
                                <span class="date">08-12-2019</span>
                                <h3>{{__('index/blog.third_title')}}</h3>
                                <span class="cat">{{__('index/blog.activities')}}</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
