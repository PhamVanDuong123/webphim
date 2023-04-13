<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Info;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $category = Category::orderBy('position','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('update_at','DESC')->take('20')->get();
        
        $phim_sapchieu = Movie::where('resolution',5)->where('status',1)->orderBy('update_at','DESC')->take('10')->get();
        //
        $category_total=Category::all()->count();
        $genre_total=Genre::all()->count();
        $country_total=Country::all()->count();

        $movie_total=Movie::all()->count();
        //
        $info= Info::find(1);
        View::share([
            'category_total'=>$category_total,
            'movie_total'=>$movie_total,
            'genre_total'=>$genre_total,
            'country_total'=>$country_total,
        'info'=>$info,
        'phimhot'=>$info,
        'phimhot_sidebar'=>  $phimhot_sidebar,
        'phim_sapchieu '=>  $phim_sapchieu ,
        'category_home'=> $category,
        'genre_home'=> $genre,
        'country_home'=> $country,
    

        
        

       ]);
    }
}
