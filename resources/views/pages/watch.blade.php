@extends('layout')
@section('content')
<div class="row container" id="wrapper">
   <div class="halim-panel-filter">
      <div class="panel-heading">
         <div class="row">
            <div class="col-xs-6">
               <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{$movie->title}}</a> » <span><a href="{{route('country',[$movie->country->slug])}}">{{$movie->country->title}}</a>
                           » <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span></span></span></span></div>
            </div>
         </div>
      </div>
      <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
         <div class="ajax"></div>
      </div>
   </div>
   <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
      <section id="content" class="test">
         <div class="clearfix wrap-content">
            <style type="text/css">
               .iframe_phim iframe
               {
                  width: 100%;
                  height: 500px;
               }
            </style>
           <div class="iframe_phim">
           {!!$episode->linkphim!!}
           </div>
          
        
            <!-- <div class="button-watch">
               <ul class="halim-social-plugin col-xs-4 hidden-xs">
                  <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
               </ul>
               <ul class="col-xs-12 col-md-8">
                  <div id="autonext" class="btn-cs autonext">
                     <i class="icon-autonext-sm"></i>
                     <span><i class="hl-next"></i> Autonext: <span id="autonext-status">On</span></span>
                  </div>
                  <div id="explayer" class="hidden-xs"><i class="hl-resize-full"></i>
                     Expand
                  </div>
                  <div id="toggle-light"><i class="hl-adjust"></i>
                     Light Off
                  </div>
                  <div id="report" class="halim-switch"><i class="hl-attention"></i> Report</div>
                  <div class="luotxem"><i class="hl-eye"></i>
                     <span>1K</span> lượt xem
                  </div>
                  <div class="luotxem">
                     <a class="visible-xs-inline" data-toggle="collapse" href="#moretool" aria-expanded="false" aria-controls="moretool"><i class="hl-forward"></i> Share</a>
                  </div>
               </ul>
            </div> -->
            <div class="collapse" id="moretool">
               <ul class="nav nav-pills x-nav-justified">
                  <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                  <div class="fb-save" data-uri="" data-size="small"></div>
               </ul>
            </div>

            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <div class="title-block">
               <a href="javascript:;" data-toggle="tooltip" title="Add to bookmark">
                  <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="37976">
                     <div class="halim-pulse-ring"></div>
                  </div>
               </a>
               <div class="title-wrapper-xem full">
                  <h1 class="entry-title"><a href="" title="{{$movie->title}}" class="tl">{{$movie->title}}</a>
                  </h1>
               </div>
            </div>
            <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
               <article id="post-37976" class="item-content post-37976"></article>
            </div>
            <div class="clearfix"></div>
            <div class="text-center">
               <div id="halim-ajax-list-server"></div>
            </div>
            <div id="halim-list-server">
               <ul class="nav nav-tabs" role="tablist">
                  @if($movie->resolution==0)
                  <li role="presentation" class="active "><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl"></i> HD</a></li>

                  @elseif($movie->resolution==1)
                  <li role="presentation" class="active "><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl"></i> SD</a></li>

                  @elseif($movie->resolution==2)
                  <li role="presentation" class="active "><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl"></i> HDCam</a></li>

                  @elseif($movie->resolution==3)
                  <li role="presentation" class="active "><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl"></i> Cam</a></li>

                  @elseif($movie->resolution==4)
                  <li role="presentation" class="active "><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl"></i> FullHD</a></li>

                  @elseif($movie->resolution==5)
                  <li role="presentation" class="active "><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl"></i> Trailer</a></li>

                  @endif
                  <li role="presentation" class="active "><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl"></i>Vietsub</a></li>
               </ul>
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                     <div class="halim-server">
                        <ul class="halim-list-eps">
                           @foreach($movie->episode as $key=> $sotap)
                           <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$sotap->episode)}}">
                              <li class="halim-episode"><span class="halim-btn halim-btn-2 {{$tapphim==$sotap->episode ? 'active' : ''}} halim-info-1-1 box-shadow"  data-post-id="37976" data-server="1" data-episode="1" data-position="first" data-embed="0"
                               data-title="{{$movie->title}} - Tập {{$movie->episode}} - {{$movie->name_eng}} - vietsub + Thuyết Minh" data-h1="{{$movie->title}} - tập {{$movie->sotap}}">{{$sotap->episode}}</span></li>
                           </a>
                            @endforeach
                        </ul>
                        <div class="clearfix"></div>

                     </div>
                  </div>
               </div>



      </section>
      <section class="related-movies">
            <div id="halim_related_movies-2xx" class="wrap-slider">
                <div class="section-bar clearfix">
                    <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                </div>
                <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                    @foreach($related as $key => $hot)
                    <article class="thumb grid-item post-38498">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{route('movie',$hot->slug)}}" title="{{$hot->title}}">
                                <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$hot->image)}}" alt="{{$hot->title}}" title="Đại Thánh Vô Song"></figure>
                                <span class="status">
                                    @if($hot->resolution==0)
                                    HD
                                    @elseif($hot->resolution==1)
                                    SD
                                    @elseif($hot->resolution==2)
                                    HDCam
                                    @elseif($hot->resolution==3)
                                    Cam
                                    @elseif($hot->resolution==4)
                                    FullHD
                                    @elseif($hot->resolution==5)
                                    Trailer
                                    @endif
                                </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                    @if($hot->phude==0)
                                    Phụ đề
                                    @if($hot->season!=0)
                                    - Season{{$hot->season}}
                                    @endif
                                    @elseif($hot->phude==1)
                                    Thuyết Minh
                                    @if($hot->season!=0)
                                    - Season {{$hot->season}}
                                    @endif
                                    @endif
                                </span>
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">{{$hot->title}}</p>
                                        <p class="original_title">{{$hot->name_eng}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>
                    @endforeach

                </div>
                <script>
                    $(document).ready(function($) {
                        var owl = $('#halim_related_movies-2');
                        owl.owlCarousel({
                            loop: true,
                            margin: 4,
                            autoplay: true,
                            autoplayTimeout: 4000,
                            autoplayHoverPause: true,
                            nav: true,
                            navText: ['<i class="hl-down-open rotate-left"></i>',
                                '<i class="hl-down-open rotate-right"></i>'
                            ],
                            responsiveClass: true,
                            responsive: {
                                0: {
                                    items: 2
                                },
                                480: {
                                    items: 3
                                },
                                600: {
                                    items: 4
                                },
                                1000: {
                                    items: 4
                                }
                            }
                        })
                    });
                </script>
            </div>

        </section>
   </main>
   <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
      <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
         <div class="section-bar clearfix">
            <div class="section-title">
               <span>Top Views</span>

            </div>
         </div>
         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item active">
               <a class="nav-link filter-sidebar" id="pill-home" data-toggle="pill" href="#ngay" role="tab" aria-controls="pills-home" aria-selected="true">Ngày</a>
            </li>
            <li class="nav-item">
               <a class="nav-link filter-sidebar" id="pill-tab" data-toggle="pill" href="#tuan" role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
            </li>
            <li class="nav-item">
               <a class="nav-link filter-sidebar" id="pill-contact" data-toggle="pill" href="#thang" role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
            </li>
         </ul>

         <div class="tab-content" id="pills-tabContent">
            <div id="halim-ajax-popular-post-default" class="popular-post">
               <span id="show_data_default"></span>
            </div>

            <div class="tab-pane fade show " id="tuan" role="tabpanel" aria-labelledby="ngay-tab">
               <div id="halim-ajax-popular-post" class="popular-post">
                  <span id="show_data"></span>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
      </div>
   </aside>
   <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
      <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
         <div class="section-bar clearfix">
            <div class="section-title">
               <span>Phim Sắp Chiếu </span>

            </div>
         </div>
         <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
               <div class="halim-ajax-popular-post-loading hidden"></div>
               <div id="halim-ajax-popular-post" class="popular-post">
                  @foreach($phim_sapchieu as $key => $hot_sidebar)
                  <div class="item post-37176">
                     <a href="{{route('movie',$hot_sidebar->slug)}}" title="{{$hot_sidebar->title}}">
                        <div class="item-link">
                           <img src="{{asset('uploads/movie/'.$hot_sidebar->image)}}" class="lazy post-thumb" alt="{{$hot_sidebar->title}}" title="{{$hot_sidebar->title}}" />
                           <span class="is_trailer">
                              @if($hot_sidebar->resolution==0)
                              HD
                              @elseif($hot_sidebar->resolution==1)
                              SD
                              @elseif($hot_sidebar->resolution==2)
                              HDCam
                              @elseif($hot_sidebar->resolution==3)
                              Cam
                              @elseif($hot_sidebar->resolution==4)
                              FullHD
                              @elseif($hot_sidebar->resolution==5)
                              Trailer
                              @endif
                           </span>
                        </div>
                        <p class="title">{{$hot_sidebar->title}}</p>
                     </a>
                     <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                     <div style="float: left;">
                        <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                        </span>
                     </div>
                  </div>
                  @endforeach


               </div>
            </div>
         </section>
         <div class="clearfix"></div>
      </div>
   </aside>

   <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
      <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
         <div class="section-bar clearfix">
            <div class="section-title">
               <span>Phim Hot</span>

            </div>
         </div>
         <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
               <div class="halim-ajax-popular-post-loading hidden"></div>
               <div id="halim-ajax-popular-post" class="popular-post">
                  @foreach($phimhot_sidebar as $key => $hot_sidebar)
                  <div class="item post-37176">
                     <a href="{{route('movie',$hot_sidebar->slug)}}" title="{{$hot_sidebar->title}}">
                        <div class="item-link">
                           <img src="{{asset('uploads/movie/'.$hot_sidebar->image)}}" class="lazy post-thumb" alt="{{$hot_sidebar->title}}" title="{{$hot_sidebar->title}}" />
                           <span class="is_trailer">
                              @if($hot_sidebar->resolution==0)
                              HD
                              @elseif($hot_sidebar->resolution==1)
                              SD
                              @elseif($hot_sidebar->resolution==2)
                              HDCam
                              @elseif($hot_sidebar->resolution==3)
                              Cam
                              @elseif($hot_sidebar->resolution==4)
                              FullHD
                              @elseif($hot_sidebar->resolution==5)
                              Trailer
                              @endif
                           </span>
                        </div>
                        <p class="title">{{$hot_sidebar->title}}</p>
                     </a>
                     <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                     <div style="float: left;">
                        <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                        </span>
                     </div>
                  </div>
                  @endforeach


               </div>
            </div>
         </section>
         <div class="clearfix"></div>
      </div>
   </aside>


</div>
@endsection