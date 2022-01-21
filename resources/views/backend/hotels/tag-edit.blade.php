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
				<li><a href="{{url('/tag-manager',$hid)}}"><span class="fas fa-chevron-left"></span>back</a></li>
				<li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
			</ul>
		</nav>
        <!-- /content-menu -->
        @include('includes.inner_nav')
        <!-- /main-tabset -->
        <?php 
        $hid=request()->route('id');
         ?>
        		<div class="content">
					<div class="details-form">
						<form action="{{route('tag-update',['id'=>$hid,'tid'=>$tags->id])}}" method="post" id=etag>
							@csrf
							<h3 class="form-name">Add Tag</h3>
							<input type="hidden" name="tag_status" value="{{$tags->tag_status}}">
							<div class="field">
								<label>Tag-Name</label>
								<input type="text" name="tag_name" value="{{$tags->tag_name}}">
							</div>
                            	 <div class="text-danger">
                          @error('tag_name')
                        <span>{{ $message}}</span>
                        @enderror
                        </div>
							<div class="field">
								<label>Tag-Code for:</label>
								<select id="lbl-018" name="tag_code_for">
									<!-- <option value="{{$tags->tag_code_for}}">{{$tags->tag_code_for}}</option> -->
									<option value="Discount" @if($tags->tag_code_for =="Discount") selected @endif >Discount</option>
									<option value="Meal Plan" @if($tags->tag_code_for =="Meal Plan") selected @endif >Meal Plan</option>
									<option value="Recommendation" @if($tags->tag_code_for =="Recommendation") selected @endif>Recommendation</option>
								</select>
							</div>
                           <div class="text-danger">
                          @error('tag_code_for')
                        <span>{{ $message}}</span>
                        @enderror
                        </div>
							<div class="field">
								<label>Page on Frontend:</label>
								<select id="lbl-118" name="page_on_frontend">
									<!-- <option>{{$tags->page_on_frontend}}</option> -->
									<option value="Teaser Page" @if($tags->page_on_frontend =='Teaser Page') selected @endif>Teaser Page</option>
									<option value="Hotel Detail Page" @if($tags->page_on_frontend == 'Hotel Detail Page') selected @endif >Hotel Detail Page</option>
								</select>
							</div>

                             <div class="text-danger">
                          @error('page_on_frontend')
                        <span>{{ $message}}</span>
                        @enderror
                        </div>
							<div class="field">
								<label>Start</label>
								<input type="date" class="short-input datepicker1" name="start" value="{{$tags->start}}">


							</div>

                             <div class="text-danger">
                          @error('start')
                        <span>{{ $message}}</span>
                        @enderror
                        </div>
							<div class="field">
								<label>End</label>
								<input type="date" class="short-input datepicker1" name="end" value="{{$tags->end}}">
							</div>
							<div class="text-danger">
                          @error('end')
                        <span>{{ $message}}</span>
                        @enderror
                        </div>
						</form>
					</div>
				</div>
      	</div>
    </div>
<script>
$(document).ready(function(){
    $('#tag').addClass('active');
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#etag').submit();
 });
});
</script> 
@endsection
