@extends('layouts.app')

@section('content')
<div class="container-fuild">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm Phim</a>
            <table class="table table-responsive" style="display: block;" id="tablephim">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên phim</th>
                        <th scope="col">Số tập</th>
                        <th scope="col">Tập phim</th>
                        <th scope="col">Thời lượng phim</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Phim hot</th>
                        <th scope="col">Định dạng</th>
                        <th scope="col">Phụ đề</th>
                        <!-- <th scope="col">Mô tả</th> -->
                        <th scope="col">Đường dẫn</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Thuộc phim</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Quốc gia</th>
                        
                       
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày update</th>
                        <th scope="col">Năm phim</th>
                        <th scope="col">Season</th>
                        <th scope="col">Top Views</th>
                        <th scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $cate)
                    <tr>
                        <th scope="row">{{$key}}</th>
                        <td>{{$cate->title}}</td>
                        <td>{{$cate->episode_count}}/{{$cate->sotap}} Tập</td>
                        <td><a href="{{route('add-episode',[$cate->id])}}" class="btn btn-danger btn-sm">Thêm tập phim</a></td>
                        <td>{{$cate->thoiluong}}</td>
                        <td>
                            @csrf
                            <img width="100" src="{{asset('uploads/movie/'.$cate->image)}}">
                            <input data-movie_id="{{$cate->id}}" id="file-{{$cate->id}}" type="file"  class="form-control file_image " accept="image/*">
                            <span id="success_image"></span>
                        </td>
                        <td>
                        <select class="phimhot_choose" id="{{$cate->id}}">
                            @if($cate->phimhot==0)
                            {
                                <option value="1">Hot</option>
                                <option selected value="0">Không</option>
                            }
                            @else
                            {
                                <option selected value="1">Hot</option>
                                <option value="0">Không</option>

                            }
                            @endif
                         </select>

                        </td>
                        <td>
                            @php 
                            $option= array('0'=>'HD','1'=>'SD','2'=>'HDCam','3'=>'Cam','4'=>'FullHD','5'=>'Trailer');
                            @endphp
                            <select class="resolution_choose" id="{{$cate->id}}">
                              @foreach($option as $key=> $resolution)
                              <option {{$cate->resolution==$key ?'selected' : ''}} value="{{$key}}">{{$resolution}}</option>
                              @endforeach
                           </select>
                            <!-- @if($cate->resolution==0)
                            HD
                            @elseif($cate->resolution==1)
                            SD
                            @elseif($cate->resolution==2)
                            HDCam
                            @elseif($cate->resolution==3)
                            Cam
                            @elseif($cate->resolution==4)
                            FullHD
                            @elseif($cate->resolution==5)
                            Trailer
                            @endif -->

                        </td>
                        <td>
                            <!-- @if($cate->phude==0)
                            Phụ đề
                            @elseif($cate->phude==1)
                            Thuyết minh
                            @endif -->
                            <select class="phude_choose" id="{{$cate->id}}">
                            @if($cate->phude==0)
                            {
                                <option value="1">Thuyết minh</option>
                                <option selected value="0">Phụ đề</option>
                            }
                            @else
                            {
                                <option selected value="1">Thuyết minh</option>
                                <option value="0">Phụ đề</option>

                            }
                            @endif
                        </selected>

                        </td>
                        <!-- <td>{{$cate->description}}</td> -->
                        <td>{{$cate->slug}}</td>
                        <td>
                        <select class="trangthai_choose" id="{{$cate->id}}">
                            @if($cate->status==0)
                            {
                                <option value="1">Hiển thị</option>
                                <option selected value="0">Không hiển thị</option>
                            }
                            @else
                            {
                                <option selected value="1">Hiển thị</option>
                                <option value="0">Không hiển thị</option>

                            }
                            @endif
                        </selected>
                        </td>
                        <td>
                            <!-- {{$cate->category->title}} -->
                        {!! Form::select('category_id', $category, isset($cate) ? $cate->category->id : '',
                        ['class'=>'form-control','class'=>'category_choose','id'=>$cate->id]) !!}
                        </td>
                       </div>
                        <td>
                        <select class="thuocphim_choose" id="{{$cate->id}}">
                            @if($cate->thuocphim=='phimbo')
                            {
                                <option value="phimle">Phim lẻ</option>
                                <option selected value="phimbo">Phim bộ</option>
                            }
                            @else
                            {
                                <option selected value="phimle">Phim lẻ</option>
                                <option value="phimbo">Phim bộ</option>

                            }
                            @endif
                        </selected>
                        </td>
                       
                      
                   
                        <td>
                            @foreach($cate->movie_genre as $gen)
                            <span class="badge badge-dark">{{$gen->title}}</span>

                            @endforeach
                        </td>
                        <td>
                           
                        {!! Form::select('country_id', $country, isset($cate) ? $cate->country->id : '',
                        ['class'=>'form-control','class'=>'country_choose','id'=>$cate->id]) !!}
                        </td>
                 
                        <td>{{$cate->create_at}}</td>
                        <td>{{$cate->update_at}}</td>
                        <td>
                            <form method="POST">
                                @csrf
                                {!!Form::selectYear('year',2000,2023,isset($cate->year)? $cate->year :
                                '',['class'=>'select-year','id'=>$cate->id,'placeholder'=>'-Năm phim-'])!!}
                            </form>

                        </td>
                        <td>
                            <form method="POST">
                                @csrf

                                {!!Form::selectRange('season',0,20,isset($cate->season)? $cate->season :
                                '',['class'=>'select-season','id'=>$cate->id])!!}
                            </form>
                        </td>
                        <td>


                            {!! Form::select('topview', ['0'=>'Ngày','1'=>'Tuần','2'=>'Tháng'], isset($cate->topview) ?
                            $cate->topview : '', ['class'=>'select-topview','id'=>$cate->id,'placeholder'=>'-Views-']) !!}

                        <td>
                        {!! Form::open(['method'=>'DELETE','route'=>['movie.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn có chắc muốn xóa?")']) !!}
                        {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                      {!! Form::close() !!}
                           
                            <a href="{{route('movie.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection