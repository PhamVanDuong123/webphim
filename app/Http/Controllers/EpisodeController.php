<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Episode;
use Carbon\Carbon;
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
        $data = $request->all();
        $episode = new Episode();
        $episode->movie_id = $data['movie_id'];
        $episode->linkphim = $data['link'];
        $episode->episode = $data['episode'];
        $episode->create_at= Carbon::now('Asia/Ho_Chi_Minh');
        $episode->update_at= Carbon::now('Asia/Ho_Chi_Minh');
        $episode->save();
        return redirect()->to('episode.index');
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
        $data = $request->all();
        $episode = Episode::find($id);
        $episode->movie_id = $data['movie_id'];
        $episode->linkphim = $data['link'];
        $episode->episode = $data['episode'];
        $episode->create_at= Carbon::now('Asia/Ho_Chi_Minh');
        $episode->update_at= Carbon::now('Asia/Ho_Chi_Minh');
        $episode->save();
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
        return redirect()->to('episode.index');
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
