@extends('layouts.backend')
@section('content')

<style type="text/css">
  textarea{resize: auto;}

</style>

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
              <li><a href="{{url('/hotel-administration')}}"><span class="fas fa-chevron-left"></span>back</a></li>
              <li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
              <!-- <li><a href="add-images.html"><span class="fas fa-plus"></span>add images</a></li> -->
            </ul>
          </nav>
  				<!-- /content-menu -->
          <div class="content content-rest">
  					<div class="details-form">
  						<form action="{{route('teaser-page-update',$teaser->id)}}" method="post" id="teaserPage" >
                  @csrf
  							<div class="field">
  								<label for="lbl-004">Standard</label>
  								 <div class="input-wrap">
  								<textarea id="lbl-014" rows="5" name="packages" >{{$teaser->packages}}</textarea>
  							</div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Diver</label>
  								 <div class="input-wrap">
  								<textarea id="lbl-015" rows="5" name="diver">{{$teaser->diver}}</textarea>
  							</div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Family</label>
  								 <div class="input-wrap">
  								<textarea id="lbl-016" rows="5"  name="family">{{$teaser->family}}</textarea>
  							</div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Luxury</label>
  								 <div class="input-wrap">
  								<textarea id="lbl-017" rows="5" name="luxury">{{$teaser->luxury}}</textarea>
  								</div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Honeymoon</label>
  								 <div class="input-wrap">
  								<textarea id="lbl-018" rows="5"  name="honeymoon">{{$teaser->honeymoon}}</textarea>
  							</div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Recreation</label>
  								<div class="input-wrap">
  									<textarea id="lbl-019" rows="5"  name="recreation">{{$teaser->recreation}}</textarea>
  								</div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Friends of the Maldives</label>
  								<div class="input-wrap">
  									<textarea id="lbl-020" rows="5"  name="friends_of_maldives">{{$teaser->friends_of_maldives}}</textarea>
  								</div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Best ager</label>
  								 <div class="input-wrap">
  									<textarea id="lbl-021" rows="5"  name="best_ager">{{$teaser->best_ager}}</textarea>
  								</div>
  							</div>

                <div class="field">
                  <label for="lbl-004">Adults Olnly</label>
                   <div class="input-wrap">
                    <textarea id="lbl-021" rows="5"  name="adults_only">{{$teaser->adults_only}}</textarea>
                  </div>
                </div>


  						</form>
  					</div>
  				</div>
  			</div>
      </div>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#teaserPage').submit();
 });
});
</script> 
@endsection