@extends('layouts.backend')
@section('content')

<style type="text/css">
  .test:after {
  content: '\2807';
  font-size: 20px;
  color:#006a9a;
  }
  .dataTables_filter {
   width: 100%;
   float: right;
   text-align: right !important;
  }
  .dataTables_info {
    margin-left: 32%;
    margin-right: 10px
  }
</style>




<div class="d-flex">
<div class="main-sidebar"></div>

      <div class="content-area">
         @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
        <nav class="content-menu" style="display: flex;">
          <ul class="nav">
            <li><a href="{{url('/hotel-details')}}"><span class="fas fa-plus"></span>add a hotel</a></li>
            <!-- <li></li> -->
          </ul>

          <div style="width: 80%; display: flex; justify-content: center; align-items: center;">
          <!-- <ul class="nav navbar-nav navbar-right"> -->
            <!-- <li> -->
              <input style="padding: 5px 10px; width: 40%; border-radius: 4px" type="text" class="form-control" id="search" placeholder="Search Hotel / ID">
            <!-- </li> -->
          <!-- </ul> -->
          </div>
         <!--  <div class="top-pagination">
            <p>Page 1 of 24</p>
            <a href="#" class="page-btn">
              <span class="fas fa-chevron-left"></span>
            </a>
            <a href="#" class="page-btn">
              <span class="fas fa-chevron-right"></span>
            </a>
          </div> -->
        </nav>
        <!-- /content-menu -->

        <div class="hotel-admin">
          <table style="border-bottom: 1px solid #cfcfcf" class="hotel-admin-table" id="example1">

            <thead>
              <tr>
                <th>No.</th>
                <th>ID</th>
                <th class="text-left">Hotel Name</th>
                <th>Stars</th>
                <th class="text-left">Island</th>
                <th class="text-left">Atoll</th>
                <th class="text-left">Country</th>
                <th>Off-/Online</th>
                <th></th>
                <th></th>

                <th></th>
              </tr>
            </thead>

            <tbody>
             @foreach($hotels as $index =>$hotel)
              <tr class="" >
                <td>{{$index+1}}</td>
                <td >{{$hotel->id}}</td>
                <td class="text-left pl-2"><a href="{{route('hotel-edit',$hotel->id)}}">{{$hotel->hotel_name}}</a></td>
                @php

                  $hotel->stars = number_format($hotel->stars, 1, '.', '');
                @endphp
                <td >{{ $hotel->stars}}</td>
                <td class="text-left pl-2">{{$hotel->island_name}}</td>
                <td class="text-left pl-2">{{$hotel->atoll_name}}</td>
                <td class="text-left pl-2">{{$hotel->country}}</td>
                <td>                   
<label class="switch">
  <?php if($hotel->status==1){ ?>
  <input type="checkbox" class="hotel_status" id="{{$hotel->id}}" checked>
<?php } else{?>
  <input type="checkbox" class="hotel_status" id="{{$hotel->id}}" >
  <?php }?>
  <span class="slider round"></span>
</label>

<td><!-- <div class="dropdown">
                  
                    <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown()">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                 
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#home">Home</a>
                        <a href="#about">About</a>
                        <a href="#contact">Contact</a>
                    </div>
                </div> -->
                 <div class="dropdown dropright">
    <button type="button" class="btn test " data-toggle="dropdown" style="padding: 0px 0px;">
     
    </button>
    <div class="dropdown-menu" style="z-index: 9999">
      <a class="dropdown-item adht" href="{{route('add-room',$hotel->id)}}" >Add Room</a>
      <a class="dropdown-item adht" href="{{route('discounts',$hotel->id)}}" >Discount</a>
      <a class="dropdown-item adht" href="{{route('restaurants-bars-overview',$hotel->id)}}" >Restaurant/Bar</a>
     
 
    </div>
  </div>
</td>
<td></td>

                <td class="btn-holder">
                  <a href="{{route('hotel-delete', $hotel->id)}}" onclick="return confirm('Are you sure?')" class="btn-delete">
                    <span class="far fa-trash-alt"></span>
                    <span>Delete</span>
                  </a>
                </td>
              </tr>
              @endforeach
             
            </tbody>
          </table>
          <div style="height: 8px"></div>
        </div>
      </div>
    </div>
    <div class="d-flex">
      <div class="main-sidebar"></div>
      <div class="bottom-pagination w-100">
      <!--   <a href="#" class="prev"><span class="fas fa-long-arrow-alt-left"></span>Previous</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#" class="next">Next<span class="fas fa-long-arrow-alt-right"></span></a> -->
      </div>
    </div>




    <script >
      
$(document).ready(function(){

    $('.middle').click(function(){
        $('.inactive, .active').toggle();
        
    });

$('.hotel_status').change(function() {

       var id=$(this).attr('id');
       
        if($(this).is(":checked")) {
        
           $status=1;
            
        }
        else{
          $status=0;
        }
       $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                  }
              });
         jQuery.ajax({
                  url: "{{ url('/hotel-status') }}",
                  method: 'post',
                  data: {
                     status:$status,
                     hotel_id: id
                  },
                  success: function(result){
                     console.log(result);
                  }});
           
    });

});
    </script>

      <script>
    $(function () {
      var table = $('#example1').DataTable({
        dom: 'rtip',

        'paging'      : true,
        // 'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        // 'info'        : true,
        'autoWidth'   : true,
        
      })
    


  // #myInput is a <input type="text"> element
  $('#search').on('keyup change', function () {
      table.search(this.value).draw();
  });
  }) 
  </script>
  
@endsection
