@extends('layouts.backend')
@section('content')

        <!-- /content-menu -->
      <div class="d-flex">
        <div class="main-sidebar"></div>
        <div class="content-area">
      @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
          <nav class="content-menu d-flex">
  					<ul class="nav">
  						<li><a href="{{url('/add-islands')}}"><span class="fas fa-plus"></span>add an Island</a></li>
  					</ul>
            <div style="width: 80%; display: flex; justify-content: center; align-items: center;">
          <!-- <ul class="nav navbar-nav navbar-right"> -->
            <!-- <li> -->
              <input style="padding: 5px 10px; width: 40%; border-radius: 4px" type="text" class="form-control" id="search" placeholder="Search Island / ID">
            <!-- </li> -->
          <!-- </ul> -->
          </div>
  			<!-- 		<div class="top-pagination">
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
  					<table class="hotel-admin-table" id="example1">
  						<thead>
  							<tr>
  								<th>No.</th>
  								<th>ID</th>
  								<th class="text-left">Island Name</th>
                   
  								<th class="text-left">Atoll</th>
  								
  								<th>Off-/Online</th>
  								<th></th>
  							</tr>
  						</thead>
  						<tbody>
                @foreach($islands as $index =>$island)
  							<tr class="" >
  								<td>{{$index+1}}</td>
  								<td>{{$island->id}}</td>

  								<td class="text-left pl-2"><a href="{{route('island-edit',$island->id)}}">{{$island->island_name}}</a></td>
  								
  								<td class="text-left pl-2">{{$island->atoll_name}}</td>
  								
  								<td>                   
<label class="switch">
  <?php if($island->island_status==1){ ?>
  <input type="checkbox" class="island_status" id="{{$island->id}}" checked>
<?php } else{ ?>
  <input type="checkbox" class="island_status"  id="{{$island->id}}">
  <?php }?>
  <span class="slider round"></span>
</label></td>
  								<td class="btn-holder">
  									<a href="{{route('island-delete', $island->id)}}" onclick="return confirm('Are you sure?')" class="btn-delete">
  										<span class="far fa-trash-alt"></span>
  										<span>Delete</span>
  									</a>
  								</td>
  							</tr>
                @endforeach
  						<!-- 	<tr class="row-link" data-href="http://ww.google.com">
  								<td>2</td>
  								<td>312873</td>
  								<td>Aarahveli Maldives</td>
  								<td></td>
  								<td></td>
  								<td>Vaavu Atoll</td>
  								<td>Malediven</td>
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
  								<td>Vaavu Atoll</td>
  								<td>Malediven</td>
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
  								<td> </td>
  								<td></td>
  								<td>Vaavu Atoll</td>
  								<td>Malediven</td>
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
  								<td> </td>
  								<td></td>
  								<td>Vaavu Atoll</td>
  								<td>Malediven</td>
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
  								<td> </td>
  								<td></td>
  								<td>Vaavu Atoll</td>
  								<td>Malediven</td>
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
  								<td> </td>
  								<td></td>
  								<td>Vaavu Atoll</td>
  								<td>Malediven</td>
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
  							  <td> </td>
  								<td></td>
  								<td>Vaavu Atoll</td>
  								<td>Malediven</td>
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
  								<td> </td>
  								<td></td>
  								<td>Vaavu Atoll</td>
  								<td>Malediven</td>
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
  								<td> </td>
  								<td></td>
  								<td>Vaavu Atoll</td>
  								<td>Malediven</td>
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
  								<td> </td>
  								<td></td>
  								<td>Vaavu Atoll</td>
  								<td>Malediven</td>
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
      <div class="d-flex">
      <div class="main-sidebar"></div>
    <!--   <div class="bottom-pagination w-100">
        <a href="#" class="prev"><span class="fas fa-long-arrow-alt-left"></span>Previous</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#" class="next">Next<span class="fas fa-long-arrow-alt-right"></span></a>
      </div> -->
    </div>

      <script >
      
$(document).ready(function(){

    $('.middle').click(function(){
        $('.inactive, .active').toggle();
        
    });


$('.island_status').change(function() {
   
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
                  url: "{{ url('/island-status') }}",
                  method: 'post',
                  data: {
                     status:$status,
                     island_id: id
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
