@extends('layouts.backend')
@section('content')
        <!-- /content-menu -->
      <div class="d-flex">
        <div class="main-sidebar"></div>
        <div class="content-area">
  				<nav class="content-menu">
  					<ul class="nav">
  						<li><a href="{{url('/add-atoll')}}"><span class="fas fa-plus"></span>add an Atoll</a></li>
  					</ul>
  				</nav>
  				<!-- /content-menu -->
          @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
          <div class="hotel-admin">
  					<table class="hotel-admin-table">
  						<thead>
  							<tr>
  								<th>No.</th>
  								<th>ID</th>
  								<th class="text-left">Atoll Name</th>
  								<th></th>
  								<th></th>
  								<th></th>
  								<th></th>
  								<th>On-/Offline</th>
  								<th></th>
  							</tr>
  						</thead>
  						<tbody>
                @foreach($atolls as $index =>$atoll)
  							<tr class="" >
  								<td>{{$index+1}}</td>
  								<td>{{$atoll->id}}</td>
  								<td class="text-left"><a href="{{route('atoll-edit',$atoll->id)}}">{{$atoll->atoll_name}}</a></td>
  								<td></td>
  								<td></td>
  								<td></td>
  								<td></td>
  								<td>
                    <div class="middle">
                   
<label class="switch">
  <?php if($atoll->atoll_status==1){ ?>
  <input type="checkbox" class="atoll_status" id="{{$atoll->id}}" checked>
<?php } else{ ?>
  <input type="checkbox" class="atoll_status"  id="{{$atoll->id}}">
  <?php }?>
  <span class="slider round"></span>
</label>
    
                    </div>
                  </td>
  								<td class="btn-holder">
  									<a href="{{route('atoll-delete', $atoll->id)}}" onclick="return confirm('Are you sure?')" class="btn-delete">
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
  								<td></td>
  								<td></td>
  								<td><span class="fas fa-toggle-on"></span></td>
  								<td class="btn-holder">
  									<a href="#" class="btn-delete">
  										<span class="far fa-trash-alt"></span>
  										<span>Delete</span>
  									</a>
  								</td>
  							</tr> -->
  							

  						</tbody>
  					</table>
  				</div>
  			</div>
      </div>
      


        <script >
      
$(document).ready(function(){

    $('.middle').click(function(){
        $('.inactive, .active').toggle();
        
    });

   $('.atoll_status').change(function() {
   
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
                  url: "{{ url('/atoll-status') }}",
                  method: 'post',
                  data: {
                     status:$status,
                     atoll_id: id
                  },
                  success: function(result){
                     console.log(result);
                  }});
           
    });



});
    </script>
@endsection
