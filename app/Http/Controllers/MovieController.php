<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Movie_Genre;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Movie::with('category', 'movie_genre', 'country','genre')->withCount('episode')->orderBy('id', 'DESC')->get();
        //count sotap
        // return response()->json($list);
         $category=Category::pluck('title','id');
         $country=Country::pluck('title','id');
        // dd($list_episode_count);
        $path=public_path().'/json/';
        if(!is_dir($path))
        {
            mkdir($path,0777,true);

        }
        File::put($path.'movies.json',json_encode($list));
        return view('admincp.movie.index', compact('list','category','country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
       
        $category = Category::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $list_genre = Genre::all();
        $country = Country::pluck('title', 'id');
        return view('admincp.movie.form', compact('category', 'genre', 'country','list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->validate(
            [
                'title' => 'required|min:5|max:50',
                'sotap' => 'required',
                'resolution' => 'required',
                'phude' => 'required',
                'description' => 'required',
                'name_eng' => 'required',
                'category_id' => 'required',
                'country_id' => 'required',
                'genre' => 'required',
                'image' => 'required',

               
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài tối thiểu là :min ký tự',
                'max' => ':attribute có độ dài tối đa là :max ký tự',
               
            ],
            [
                'title' => 'Tên danh mục',
                'sotap' => 'Số tập phim',
                'resolution' => 'Định dạng phim',
                'phude' => 'Phụ đề',
                'description' => 'Mô tả phim',
                'name_eng' => 'Tên tiếng Anh',
                'category_id' => 'Tên danh mục',
                'country_id' => 'Tên quốc gia',
                'genre' => 'Tên thể loại',
                'image' => 'Hình ảnh',
              
               
            ]
        );
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->sotap = $data['sotap'];
        $movie->slug = $data['slug'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->tags = $data['tags'];
        $movie->count_view = rand(100,99999);
        $movie->name_eng = $data['name_eng'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->country_id = $data['country_id'];
        $movie->create_at = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->update_at = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->trailer = $data['trailer'];
        foreach($data['genre'] as $key => $gen)
         
            $movie->genre_id=$gen[0];
         
            
       
       
   
        $get_image = $request->file('image');
       

        if ($get_image) {

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/movie/', $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        flash()->addSuccess('Thêm phim thành công');
        // them nhieu the loai phim 
        $movie->movie_genre()->attach($data['genre']);
        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $list_genre=Genre::all();
        $movie =  Movie::find($id);
       $movie_genre= $movie->movie_genre;
        return view('admincp.movie.form', compact('category', 'genre', 'country', 'movie','list_genre','movie_genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data= $request->validate(
            [
                'title' => 'required|min:5|max:50',
                'sotap' => 'required',
                'resolution' => 'required',
                'phude' => 'required',
                'description' => 'required',
                'name_eng' => 'required',
                'category_id' => 'required',
                'country_id' => 'required',
                'genre' => 'required',
                'image' => 'required',

               
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài tối thiểu là :min ký tự',
                'max' => ':attribute có độ dài tối đa là :max ký tự',
               
            ],
            [
                'title' => 'Tên danh mục',
                'sotap' => 'Số tập phim',
                'resolution' => 'Định dạng phim',
                'phude' => 'Phụ đề',
                'description' => 'Mô tả phim',
                'name_eng' => 'Tên tiếng Anh',
                'category_id' => 'Tên danh mục',
                'country_id' => 'Tên quốc gia',
                'genre' => 'Tên thể loại',
                'image' => 'Hình ảnh',
              
               
            ]
        );
        
        $data = $request->all();
       
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->sotap = $data['sotap'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->tags = $data['tags'];
        $movie->slug = $data['slug'];
        // $movie->count_view = rand(100,99999);
        $movie->name_eng = $data['name_eng'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->update_at = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->thuocphim = $data['thuocphim'];
        $movie->trailer = $data['trailer'];
        
        foreach($data['genre'] as $key => $gen)
         
        $movie->genre_id=$gen[0];
     
        $get_image = $request->file('image');
        if ($get_image) {
            if (file_exists('public/uploads/movie/' . $movie->image)) {

                unlink('public/uploads/movie/' . $movie->image);
            } else {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('public/uploads/movie/', $new_image);
                $movie->image = $new_image;
            }
        }
      
       
        $movie->save();
      
        $movie->movie_genre()->sync($data['genre']);
        flash()->addSuccess('Cập nhật phim thành công');
        return redirect()->route('movie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        //xóa ảnh
        if (file_exists('public/uploads/movie/' . $movie->image)) {
            unlink('public/uploads/movie/' . $movie->image);
        }
        // xóa  thể loại
        Movie_Genre::whereIn('movie_id',[$movie->id])->delete();
        // $movie->movie_genre()->sync($data['genre']);
        // xóa phim xóa tập phim
        Episode::whereIn('movie_id',[$movie->id])->delete();
       $movie->delete();
        return redirect()->back();
    }
    public function update_year(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();
    }
    public function update_season(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->season = $data['season'];
        $movie->save();
    }
    public function update_topview(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->topview = $data['topview'];
        $movie->save();
    }
    public function filter_topview(Request $request)
    {
        $data = $request->all();
       $movie=Movie::where('topview',$data['value'])->orderBy('update_at','DESC')->take(20)->get();
        $output = '';
        foreach ($movie as $key => $mov) {
            if ($mov->resolution == 0)
                $text = 'HD';
            else if ($mov->resolution == 1)
                $text = 'SD';
            else if ($mov->resolution == 2)
                $text = 'HDCam';
            else if ($mov->resolution == 3)
                $text = 'Cam';
            elseif ($mov->resolution == 4)
                $text = 'FullHD';
            $output.=   ' <div class="item">
                <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                             
                                 <div class="item-link">
                                    <img src="'.url('public/uploads/movie/'.$mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" title="'.$mov->title.'" />
                                    <span class="is_trailer">'.$text.'</span>
                                 </div>
                                 <p class="title">'.$mov->title.'</p>
                              
                              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                              <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                              </div>
                           </div>';
                
        }
        echo $output;
    }
    public function filter_default(Request $request)
    {
        $data = $request->all();
       $movie=Movie::where('topview',0)->orderBy('update_at','DESC')->take(20)->get();
        $output = '';
        foreach ($movie as $key => $mov) {
            if ($mov->resolution == 0)
                $text = 'HD';
            else if ($mov->resolution == 1)
                $text = 'SD';
            else if ($mov->resolution == 2)
                $text = 'HDCam';
            else if ($mov->resolution == 3)
                $text = 'Cam';
            elseif ($mov->resolution == 4)
                $text = 'FullHD';
            $output.=   ' <div class="item">
                <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                             
                                 <div class="item-link">
                                    <img src="'.url('public/uploads/movie/'.$mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" title="'.$mov->title.'" />
                                    <span class="is_trailer">'.$text.'</span>
                                 </div>
                                 <p class="title">'.$mov->title.'</p>
                              
                              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                              <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                              </div>
                           </div>';
                
        }
        echo $output;
    }
    public function category_choose(Request $request)
    {
        $data= $request->all();
        $movie=Movie::find($data['movie_id']);
        $movie->category_id=$data['category_id'];
        $movie->save();
    }
    public function country_choose(Request $request)
    {
        $data= $request->all();
        $movie=Movie::find($data['movie_id']);
        $movie->country_id=$data['country_id'];
        $movie->save();
    }
    public function trangthai_choose(Request $request)
    {
        $data= $request->all();
        $movie=Movie::find($data['movie_id']);
        $movie->status=$data['trangthai_id'];
        $movie->save();
    }
    public function thuocphim_choose(Request $request)
    {
        $data= $request->all();
        $movie=Movie::find($data['movie_id']);
        $movie->thuocphim=$data['thuocphim_val'];
        $movie->save();
    }
    public function phimhot_choose(Request $request)
    {
        $data= $request->all();
        $movie=Movie::find($data['movie_id']);
        $movie->phim_hot=$data['phimhot_val'];
        $movie->save();
    }
    public function phude_choose(Request $request)
    {
        $data= $request->all();
        $movie=Movie::find($data['movie_id']);
        $movie->phude=$data['phude_val'];
        $movie->save();
    }
    public function resolution_choose(Request $request)
    {
        $data= $request->all();
        $movie=Movie::find($data['movie_id']);
        $movie->resolution=$data['resolution_val'];
        $movie->save();
    }
    public  function update_image_movie_ajax(Request $request)
    {
        $get_image = $request->file('file');
        $movie_id = $request->movie_id;

        if ($get_image) {
             $movie=Movie::find($movie_id);
             unlink('public/uploads/movie/' . $movie->image);
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('public/uploads/movie/', $new_image);
                $movie->image = $new_image;
                $movie->save();
            
        }
        
      

    }
}