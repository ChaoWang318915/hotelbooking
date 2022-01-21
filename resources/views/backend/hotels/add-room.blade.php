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
						<li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
            <!-- <li><a href="" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><span class="fas fa-plus"></span>add images</a></li> -->
             <li>
                @include('backend.message')
            </li>
					</ul>
				</nav>
<!-- /content-menu -->
@include('includes.inner_nav')
<!-- /main-tabset -->
  <div class="content content-room">

    <div class="details-form">
     

        <div class="form-room-item">
          <h3 class="form-name">Room Details
             <span class="board1 float-right">
             <span class="labls">

             <?php 
     
      $hotelname=App\Hotel::select('hotel_name')->where('id',$hid)->first();
       ?>


    <form action="{{route('room-save')}}" method="post" id="room_form" enctype="multipart/form-data">
        @csrf
         </span>

         </span>


          </h3>


          <input type="hidden" name="hotelId" value="{{$id}}">
          <div class="field">
            <label>Room Name</label>
            <input type="text" name="room_name" value="{{old('room_name')}}">
          </div>
           <div class="text-danger">
         @error('room_name')
        <span>{{ $message}}</span>
         @enderror
         </div>
          <div class="field">
            <label for="lbl-016">Description</label>
            <textarea id="lbl-016" rows="6" name="description"></textarea>
          </div>
          <div class="field">
            <label>Room Size</label>
            <div class="size-input">
              <input type="text" name="room_size" value="{{old('room_size')}}">
              <p>m&sup2;</p>
            </div>
          </div>
            <div class="text-danger">
         @error('room_size')
        <span>{{ $message}}</span>
         @enderror
         </div>
        </div>

        <div class="form-room-item">
          <h3 class="form-name">Maximum room occupancy</h3>
          <div class="max-room">

            <div class="items">
              <div class="item">
                <input type="text" name="occupancy_adults1">
                <label>Adults</label>
              </div>
              <div class="item">
                <input type="text" name="occupancy_childs1">
                <label>Childs</label>
              </div>
            </div>

            <p>or</p>
            <div class="items">
              <div class="item">
                <input type="text" name="occupancy_adults2">
                <label>Adults</label>
              </div>
              <div class="item">
                <input type="text" name="occupancy_childs2">
                <label>Childs</label>
              </div>
            </div>

          </div>
        </div>

        <div class="form-room-item" style="display: none">
          <h3 class="form-name">Child Policy</h3>
          <div class="max-room">

            <div class="items">
              <div class="item">
                <input type="text" name="policy_child" value="{{old('policy_child')}}">
                <label>Child</label>
              </div>
              <div class="item">
                <input type="text" name="policy_teen" value="{{old('policy_teen')}}">
                <label>Teen</label>
              </div>
              <div class="item" style="margin-left:20px">
                <input type="text" name="policy_baby" value="{{old('policy_baby')}}">
                <label>Baby</label>
              </div>
            </div>

            

          </div>
        </div>

        <div class="form-room-item">
          <h3 class="form-name">Room occupancy by person</h3>
          <div class="max-room">

            <div class="items">
              <div class="item">
                <input type="text" name="min_room_occupancy" value="{{old('min_room_occupancy')}}">
                <label>Min</label>
              </div>
              <div class="item">
                <input type="text" name="max_room_occupancy" value="{{old('max_room_occupancy')}}">
                <label>Max</label>
              </div>
              
            </div>

            

          </div>
        </div>


        <div class="form-room-item">
          <h3 class="form-name">Room Amenities</h3>
          <div class="field field-area">
            <textarea id="lbl-017" rows="10" name="room_amenities" id="room_amenities"></textarea>
          </div>
          <!-- <div style="width: 80%; float: right; margin-bottom: 20px">
          <textarea disabled="true" style="height: 220px; width: 100%; border: none; resize: none; font-size: 15px;">
            <div class="col-md-3">
              <h4>Zimmer</h4>
                <ul>
                  <li>Süßwassertauchbecken</li>
                  <li>Direkter Strandzugang</li>
                  <li>Privates Deck mit Liegestühlen</li>
                  <li>Klimaanlage</li>
                  <li>Daybed</li>
                </ul>
            </div>
          </textarea>
          </div> -->
        </div>
     
    </div>

    <div class="details-form" style="position: relative">
      <div class="form-room-item">
        <h3 class="form-name form-name-img" style="margin-bottom: 10px">Images <span class="chooseimg float-right">
                  <input type="file" style="display:none;" title="Choose Images" id="files" name="file[]" multiple="multiple">
                  <label class="chooseimg1" for="files">Choose Images</lable></span></h3>
                  <p style="color: #b0b0b0">Recommended Image size 730 x 490*</p>
        <!-- <div>
                  <input type="file" id="files" name="file[]" multiple="multiple">
                </div> -->
                
                  <div class="image" id="image" class="img-fluid">
                    
                  
                </div>
      </div>
      <div style="position: absolute; bottom: 100px; width: 100%">
          <textarea disabled="true" style="height: 220px; width: 100%; border: none; resize: none; font-size: 15px;">
            <div class="col-md-3">
              <h4>Zimmer</h4>
                <ul>
                  <li>Süßwassertauchbecken</li>
                  <li>Direkter Strandzugang</li>
                  <li>Privates Deck mit Liegestühlen</li>
                  <li>Klimaanlage</li>
                  <li>Daybed</li>
                </ul>
            </div>
          </textarea>
      </div>
    </div>
 </form>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Upload Images</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Select files:</label>

							<button class="files btn btn-secondary">Durchsuchen...</button>
							<input type="text" class="form-control">

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary  btn-lg" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary  btn-lg">Send message</button>
      </div>
    </div>
  </div>
</div>

</div>
<script>

$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
});
$(document).ready(function(){
    $('#rooms').addClass('active');
    $('#hotel_admin').addClass('active');
});
</script>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#room_form').submit();
 });
});
</script> 
 <script type="text/javascript">
$(document).ready(function() {
  // tinymce.init({selector:'textarea#lbl-016'});
  //   tinymce.init({selector:'textarea#lbl-017'});
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