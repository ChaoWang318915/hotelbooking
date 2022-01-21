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
						<li><a href="{{url('/rooms-overview',$hid)}}"><span class="fas fa-chevron-left"></span>back</a></li>
						<li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
            <li><a href="{{url('/add-room',$hid)}}"><span class="fas fa-plus"></span>add a room </a></li> 
            <!-- <li><a href="" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><span class="fas fa-plus"></span>add images</a></li> -->
            <li>
                @include('backend.message')
            </li>
					</ul>
				</nav>
<!-- /content-menu -->
@include('includes.inner_nav')
<!-- /main-tabset -->
  <div class="content content-room" style = "border-top: none;">
    <div class="details-form">
   
      <form action="{{route('room-update',$room->id)}}" method="post" id="room_form" enctype="multipart/form-data">
        @csrf

        <div class="form-room-item">
          <h3 class="form-name">Room Details
          

          </h3>
      
          <div class="field">
            <label>Room Name</label>
            <input type="text" name="room_name" value="{{$room->room_name}}">
          </div>
           <div class="text-danger">
         @error('room_name')
        <span>{{ $message}}</span>
         @enderror
         </div>
         <input type="hidden" name="room_status" value="{{$room->room_status}}">
          <div class="field">
            <label for="lbl-016">Description</label>
            <textarea id="lbl-016" rows="10" name="description" >{!!$room->description!!}</textarea>
          </div>
          <div class="field">
            <label>Room Size</label>
            <div class="size-input">
              <input type="text" name="room_size" value="{{$room->room_size}}">
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
                <input type="text" name="occupancy_adults1" value="{{$room->occupancy_adults1}}">
                <label>Adults</label>
              </div>
              <div class="item">
                <input type="text" name="occupancy_childs1" value="{{$room->occupancy_childs1}}">
                <label>Childs</label>
              </div>
            </div>

            <p>or</p>
            <div class="items">
              <div class="item">
                <input type="text" name="occupancy_adults2" value="{{$room->occupancy_adults2}}">
                <label>Adults</label>
              </div>
              <div class="item">
                <input type="text" name="occupancy_childs2" value="{{$room->occupancy_childs2}}">
                <label>Childs</label>
              </div>
            </div>

          </div>
        </div>

        <div class="form-room-item" style="display:none">
          <h3 class="form-name">Child Policy</h3>
          <div class="max-room">

            <div class="items">
              <div class="item">
                <input type="text" name="policy_child" value="{{$room->policy_child}}">
                <label>Child</label>
              </div>
              <div class="item">
                <input type="text" name="policy_teen" value="{{$room->policy_teen}}">
                <label>Teen</label>
              </div>
              
              <div class="item" style="margin-left:20px">
                <input type="text" name="policy_baby" value="{{$room->policy_baby}}">
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
                <input type="text" name="min_room_occupancy" value="{{$room->min_room_occupancy}}">
                <label>Min</label>
              </div>
              <div class="item">
                <input type="text" name="max_room_occupancy" value="{{$room->max_room_occupancy}}">
                <label>Max</label>
              </div>
              
            </div>

            

          </div>
        </div>

        <div class="form-room-item">
          <h3 class="form-name">Room Amenities</h3>
          <div class="field field-area">
            <textarea id="lbl-017" rows="15" name="room_amenities" id="room_amenities">{!!$room->room_amenities!!}</textarea>
          </div>
        </div>
     
    </div>

    <div class="details-form form1" style="position: relative">
      <!-- <div class="labls">
      </div> -->
      <div class="form-room-item">
        <h3 class="form-name form-name-img" style="margin-bottom: 10px">Images <span class="chooseimg float-right">
                  <input type="file" style="display:none;" title="Choose Images" id="files" name="file[]" multiple="multiple">
                  <label class="chooseimg1" for="files">Choose Images</lable></span> </h3>
                  <p style="color: #b0b0b0">Recommended Image size 2526 x 1061*</p>
        <div class="image" id="image" class="img-fluid">
                    
                  
                </div>
       <!--  <div>

                  <input type="file" id="files" name="file[]" multiple="multiple">
                </div> -->
                
                  
      </div>
         @foreach($room_image as $room_img)
        <div class="images-box">

          <div class="image">
            <img src="{{url('/images/room/'.$room_img->room_image)}}" alt="#">
          </div>
          <p class="img-name">{{$room_img->room_image}}</p>
          <a href="{{route('room-image-delete',$room_img->id)}}" class="btn-delete">
            <span class="far fa-trash-alt"></span>
            <span></span>
          </a>
        </div>
        @endforeach

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
});
</script>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // tinymce.init({selector:'textarea#lbl-016', resize: 'both'});
    // tinymce.init({selector:'textarea#lbl-017', resize: 'both'});
  $('#button_id').on('click',function(){
    
     $('#room_form').submit();
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