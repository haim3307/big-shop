<div class="col-lg-3 col-md-3 pull-left col-xs-12">
    <aside class="sidebar sidebar-left" itemscope="itemscope">
        <aside id="categories-31" class="widget widget-style clearfix widget_categories">
            <h3 class="widget-title"><span><span>By Categories</span></span>
            </h3>
            <ul>
                @foreach(\App\Category::orderBy('name', 'ASC')->get() as $category)
                    <li class="cat-item cat-item-31 current-cat"><a
                                href="{{url('blog/category/'.$category->url)}}">{{$category->name}}</a></li>
                @endforeach
                <li class="cat-item cat-item-33"><a href="http://demo3.wpopal.com/exgym/category/uncategorized/">Uncategorized</a>
                </li>
            </ul>
        </aside>
        <aside id="tag_cloud-19" class="widget widget-style clearfix widget_tag_cloud">
            <h3 class="widget-title"><span><span>Product Tags</span></span>
            </h3>
            <div class="tagcloud">
                @foreach (\App\Tag::limit(20)->get() as $tag)
                    <a href="" class="tag-cloud-link tag-link-73 tag-link-position-1"
                       style="font-size: 22pt;" aria-label="{{$tag->name}} (8 items)">{{$tag->name}}</a>
                @endforeach
            </div>
        </aside>
        <aside id="wpopal_latest_posts-10" class="widget widget-style clearfix widget_wpopal_latest_posts">
            <h3 class="widget-title"><span><span>Recent Posts</span></span></h3>
            @foreach(\App\Post::limit(5)->orderByDesc('created_at')->get() as $post)
                <div class="blog-post">
                    <div class="item">
                        <div class="content-blog">
                            <div class="image-thumnail">

                                <a class="post-thumbnail" href="{{url('post/'.$post->url)}}" aria-hidden="true">
                                    <img width="1665" class="img-fluid" height="1143"
                                         src="{{asset('_img/posts/'.$post->main_img)}}" alt=""/> </a>

                            </div>
                            <div class="bottom-blog">
                                <h3 class="title-post"><a href="{{url('post/'.$post->url)}}"
                                                          rel="bookmark">{{$post->title}}</a></h3>
                                <div class="author">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i> By <a href="#admin"
                                                                                               title="Posts by admin"
                                                                                               rel="author">{{$post->author->name}}</a>
                                </div>

                                <div class="date">
                                    <i class="fa fa-calendar-o"></i>
                                    <div class="entry-date " data-time="{{$post->created_at}}"><span class="date-day ">{{$post->created_at->day}}</span>.<span
                                                class="date-month ">{{$post->created_at->format('M')}}</span>.<span
                                                class="date-border "></span><span class="date-year ">{{$post->created_at->year}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </aside>
    </aside>
</div>