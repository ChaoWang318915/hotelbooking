@extends('layouts.backend')
@section('content')
<div class="d-flex">
<div class="main-sidebar"></div>

      <div class="content-area">
        @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
     <?php 
      $hid=request()->route('id');
    ?>
        <nav class="content-menu">
          <ul class="nav">
            <li><a href="{{url('/hotel-administration')}}"><span class="fas fa-chevron-left"></span>back</a></li>
            <li><a href="{{url('/add-room',$hid)}}"><span class="fas fa-plus"></span>add a room </a></li> 
            
          </ul>
        </nav>
  <!-- /content-menu -->
@include('includes.inner_nav')
  <!-- /main-tabset -->
  <div class="hotel-admin">
    <table class="hotel-admin-table">

      <thead>
        <tr>
          <th style="width:3%" >No.</th>
          <th style="width:3%">ID.</th>
         
          <th style="width:1%"></th>
          <th  style="width:10%">Room Name</th>
          
         
          <th style="width:10%">Offline/On</th>
          <th style="width:5%"></th>
         

        </tr>
      </thead>

      <tbody>
       @foreach($rooms as $index=>$room)
        <tr class="rooms-name">
          <td style="width:3%">{{$index+1}}</td>
          <td style="width:3%">{{$room->id}}</td>
          <td style="width:1%"></td>
          <td class="text-center rum-nm" style="width:10%"><a href="{{route('room-edit',[$hid,$room->id])}}">{{$room->room_name}}</a></td>
          
          <td style="width:10%"><label class="switch">
    <?php if($room->room_status==1){ ?>
  <input type="checkbox" class="room_status" id="{{$room->id}}" checked>
<?php } else{?>
  <input type="checkbox" class="room_status" id="{{$room->id}}" >
  <?php }?>
  <span class="slider round"></span>
</label></td>
          <td class="btn-holder" style="width:5%">
            <a   href="{{route('room-delete', $room->id)}}" onclick="return confirm('Are you sure?')" class="btn-delete">
                    <span class="far fa-trash-alt"></span>
                    <span>Delete</span>
                  </a>
            
          </td>
        </tr>
        @endforeach
        <!-- <tr class="row-link" data-href="http://ww.google.com">
          <td>2</td>
          <td>312873</td>
          <td>Aarahveli Maldives</td>
          <td></td>
          <td></td>
          <td> </td>
          <td></td>
          <td><span class="fas fa-toggle-on"></span></td>
          <td class="btn-holder">
            <a href="#" class="btn-delete">
              <span class="far fa-trash-alt"></span>
              <span>Delete</span>
            </a>
          </td>
        </tr>

        <tr class="row-link" data-href="http://ww.google.com">
          <td>3</td>
          <td>312873</td>
          <td>Aarahveli Maldives</td>
          <td></td>
          <td></td>
          <td> </td>
          <td></td>
          <td><span class="fas fa-toggle-on"></span></td>
          <td class="btn-holder">
            <a href="#" class="btn-delete">
              <span class="far fa-trash-alt"></span>
              <span>Delete</span>
            </a>
          </td>
        </tr>

        <tr class="row-link" data-href="http://ww.google.com">
          <td>4</td>
          <td>312873</td>
          <td>Aarahveli Maldives</td>
          <td></td>
          <td></td>
          <td> </td>
          <td></td>
          <td><span class="fas fa-toggle-on"></span></td>
          <td class="btn-holder">
            <a href="#" class="btn-delete">
              <span class="far fa-trash-alt"></span>
              <span>Delete</span>
            </a>
          </td>
        </tr>

        <tr class="row-link" data-href="http://ww.google.com">
          <td>5</td>
          <td>312873</td>
          <td>Aarahveli Maldives</td>
          <td></td>
          <td></td>
          <td> </td>
          <td></td>
          <td><span class="fas fa-toggle-on"></span></td>
          <td class="btn-holder">
            <a href="#" class="btn-delete">
              <span class="far fa-trash-alt"></span>
              <span>Delete</span>
            </a>
          </td>
        </tr>

        <tr class="row-link" data-href="http://ww.google.com">
          <td>6</td>
          <td>312873</td>
          <td>Aarahveli Maldives</td>
          <td></td>
          <td></td>
          <td> </td>
          <td></td>
          <td><span class="fas fa-toggle-on"></span></td>
          <td class="btn-holder">
            <a href="#" class="btn-delete">
              <span class="far fa-trash-alt"></span>
              <span>Delete</span>
            </a>
          </td>
        </tr>

        <tr class="row-link" data-href="http://ww.google.com">
          <td>7</td>
          <td>312873</td>
          <td>Aarahveli Maldives</td>
          <td></td>
          <td></td>
          <td> </td>
          <td></td>
          <td><span class="fas fa-toggle-on"></span></td>
          <td class="btn-holder">
            <a href="#" class="btn-delete">
              <span class="far fa-trash-alt"></span>
              <span>Delete</span>
            </a>
          </td>
        </tr>

        <tr class="row-link" data-href="http://ww.google.com">
          <td>8</td>
          <td>312873</td>
          <td>Aarahveli Maldives</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><span class="fas fa-toggle-on"></span></td>
          <td class="btn-holder">
            <a href="#" class="btn-delete">
              <span class="far fa-trash-alt"></span>
              <span>Delete</span>
            </a>
          </td>
        </tr>

        <tr class="row-link" data-href="http://ww.google.com">
          <td>9</td>
          <td>312873</td>
          <td>Aarahveli Maldives</td>
          <td></td>
          <td></td>
          <td> </td>
          <td></td>
          <td><span class="fas fa-toggle-on"></span></td>
          <td class="btn-holder">
            <a href="#" class="btn-delete">
              <span class="far fa-trash-alt"></span>
              <span>Delete</span>
            </a>
          </td>
        </tr>

        <tr class="row-link" data-href="http://ww.google.com">
          <td>10</td>
          <td>312873</td>
          <td>Aarahveli Maldives</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><span class="fas fa-toggle-on"></span></td>
          <td class="btn-holder">
            <a href="#" class="btn-delete">
              <span class="far fa-trash-alt"></span>
              <span>Delete</span>
            </a>
          </td>
        </tr>

        <tr  class="row-link" data-href="http://ww.google.com">
          <td>11</td>
          <td>312873</td>
          <td>Aarahveli Maldives</td>
          <td></td>
          <td></td>
          <td> </td>
          <td></td>
          <td><span class="fas fa-toggle-on"></span></td>
          <td class="btn-holder">
            <a href="#" class="btn-delete">
              <span class="far fa-trash-alt"></span>
              <span>Delete</span>
            </a>
          </td>
        </tr>
 -->
      </tbody>
    </table>
  </div>
</div>
</div>
<script>
  $(document).ready(function(){
    $('#hotel_admin').addClass('active');
});
$(document).ready(function(){
    $('#rooms').addClass('active');

    $('.room_status').change(function() {

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
                  url: "{{ url('/room-status') }}",
                  method: 'post',
                  data: {
                     status:$status,
                     room_id: id
                  },
                  success: function(result){
                     console.log(result);
                  }});
           
    });
});

</script>
@endsection
