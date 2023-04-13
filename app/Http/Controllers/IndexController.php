<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Builder;
class IndexController extends Controller
{
    public function timkiem()
    {
        if(isset($_GET['search']))
        {
            $search= $_GET['search'];
            $category = Category::orderBy('position','ASC')->where('status',1)->get();
            $genre = Genre::orderBy('id','DESC')->get();
            $country = Country::orderBy('id','DESC')->get();
            $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('update_at','DESC')->take('20')->get();
            $phim_sapchieu = Movie::where('resolution',5)->where('status',1)->orderBy('update_at','DESC')->take('10')->get();
            $movie = Movie::withCount('episode')->where('title','LIKE','%'.$search.'%')->orderBy('update_at','DESC')->paginate(40);

            return view('pages.search', compact('category','search','genre','country','movie','phimhot_sidebar','phim_sapchieu'));
        }
        else
        {
            return redirect()->to('/');

        }
      
    }
    public function home(){
        $phimhot = Movie::withCount('episode')->where('phim_hot',1)->where('status',1)->orderBy('update_at','DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('update_at','DESC')->take('20')->get();
        $phim_sapchieu = Movie::where('resolution',5)->where('status',1)->orderBy('update_at','DESC')->take('10')->get();
        $category = Category::orderBy('position','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $category_home = Category::with(['movie'=>function($q)
        {
            //nested 
            $q->withCount('episode')->where('status',1);
        }])->orderBy('id','DESC')->where('status',1)->get();
    	return view('pages.home', compact('category','genre','country','category_home','phimhot','phimhot_sidebar','phim_sapchieu'));
    }
    public function category($slug){
        $category = Category::orderBy('position','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('update_at','DESC')->take('20')->get();
        $phim_sapchieu = Movie::where('resolution',5)->where('status',1)->orderBy('update_at','DESC')->take('10')->get();
        $cate_slug = Category::where('slug',$slug)->first();
        $movie = Movie::withCount('episode')->where('category_id',$cate_slug->id)->orderBy('update_at','DESC')->paginate(40);
    	return view('pages.category', compact('category','genre','country','cate_slug','movie','phimhot_sidebar','phim_sapchieu'));
    }
    public function year($year){
        $category = Category::orderBy('position','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('update_at','DESC')->take('20')->get();
        $phim_sapchieu = Movie::where('resolution',5)->where('status',1)->orderBy('update_at','DESC')->take('10')->get();
      $year= $year;
        
        $movie = Movie::withCount('episode')->where('year',$year)->orderBy('update_at','DESC')->paginate(40);
    	return view('pages.year', compact('category','year','genre','country','movie','phimhot_sidebar','phim_sapchieu'));
    }
    public function tag($tag){
        $category = Category::orderBy('position','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('update_at','DESC')->take('20')->get();
        $phim_sapchieu = Movie::where('resolution',5)->where('status',1)->orderBy('update_at','DESC')->take('10')->get();
        $country = Country::orderBy('id','DESC')->get();
        $tag= $tag;
        
        $movie = Movie::withCount('episode')->where('tags','LIKE','%'.$tag.'%')->orderBy('update_at','DESC')->paginate(40);
        
    	return view('pages.tag', compact('category','tag','genre','country','movie','phimhot_sidebar','phim_sapchieu'));
    }
    public function genre($slug){
        $category = Category::orderBy('position','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phimhot_sidebar = Movie::withCount('episode')->where('phim_hot',1)->where('status',1)->orderBy('update_at','DESC')->take('20')->get();
        $phim_sapchieu = Movie::where('resolution',5)->where('status',1)->orderBy('update_at','DESC')->take('10')->get();
        $genre_slug = Genre::where('slug',$slug)->first();
        // nhieu the loai

        $movie_genre=Movie_Genre::where('genre_id',$genre_slug->id)->get();
        $many_genre = [];
        foreach($movie_genre as $key => $movi)
        {
            $many_genre[]=$movi->movie_id;

        }
        // return response()->json($many_genre);
        $movie =Movie::withCount('episode')->whereIN('id',$many_genre)->orderBy('update_at','DESC')->paginate(40);
    	return view('pages.genre', compact('category','genre','country','genre_slug','movie','phimhot_sidebar','phim_sapchieu','movie'));
    }
    public function country($slug){
        $category = Category::orderBy('position','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('update_at','DESC')->take('20')->get();
        $phim_sapchieu = Movie::where('resolution',5)->where('status',1)->orderBy('update_at','DESC')->take('10')->get();
        $country_slug = Country::where('slug',$slug)->first();
        $movie = Movie::withCount('episode')->where('country_id',$country_slug->id)->orderBy('update_at','DESC')->paginate(40);
    	return view('pages.country', compact('category','genre','country','country_slug','movie','phimhot_sidebar','phim_sapchieu'));
    }
    public function movie($slug){
        $category = Category::orderBy('position','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('update_at','DESC')->take('20')->get();
        
        $phim_sapchieu = Movie::where('resolution',5)->where('status',1)->orderBy('update_at','DESC')->take('10')->get();
        $movie = Movie::with('category','genre','country','movie_genre')->where('slug',$slug)->where('status',1)->first();
        $episode_tapdau= Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','ASC')->take(1)->first();
        //lấy 3 tập gần nhất          
        $episode=Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','DESC')->take(3)->get();
         //lấy tổng tập phim đã thêm           
         $episode_current_list=Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','DESC')->get();
         $episode_current_count=  $episode_current_list->count();
         $rating= Rating::where('movie_id',$movie->id)->avg('rating');
         $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
         $rating= round($rating);
         $count_view=$movie->count_view;
         $count_view= $count_view + 1;
         $movie->count_view=  $count_view;
      
         $count_total=Rating::where('movie_id',$movie->id)->count();
         $movie->save();
    	return view('pages.movie', compact('category','genre','country','movie','related','phimhot_sidebar','phim_sapchieu','episode','episode_tapdau','episode_current_count','count_total','rating'));
    }
    public function watch($slug,$tap){
      
      
        $category = Category::orderBy('position','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('update_at','DESC')->take('20')->get();
        $phim_sapchieu = Movie::where('resolution',5)->where('status',1)->orderBy('update_at','DESC')->take('10')->get();
        $movie = Movie::with('category','genre','country','movie_genre','episode')->where('slug',$slug)->where('status',1)->first();
       
        if(isset($tap))
        {
            
            $tapphim=$tap;
            $tapphim=substr($tap,4,20);
            $episode=Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();

        }
        else
        {
            
            $tapphim=1;
            $episode=Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }
        $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
    	return view('pages.watch', compact('category','genre','country','movie','phimhot_sidebar','phim_sapchieu','episode','tap','tapphim','related'));
    }
    public function episode(){
    	return view('pages.episode');
    }
    public function locphim()
    { 

      
        $sapxep=$_GET['order'];
        $genre_get=$_GET['genre'];
        $country_get=$_GET['country'];
        $year_get=$_GET['year'];     
       if($sapxep==''&&$genre_get==''&&$country_get==''&&$year_get=='')
        {
         return redirect()->back();  
        }
        else
        {
            $category=Category::orderBy('position','ASC')->where('status',1)->get();
            $genre=Genre::orderBy('id','DESC')->get();
            $country=Country::orderBy('id','DESC')->get();
            $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('update_at','DESC')->take('20')->get();
          
            $phim_sapchieu = Movie::where('resolution',5)->where('status',1)->orderBy('update_at','DESC')->take('10')->get();
            $movie = Movie::withCount('episode');
           if($genre_get)
           {
            $movie = Movie::where('genre_id','=',$genre_get);
           }
           elseif($country_get)
           {
            $movie = Movie::where('country_id','=',$country_get);

           }
           elseif($year_get)
           {
            $movie = Movie::where('year','=',$year_get);


           }
           elseif($sapxep)
           {
            $movie = $movie->orderBy('title','ASC');
           }
           $movie = $movie->orderBy('update_at','DESC')->paginate(40);
            return view('pages.locphim',compact('category','genre','country','movie','phimhot_sidebar','phim_sapchieu'));
        }
      
    }
    public function add_rating(Request $request)
    {
         $data= $request->all();
         $ip_address= $request->ip();
         $rating_count= Rating::where('movie_id',$data['movie_id'])->where('ip_address',$ip_address)->count();
         
         if($rating_count>0)
         {
            echo 'exist';
         }
         else
         {
            $rating= new Rating();
            $rating->movie_id= $data['movie_id'];
            $rating->rating=$data['index'];
            $rating->ip_address= $ip_address;
            $rating->save();
            echo 'done';
         }
        

    }
}
