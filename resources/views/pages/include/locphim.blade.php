<form action="{{route('locphim')}}" method="GET">
                <style
                 type="text/css">
                 .stylish_filter
                 {
                    border: 0;
                    background: #12171b;
                    color: #fff;
                 }
                </style>
                  <!-- @csrf -->
                  <div class="col-md-3">
                     <div class="form-group">
                      
                        <select class="form-control stylish_filter" name="order" id="exampleFormControlSelect1">
                        <option value="" >--Sắp xếp--</option>
                        <option value="date">Ngày đăng</option>
                        <option value="year_release">Năm sản xuất</option>
                        <option value="views_a_z">Lượt xem</option>
                        <option value="name_a_z">Tên phim</option>
                    
                        </select>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                      
                        <select class="form-control stylish_filter" name="genre" id="exampleFormControlSelect1">
                           <option value="">--Thể loại--</option>
                           @foreach($genre as $key =>$gen_filter)
                           <option {{(isset($_GET['genre'] ) && $_GET['genre'] == $gen_filter->id) ? 'selected':''}} value="{{$gen_filter->id}}">{{$gen_filter->title}}</option>
                           @endforeach
                       
                         
                        </select>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                      
                        <select class="form-control stylish_filter" name="country" id="exampleFormControlSelect1">
                        <option value="">--Quốc gia--</option>
                           @foreach($country as $key =>$coun_filter)
                           <option {{(isset($_GET['country'] ) && $_GET['country'] == $coun_filter->id) ? 'selected':''}} value="{{$coun_filter->id}}">{{$coun_filter->title}}</option>
                           
                           @endforeach
                       
                        </select>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group stylish_filter">
                      @php 
                      if(isset($_GET['year']))
                      {
                          $year=$_GET['year'];
                      }
                      else
                      {
                             $year=null;
                      }
                      @endphp
                     {!!Form::selectYear('year',2000,2023,$year,
                                ['class'=>'form-control stylish_filter','placeholder'=>'--Năm Phim--'])!!}
                       
                        </select>
                     </div>
                  </div>
                  <div class="col-md-1">
                     <div class="form-group stylish_filter">
                     <input type="submit" name="locphim" class="btn btn-sm btn-default" style="background-color: #12171b;color: #fff" value="Lọc Phim">
                     </div>
                  </div>
          