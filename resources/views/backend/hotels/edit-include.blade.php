@extends('layouts.backend')
@section('content')
 <?php 
        $hid=request()->route('id');
         ?>
<div class="d-flex">
	<div class="main-sidebar"></div>
    <div class="content-area">
        <nav class="content-menu">
          	<ul class="nav">
            	<li><a href="{{url('/include-overview',$hid)}}"><span class="fas fa-chevron-left"></span>back</a></li>
            	<li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
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
        
         @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
        <div class="content content-room">
			
			<div class="details-form">
				<form action="{{route('include-update',$include->id)}}" method="post" id="include_form" enctype="multipart/form-data">
					@csrf
					<div class="field">
						<label>Name <sup class="redstar">*</sup></label>
						<input type="text" name="include_name" value="{{ $include->include_name }}">
					</div>
					<div class="field">
						<label for="lbl-004">Description <sup class="redstar">*</sup></label>
						<textarea id="lbl-004" rows="5" name="description">{{$include->description }}</textarea>
					</div>
					
						<div class="images-box-holder">
							<div class="details-form">
      <div class="form-room-item">
        <h3 class="form-name form-name-img">Icon Images <span class="chooseimg float-right">
                  <input type="file" style="display:none;" title="Choose Images" id="files" name="file[]">
                  <label class="chooseimg1" for="files">Choose Images</lable></span> </h3>
                  <div class="image" id="image" class="img-fluid">
                    @if($include->include_icon !=="")
                  <div class="images-box">

                    <div class="image">
                      <img src="{{url('/images/include/'.$include->include_icon)}}" alt="#">
                    </div>
                    <p class="img-name">{{$include->iclude_icon}}</p>
                    
                  </div>
                  @endif
                  </div>
                </div>
              </div>
          </div>
        </form>
      </div>
    </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#includes').addClass('active');
    $('#hotel_admin').addClass('active');
    
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#include_form').submit();
 });
});
</script> 
<script type="text/javascript">
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $('#image').append("<div class=\"col-md-2\">" +
            "<img class=\"imageThumb\" style=\"\" src=\"" + e.target.result + "\" title=\"" +  e.target.name + "\"/>" +
            "</div>");
          

        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    
  }
});

</script>
@endsection
