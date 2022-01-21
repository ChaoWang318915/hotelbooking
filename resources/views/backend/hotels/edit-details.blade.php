@extends('layouts.backend')
@section('content')
<style type="text/css">
	textarea
  {
    resize: auto;
  }
</style>


<div class="d-flex">
<div class="main-sidebar"></div>
      <div class="content-area">
  <nav class="content-menu">
    <ul class="nav">
      <li ><a href="{{url('/hotel-administration')}}"><span class="fas fa-chevron-left"></span>back</a></li>
      <li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
      <!-- <li><a href="" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><span class="fas fa-plus"></span>add images</a></li> -->
    </ul>
  </nav>
  <!-- /content-menu -->
@include('includes.inner_nav')
  <!-- /main-tabset -->
  <div class="content content-details">
    <form action="{{url('/hotel-save')}}" method="post" id="hotel_form" enctype="multipart/form-data">
       @csrf
      <div class="details-form">
        <h3 class="form-name">Hotel Contact Details</h3>
        <div class="field">
          <label>Hotel Name*</label>
          <input type="text" name="hotel_name">
        </div>
        <div class="text-danger">
         @error('hotel_name')
        <span>{{ $message}}</span>
         @enderror
         </div>
        <div class="field">
          <label>Island</label>
          <select id="lbl-027" name="island">
            <option value="">Select Island</option>
             @foreach($islands as $island)
            <option value="{{$island->id}}">{{$island->island_name}} ({{$island->atoll_name}})</option>
            @endforeach
          </select>
        </div>
        <div class="field">
          <label>Country*</label>
          <input type="text" class="datepicker" name="country">
        </div>
        <div class="text-danger">
        @error('country')
        <span>{{ $message}}</span>
         @enderror
       </div>
        <div class="field">
          <label>Street / No.</label>
          <input type="text" name="street">
          <input type="text" class="xs-input" name="streetno">
        </div>
        <div class="field">
          <label>ZIP/City</label>
          <input type="text" class="sm-input" name="zip">
          <input type="text" name="city">
        </div>
        <div class="part2">
          <div class="field">
            <label>Phone</label>
            <input type="text" name="phone">
          </div>
          <div class="field">
            <label>E-mail</label>
            <input type="email" name="e_mail">
          </div>
          <div class="field">
            <label>Fax</label>
            <input type="text" name="fax">
          </div>
          <div class="field">
            <label>Internet</label>
            <input type="text" name="internet">
          </div>
          <div class="field">
            <label>Google Coordinates</label>
            <input type="text" name="google_coordinates">
          </div>
        </div>
        <h3 class="form-name">General Information</h3>
        <div class="field">
          <label>Stars*</label>
          <select id="lbl-028" name="stars">
            <option value="0">Please select</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="3.5">3.5</option>
            <option value="4">4</option>
            <option value="4.5">4.5</option>
            <option value="5">5</option>
            <option value="5.5">5.5</option>
            <option value="6">6</option>
          </select>
        </div>
        <div class="text-danger">
        @error('stars')
        <span>{{ $message}}</span>
         @enderror
       </div>

				<div class="field">
          <label>Hotelcategory*</label>
          <select id="lbl-029" name="hotelcategory1">
            <option value="0">Select category1</option>
            <option value="diver">Diver</option>
            <option value="family">Family</option>
            <option value="luxury">Luxury</option>
            <option value="honeymoon">Honeymoon</option>
            <option value="recreation">Recreation</option>
            <option value="friends of the maldives">Friends of the Maldives</option>
            <option value="best ager">Best ager</option>
            <option value="All-Inclusive">All-Inclusive</option>
          </select>
        </div>

        <div class="text-danger">
          @error('hotelcategory1')
        <span>{{$message}}</span>
         @enderror
       </div>
        <div class="field">
          <label>Hotelcategory 2</label>
          <input type="text" name="hotelcategory2">
        </div>
        <div class="field">
          <label>Hotelcategory 3</label>
          <input type="text" name="hotelcategory3">

        </div>
        <div class="field">
          <label>Number of rooms*</label>
          <input type="text" name="number_rooms">
        </div>
        <div class="text-danger">
          @error('number_rooms')
        <span>{{$message}}</span>
         @enderror
       </div>

			 	<!-- Changed Invoice Currency to Hotel Currency -->
        <div class="field">
          <label>Hotel Currency*</label>
          <select id="lbl-032" name="invoice_currency">

            <option value="0">Please select</option>
            <option value="euro">Euro (&euro;)</option>
            <option value="usd">USD ($)</option>
          </select>
        </div>

        <div class="text-danger">
          @error('invoice_currency')
        <span>{{$message}}</span>
         @enderror
       </div>


        <div class="field">
          <label>Credit Cards</label>
          <div class="input-wrap">
            <input type="text" name="credit_cards">
            <p class="input-desc">visa; mc; aa; up; dc</p>
          </div>
        </div>

        <h3 class="form-name">Default Values</h3>
        <div class="field">
          <label>Minimum stay*</label>
          <select id="lbl-033" name="minimum_stay">
            <option value="0">Please select</option>
            <option value="3">3 nights</option>
            <option value="4">4 nights</option>
            <option value="5">5 nights</option>
            <option value="7">7 nights</option>
            <option value="10">10 nights</option>
            <option value="14">14 nights</option>
          </select>
        </div>
         <div class="text-danger">
          @error('minimum_stay')
        <span>{{$message}}</span>
         @enderror
       </div>

        <div class="field field-right">
          <div class="input-wrap">
            <textarea id="lbl-020" rows="5"></textarea>
            <p class="input-desc">Minimum stay at Christmas and New Year and the rest of the year</p>
          </div>
        </div>


        <div class="field">
          <label>Board*</label>
          <select id="lbl-034" name="board" >
            <option value="0">Please select</option>
            <option value="breakfast">Breakfast</option>
            <option value="halfboard">Halfboard</option>
            <option value="fullboard">Fullboard</option>
            <option value="all inclusive">All Inclusive</option>
          </select>
        </div>
          <div class="text-danger">
          @error('board')
        <span>{{$message}}</span>
         @enderror
       </div>
        <div class="field">
          <label>Accessible*</label>
          <select id="lbl-035" name="accessible">
            <option value="0">Please select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
            <option value="Teilweise">Teilweise</option>
          </select>
        </div>
          <div class="text-danger">
          @error('accessible')
        <span>{{$message}}</span>
         @enderror
       </div>
        <h3 class="form-name">Wi-Fi</h3>
        <div class="field field-right">
        	<div class="input-wrap">
          <textarea id="lbl-019" rows="5" name="wifi"></textarea>
      </div>
        </div>
      </div>
      <div class="details-form">
        <h3 class="form-name">On- / Offline</h3>
        <div class="bookable">
          <div class="switch">
            <p>Hotel online bookable</p>
            <div class="custom-check">
              <input type="checkbox" class="chk" name="bstatus" id="lbl-00001">
              <label for="lbl-00001">Hotel online bookable</label>
            </div>
          </div>
          <p>The hotel can still be seen online on the website. <br> However, it is not bookable for customers. It appears "On request".</p>
        </div>
        <h3 class="form-name">Teaser Image</h3>
        <div>
                  <input type="file" id="files" name="file[]" multiple="multiple">
                </div>

                  <div class="image" id="image" class="img-fluid">


                </div>
        <!-- <div class="images-box">
          <div class="image">
            <img src="images/default-img.jpg" alt="#">
          </div>
          <p class="img-name">ichbineeinbildername.jpg</p>
          <a href="#" class="btn-delete">
            <span class="far fa-trash-alt"></span>
            <span>Delete</span>
          </a>
        </div> -->
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
    $('#hDetails').addClass('active');
});

</script>

@endsection
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){

     $('#hotel_form').submit();
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
