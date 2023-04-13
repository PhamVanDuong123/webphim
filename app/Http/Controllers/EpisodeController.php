<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Episode;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_episode= Episode::with('movie')->orderBy('movie_id','DESC')->get();
        // return response()->json($list_episode);
        return view('admincp.episode.index',compact('list_episode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_movie= Movie::orderBy('id','DESC')->pluck('title','id');
        return view('admincp.episode.form',compact('list_movie'));
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
                'movie_id' => 'required',
                'link' => 'required',
                'episode' => 'required',
               
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài tối thiểu là :min ký tự',
                'max' => ':attribute có độ dài tối đa là :max ký tự',
               
            ],
            [
                'link' => 'link tập phim',
                'episode' => 'Tập phim',
                'movie_id' => 'Tên phim',
               
            ]
        );
        $data = $request->all();
        $episode_check= Episode::where('episode',$data['episode'])->where('movie_id',$data['movie_id'])->count();
        if( $episode_check)
        {
            return redirect()->back();

        }
        else
        {
            $episode = new Episode();
            $episode->movie_id = $data['movie_id'];
            $episode->linkphim = $data['link'];
            $episode->episode = $data['episode'];
            $episode->create_at= Carbon::now('Asia/Ho_Chi_Minh');
            $episode->update_at= Carbon::now('Asia/Ho_Chi_Minh');
            $episode->save();
          
            
        }
       flash()->addSuccess('Thêm thành công');
        return redirect()->route('episode.index');
    }
    public function add_episode($id)
    {
        $movie=Movie::find($id);
        $list_episode= Episode::with('movie')->where('movie_id',$id)->orderBy('movie_id','DESC')->get();
        return view('admincp.episode.add_episode',compact('list_episode','movie'));

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
    {     $list_movie= Movie::orderBy('id','DESC')->pluck('title','id');
       $episode= Episode::find($id);
       return view('admincp.episode.form',compact('episode','list_movie'));
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
                'movie_id' => 'required',
                'link' => 'required',
                'episode' => 'required',
               
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài tối thiểu là :min ký tự',
                'max' => ':attribute có độ dài tối đa là :max ký tự',
               
            ],
            [
                'link' => 'link tập phim',
                'episode' => 'Tập phim',
                'movie_id' => 'Tên phim',
               
            ]
        );
        $data = $request->all();

        $episode = Episode::find($id);
        $episode->movie_id = $data['movie_id'];
        $episode->linkphim = $data['link'];
        $episode->episode = $data['episode'];
        $episode->create_at= Carbon::now('Asia/Ho_Chi_Minh');
        $episode->update_at= Carbon::now('Asia/Ho_Chi_Minh');
        $episode->save();
        flash()->addSuccess('Cập nhật thành công');
        return redirect()->route('episode.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode= Episode::find($id);
        $episode->delete();
      
        return redirect()->back();
    }
    public function select_movie()
    {
        $id=$_GET['id'];
        $movie=Movie::find($id);
        $output='<option>---Chọn tập phim---</option>';
        if($movie->thuocphim=='phimbo')
        {
            for($i=1;$i<=$movie->sotap;$i++)
            {
               
              $output.='<option value="'.$i.'">'.$i.'</option>';
             
             
   
            }
        }
        else
        {
            $output.='<option value="HD">HD</option>
           <option value="fullHD">FullHD</option>
           <option value="Cam">Cam</option>
           <option value="HDCam">HDCam</option>';
        }
       
         echo $output;

    }
   
}
