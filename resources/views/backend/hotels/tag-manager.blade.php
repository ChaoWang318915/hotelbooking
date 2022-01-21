@extends('layouts.backend')
@section('content')

<div class="d-flex">
	<div class="main-sidebar"></div>
    <div class="content-area">
    	  
        <nav class="content-menu">
          	<ul class="nav">
          		 <?php 
                 $hid=request()->route('id');
                  ?>
            	<li><a href="{{url('/hotel-administration')}}"><span class="fas fa-chevron-left"></span>back</a></li>
            	<li><a href="{{url('/add-tag',$hid)}}"><span class="fas fa-plus"></span>add a tag </a></li>
            	<li>
            		@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
            	</li>
          	</ul>
        </nav>
        <!-- /content-menu -->
        @include('includes.inner_nav')
        <!-- /main-tabset -->
        <div class="hotel-admin">
			<table class="hotel-admin-table">
				<thead>
					<tr>
						<th>No.</th>
						<th>ID</th>
						<th>Tag Name</th>
						<th> </th>
						<th> </th>
						<th> </th>
						<th> </th>
						<th>On-/Offline</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
                    @foreach($tags as $index =>$tag)
					<tr class="" data-href="">
						<td>{{$index+1}}</td>
						<td>{{$tag->id}}</td>
						<td><a href="{{route('tag-edit',['id'=>$tag->hotel_id,'tid'=>$tag->id])}}">{{$tag->tag_name}}</a></td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td><label class="switch">
  <?php if($tag->tag_status==1){ ?>
  <input type="checkbox" class="tag_status" id="{{$tag->id}}" checked>
<?php } else{ ?>
  <input type="checkbox" class="tag_status"  id="{{$tag->id}}">
  <?php }?>
  <span class="slider round"></span>
</label></td>
						<td class="btn-holder">
							<a onclick="return confirm('Are you sure?')" href="{{route('tag-delete',['id'=>$tag->hotel_id,'tid'=>$tag->id])}}" class="btn-delete">
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

					<tr class="row-link" data-href="http://ww.google.com">
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
    $('#tag').addClass('active');

$('.tag_status').change(function() {
   
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
                  url: "{{ url('/tag-status') }}",
                  method: 'post',
                  data: {
                     tag_status:$status,
                       tag_id: id
                  },
                  success: function(result){
                     console.log(result);
                  }});
           
    });
});
</script>
@endsection
