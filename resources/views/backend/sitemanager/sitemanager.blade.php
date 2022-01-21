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
  				<nav class="content-menu">
  					<ul class="nav">
  						 <li><a href="{{route('hotel-administration')}}"><span class="fas fa-chevron-left"></span>back</a></li>
  						<li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
  					</ul>
  				</nav>
  				<!-- /content-menu -->
          <div class="content sitemanager-content">
  					<div class="details-form">
  						<h3 class="form-name">Domain Details</h3>
  						<form action="{{route('sitemanager-update',$sitemanager->id)}}" method="post" id="siteid">
                 @csrf
  							<div class="field">
  								<label>Name</label>
  								<input type="text" name="name" value="{{$sitemanager->name}}">
  							</div>
                  <div class="text-danger">
                          @error('name')
                        <span>{{ $message}}</span>
                        @enderror
                    </div>
  							<div class="field">
  								<label>Language</label>
  								<select id="lbl-023" name="language">
  									<option value="{{$sitemanager->language}}" >{{$sitemanager->language}}</option>
  								</select>
  							</div>
  							<div class="field">
  								<label>Domain</label>
  								<input type="text" name="domain" value="{{$sitemanager->domain}}">
  							</div>
                 <div class="text-danger">
                          @error('domain')
                        <span>{{ $message}}</span>
                        @enderror
                    </div>
  							<div class="field">
  								<label>Template</label>
  								<select id="lbl-024" name="template">
  									<option value="{{$sitemanager->template}}" >{{$sitemanager->template}}</option>
  								</select>
  							</div>
  						
  					</div>
  					<div class="details-form">
  						<h3 class="form-name">Metadata</h3>
  					
  							<div class="field">
  								<label>Title</label>
  								<input type="text" name="meta_title" value="{{$sitemanager->meta_title}}">
  							</div>
  							<div class="field">
  								<label for="lbl-025">Keywords</label>
  								<textarea id="lbl-025" rows="7" value="{{$sitemanager->meta_keywords}}" name="meta_keywords">{{$sitemanager->meta_keywords}}</textarea>
  							</div>
  							<div class="field field-desc">
  								<label for="lbl-026">Description</label>
  								<textarea id="lbl-026" rows="15" value="{{$sitemanager->meta_description}}" name="meta_description">{{$sitemanager->meta_description}}</textarea>
  							</div>
  						
  					</div>
            </form>
  				</div>
  			</div>
      </div>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#siteid').submit();
 });
});
</script> 

@endsection