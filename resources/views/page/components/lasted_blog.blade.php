<section id="latest-blog" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-heading">
                    <h2>Our Latest Blogs</h2>
                    <hr class="heading-line" />
                </div>

                <div class="row">
                    @if ($blogs)
                        @foreach ($blogs as $blog)
                        <div class="col-sm-6 col-md-4">
                            <div class="main-block latest-block">
                                <div class="main-img latest-img">
                                    <a href="#">
                                        <img
                                            src="{{ asset('upload/images/' .'/'. $blog->image) }}"
                                            class="img-responsive"
                                            alt="blog-img"
                                            style="width:360px; height:208px;"
                                        />
                                    </a>
                                </div>
                                <!-- end latest-img -->
    
                                <div class="latest-info">
                                    <ul class="list-unstyled">
                                        <li>
                                            <span
                                                ><i
                                                    class="fa fa-calendar-minus-o"
                                                ></i></span
                                            >{{ $blog->created_at }}<span class="author"
                                                >bởi:
                                                <a href="#">{{ $blog->author }}</a></span
                                            >
                                        </li>
                                    </ul>
                                </div>
                                <!-- end latest-info -->
    
                                <div class="main-info latest-desc">
                                    <div class="row">
                                        <div class="col-xs-10 col-sm-10 main-title">
                                            <a href="#">{{ $blog->title }}</a>
                                            <div style="height: 100px">
                                                {!! substr($blog->description, 0, 150) !!}
                                            </div>
                                        </div>
                                        <!-- end columns -->
                                    </div>
                                    <!-- end row -->
    
                                    <span class="arrow"><a href="#"><i class="fa fa-angle-right"></i></a></span>
                                </div>
                                <!-- end latest-desc -->
                            </div>
                            <!-- end latest-block -->
                        </div>
                        @endforeach
                    @endif
                   
                    <!-- end columns -->
                </div>
                <!-- end row -->

                <div class="view-all text-center">
                    <a href="#" class="btn btn-orange">Xem thêm</a>
                </div>
                <!-- end view-all -->
            </div>
            <!-- end columns -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end latest-blog -->

