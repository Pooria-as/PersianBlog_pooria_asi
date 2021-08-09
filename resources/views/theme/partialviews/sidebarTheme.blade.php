 
                    <div class="single_widget cat_widget">
                        <h4 class="text-uppercase pb-20">گروه های خبری</h4>
                        <ul>
                            @foreach ($categories as $category)
                            <li>
                                <a href="#">
                                    {{$category->name}}
                                    <span>
                                    {{$category->posts->count()}}    
                                    </span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="single_widget recent_widget" dir="ltr">
                        <h4 class="text-uppercase pb-20">آخرین خبرهای ارسالی</h4>
                        <div class="active-recent-carusel">
                         @foreach ($lastesNews as $single)
                         <div class="item">
                            <img src="/{{$single->image}}" alt="">
                            <p class="mt-20 title text-uppercase">
                                    <a href="{{route("single",$single->slug)}}">
                                        {{$single->title}}</a>
                                <br>
                            </p>
                            <p>تاریخ : {{\Morilog\Jalali\Jalalian::forge($single->created_at)->format('%B %d، %Y')}} <span> <i class="fa fa-heart-o" aria-hidden="true"></i>
                                {{$post->comments->count()}} <i class="fa fa-comment-o" aria-hidden="true"></i>
                                 {{$post->like}}
                            </span></p>
                        </div>
                         @endforeach
                         
                        </div>
                    </div>
                 
                    <div class="single_widget tag_widget">
                        <h4 class="text-uppercase pb-20">برچسب ها</h4>
                        <ul>
                            @foreach ($tags as $tag)
                            <li><a href="#">
                            {{$tag->name}}    
                            </a></li>
                            @endforeach
                        </ul>
                    </div>