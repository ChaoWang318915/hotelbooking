@extends('layouts.backend')
@section('content')

    <div class="d-flex">
       	<div class="main-sidebar"></div>
       	<div class="content-area">
        <nav class="content-menu">
			<ul class="nav">
	    
				<li><a href="{{url('/tag-manager')}}"><span class="fas fa-chevron-left"></span>back</a></li>
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
						<form action="{{route('tag-save',$hid)}}" method="post" id=tag-form>
							@csrf
							<h3 class="form-name">Add Tag</h3>
							<div class="field">
								<label>Tag-Name</label>
								<input type="text" name="tag_name">
							</div>
							 <div class="text-danger">
                          @error('tag_name')
                        <span>{{ $message}}</span>
                        @enderror
                        </div>

							<div class="field">
								<label>Tag-Code for:</label>
								<select id="lbl-018" name="tag_code_for">
									<option>Please select</option>
									<option value="Discount">Discount</option>
									<option value="Meal Plan">Meal Plan</option>
									<option value="Recommendation">Recommendation</option>
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
									<option>Please select</option>
									<option value="Teaser Page">Teaser Page</option>
									<option value="Hotel Detail Page">Hotel Detail Page</option>
								</select>
							</div>
									 <div class="text-danger">
                          @error('page_on_frontend')
                        <span>{{ $message}}</span>
                        @enderror
                        </div>

							<div class="field">
								<label>Start</label>
								<input type="date" class="short-input" name="start">
							</div>
							<div class="text-danger">
                          @error('start')
                        <span>{{ $message}}</span>
                        @enderror
                        </div>
							<div class="field">
								<label>End</label>
								<input type="date" class="short-input" name="end">
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
    
     $('#tag-form').submit();
 });
});
</script> 
@endsection
