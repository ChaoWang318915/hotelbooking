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
       <li>
            @include('backend.message')
      </li>
    </ul>
  </nav>
  <!-- /content-menu -->
<!-- @include('includes.inner_nav') -->
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
  <div class="content content-details">
    <form action="{{url('/hotel-save')}}" method="post" id="hotel_form" enctype="multipart/form-data">
       @csrf
      <div class="details-form" >
        <h3 class="form-name">Hotel Contact Details</h3>
        <div class="field">
          <label>Hotel Name*</label>
          <div class="text-danger">
         @error('hotel_name')
        <span>{{ $message}}</span>
         @enderror
         </div>
          <input type="text" name="hotel_name" id="hotel_name" value="{{old('hotel_name')}}">

        </div>

        <div class="field">
          <label>Url Key*</label>
          <div class="text-danger">
         @error('url_key')
        <span>{{ $message}}</span>
         @enderror
         </div>
          <input type="text" name="url_key" id="url_key" readonly value="{{old('url_key')}}">
        </div>

        <div class="field">
          <label>Island</label>
          <select id="lbl-027" name="island">
            <option value="">Select Island</option>
             @foreach($islands as $island)
            <option value="{{$island->id}}" {{ old("island") == $island->id ? "selected":"" }}>{{$island->island_name}} ({{$island->atoll_name}})</option>
            @endforeach
          </select>
        </div>
        <div class="field">
          <label>Country*</label>
          <div class="text-danger">
        @error('country')
        <span>{{ $message}}</span>
         @enderror
       </div>
          <input type="text" class="datepicker" name="country" value="{{old('country')}}">
        </div>

        <div class="field">
          <label>Street / No.</label>
          <input type="text" name="street">
          <input type="text" class="xs-input" name="streetno" value="{{old('streetno')}}">
        </div>
        <div class="field">
          <label>ZIP/City</label>
          <input type="text" class="sm-input" name="zip" value="{{old('zip')}}">
          <input type="text" name="city">
        </div>
        <div class="part2">
          <div class="field">
            <label>Phone</label>
            <input type="text" name="phone" value="{{old('phone')}}">
          </div>
          <div class="field">
            <label>E-mail</label>
            <input type="email" name="e_mail" value="{{old('e_mail')}}">
          </div>
          <div class="field">
            <label>Fax</label>
            <input type="text" name="fax" value="{{old('fax')}}">
          </div>
          <div class="field">
            <label>Internet</label>
            <input type="text" name="internet" value="{{old('internet')}}">
          </div>
          <div class="field">
            <label>Google Coordinates</label>
            <input type="text" name="google_coordinates" value="{{old('google_coordinates')}}">
          </div>
          <!-- <div class="field">
            <label>Meta Title</label>
            <input type="text" name="meta_title" value="{{old('meta_title')}}">
          </div>
          <div class="field">
            <label>Meta Description</label>
            <textarea name = "meta_description" value = "meta_description"></textarea>
          </div>
           <div class="field">
            <label>Meta keywords</label>
            <input type="text" name="meta_keyword" value="{{old('meta_keyword')}}">
          </div> -->
        </div>
        <h3 class="form-name">General Information</h3>
        <div class="field">
          <label>Stars*</label>
          <select id="lbl-028" name="stars">
            <option {{ old("stars") == "" ? "selected":"" }} value="">Please select</option>
            <option {{ old("stars") == "0" ? "selected":"" }} value="0">0</option>
            <option {{ old("stars") == "2" ? "selected":"" }} value="2">2</option>
            <option {{ old("stars") == "3" ? "selected":"" }} value="3">3</option>
            <option {{ old("stars") == "3.5" ? "selected":"" }} value="3.5">3.5</option>
            <option {{ old("stars") == "4" ? "selected":"" }} value="4">4</option>
            <option {{ old("stars") == "4.5" ? "selected":"" }} value="4.5">4.5</option>
            <option {{ old("stars") == "5" ? "selected":"" }} value="5">5</option>
            <option {{ old("stars") == "5.5" ? "selected":"" }} value="5.5">5.5</option>
            <option {{ old("stars") == "6" ? "selected":"" }} value="6">6</option>
          </select>
        </div>

        <div class="field">
          <label>Hotelcategory*</label>
          <div class="text-danger">
          @error('hotelcategory1')
        <span>{{$message}}</span>
         @enderror
       </div>


          <select id="lbl-029" name="hotelcategory1[]" multiple="multiple" class="js-example-basic-single1">
            <option {{in_array(1, old("hotelcategory1") ?: []) ? "selected": ""}} value="1">Diver</option>
            <option {{in_array(2, old("hotelcategory1") ?: []) ? "selected": ""}} value="2">Familienfreundlich</option>
            <option {{in_array(3, old("hotelcategory1") ?: []) ? "selected": ""}} value="3">Luxury</option>
            <option {{in_array(4, old("hotelcategory1") ?: []) ? "selected": ""}} value="4">Honeymoon</option>
            <option {{in_array(5, old("hotelcategory1") ?: []) ? "selected": ""}} value="5">Die besten All Inclusive Resorts</option>
            <option {{in_array(6, old("hotelcategory1") ?: []) ? "selected": ""}} value="6">Friends of the Maldives</option>
            <option {{in_array(7, old("hotelcategory1") ?: []) ? "selected": ""}} value="7">Adults Only</option>
            <option {{in_array(8, old("hotelcategory1") ?: []) ? "selected": ""}} value="8">Guesthouse</option>
            <option {{in_array(9, old("hotelcategory1") ?: []) ? "selected": ""}} value="9">Resortinseln</option>


          </select>
        </div>


        <div class="field">
          <label>Number of rooms*</label>
          <div class="text-danger">
          @error('number_rooms')
        <span>{{$message}}</span>
         @enderror
       </div>
          <input type="number" name="number_rooms" value="{{old('number_rooms')}}">
        </div>
				<!-- Changed Invoice Currency to Hotel Currency -->
        <div class="field">
          <label>Hotel Currency*</label>
          <div class="text-danger">
          @error('invoice_currency')
        <span>{{$message}}</span>
         @enderror
       </div>
          <select id="lbl-032" name="invoice_currency">

            <option {{ old("invoice_currency") == "0" ? "selected":"" }} value="0">Please select</option>
            <option {{ old("invoice_currency") == "euro" ? "selected":"" }} value="euro">Euro (&euro;)</option>
            <option {{ old("invoice_currency") == "usd" ? "selected":"" }} value="usd">USD ($)</option>
          </select>
        </div>



        <div class="field">
          <label>Credit Cards</label>
          <div class="input-wrap">
            <input type="text" name="credit_cards" value="{{old('credit_cards')}}">
            <p class="input-desc">visa;mc;ae;up;dc</p>
            <p class="input-desc"><i>Don't add space after</i> <b>;</b></p>
          </div>
        </div>

        <h3 class="form-name">Default Values</h3>
        <div class="field">
          <label>Minimum stay*</label>
          <div class="text-danger">
          @error('minimum_stay')
        <span>{{$message}}</span>
         @enderror
       </div>
          <select id="lbl-033" name="minimum_stay">
            <option {{ old("minimum_stay") == "0" ? "selected":"" }} value="0">Please select</option>
            <option {{ old("minimum_stay") == "3" ? "selected":"" }} value="3">3 nights</option>
            <option {{ old("minimum_stay") == "4" ? "selected":"" }} value="4">4 nights</option>
            <option {{ old("minimum_stay") == "5" ? "selected":"" }} value="5">5 nights</option>
            <option {{ old("minimum_stay") == "7" ? "selected":"" }} value="7">7 nights</option>
            <option {{ old("minimum_stay") == "10" ? "selected":"" }} value="10">10 nights</option>
            <option {{ old("minimum_stay") == "14" ? "selected":"" }} value="14">14 nights</option>
          </select>
        </div>


        <div class="field field-right">
          <div class="input-wrap">
            <textarea id="lbl-020" rows="5" name="minimum_text">{{old('minimum_text')}}</textarea>
            <p class="input-desc">Minimum stay at Christmas and New Year and the rest of the year</p>
          </div>
        </div>


        <div class="field">
          <label>Board*</label>
          <div class="text-danger">
          @error('board')
        <span>{{$message}}</span>
         @enderror
       </div>
          <select id="lbl-034" name="board" >
            <option {{ old("board") == "0" ? "selected":"" }} value="0">Please select</option>
            <option {{ old("board") == "breakfast" ? "selected":"" }} value="breakfast">Frühstück</option>
            <option {{ old("board") == "halfboard" ? "selected":"" }} value="halfboard">Halbpension</option>
            <option {{ old("board") == "fullboard" ? "selected":"" }} value="fullboard">Vollpension</option>
            <option {{ old("board") == "all inclusive" ? "selected":"" }} value="all inclusive">All Inclusive</option>
            <option {{ old("board") == "Silver All Inclusive" ? "selected":"" }} value="Silver All Inclusive">Silver All Inclusive</option>
          </select>
        </div>

        <div class="field">
          <label>Diving Bases</label>
          <div class="text-danger">
          @error('divingbases')
        <span>{{$message}}</span>
         @enderror
       </div>


          <select id="lbl-0291" name="divingbases[]" multiple="multiple" class="js-example-basic-single1">
            <option {{in_array(1, old("divingbases") ?: []) ? "selected": ""}} value="1">Euro Divers</option>
            <option {{in_array(2, old("divingbases") ?: []) ? "selected": ""}} value="2">Werner Lau</option>
            <option {{in_array(3, old("divingbases") ?: []) ? "selected": ""}} value="3">Ocean Dimensions</option>
            <option {{in_array(4, old("divingbases") ?: []) ? "selected": ""}} value="4">Joy Dive Maldives</option>
            <option {{in_array(5, old("divingbases") ?: []) ? "selected": ""}} value="5">Providers Maldives</option>
          </select>
        </div>

        <div class="field">
          <label>Accessible</label>
          <div class="text-danger">
          @error('accessible')
        <span>{{$message}}</span>
         @enderror
       </div>
          <select id="lbl-035" name="accessible">
            <option {{ old("accessible") == "Please select" ? "selected":"" }} value="Please select">Please select</option>
            <option {{ old("accessible") == "yes" ? "selected":"" }} value="yes">Ja</option>
            <option {{ old("accessible") == "no" ? "selected":"" }} value="no">Nein</option>
            <option {{ old("accessible") == "Teilweise" ? "selected":"" }} value="Teilweise">Teilweise</option>
          </select>
        </div>

        <h3 class="form-name">Wi-Fi</h3>
        <div class="field field-right">
        	<div class="input-wrap">
          <textarea id="lbl-019" rows="5" name="wifi">{{old('wifi')}}</textarea>
      </div>
        </div>
        <h3 class="form-name">Child Policy for Room Rates</h3>
        <div class="field field-right">
          <div class="input-wrap">
          <textarea id="lbl-019" rows="5" name="child_policy_for_rates">{{old('child_policy_for_rates')}}</textarea>
      </div>
        </div>
        <div class="field">
          <label>Baby</label>
          <input type="text" class="sm-input" name="cpfr_baby_min" value="{{old('cpfr_baby_min')}}">
          <input type="text" class="sm-input" name="cpfr_baby_max" value="{{old('cpfr_baby_max')}}">
          Years
        </div>

        <div class="field">
          <label>Child</label>
          <input type="text" class="sm-input" name="cpfr_child_min" value="{{old('cpfr_child_min')}}">
          <input type="text" class="sm-input" name="cpfr_child_max" value="{{old('cpfr_child_max')}}">
          Years
        </div>

        <div class="field">
          <label>Teen</label>
          <input type="text" class="sm-input" name="cpfr_teen_min" value="{{old('cpfr_teen_min')}}">
          <input type="text" class="sm-input" name="cpfr_teen_max" value="{{old('cpfr_teen_max')}}">
          Years
        </div>

        <div class="field">
          <label>Adult</label>
          <input type="text" class="sm-input" name="cpfr_adult_min" value="{{old('cpfr_adult_min')}}">
          <input type="text" class="sm-input" name="cpfr_adult_max" value="{{old('cpfr_adult_max')}}">
          Years
        </div>
      </div>
      <div class="details-form" style="padding-left: 10px;">
        <h3 class="form-name">On- / Offline</h3>
        <div class="bookable">
          <div style="display: flex; align-items: center; justify-content: space-between">
            <p>Hotel online bookable</p>
            <div style="width: 40px">
              <label class="switch">
                <input type="checkbox" class="chk" id="lbl-00001" checked>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <p>The hotel can still be seen online on the website. <br> However, it is not bookable for customers. It appears "On request".</p>
        </div>
        <div>
        <h3 class="form-name form-name-img" style="margin-bottom: 10px">Teaser Images <span class="chooseimg float-right">
                  <input type="file" style="display:none;" title="Choose Images" id="files" name="file[]" multiple="multiple">
                  <label class="chooseimg1" for="files">Choose Images</lable></span> </h3>
                  <p style="color: #b0b0b0">Recommended Image size 1024 x 768*</p>
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

        <h3 class="form-name">SEO Tag section</h3>

        <div class="field">
            <label>Meta Title</label>
            <input type="text" name="meta_title" value="{{old('meta_title')}}">
          </div>
          <div class="field">
            <label>Meta Description</label>
            <textarea name = "meta_description" value = "meta_description"></textarea>
          </div>
           <div class="field">
            <label>Meta keywords</label>
            <input type="text" name="meta_keyword" value="{{old('meta_keyword')}}">
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
$(document).ready(function()
{  $('.js-example-basic-single2').select2();
});

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

  $('#hotel_name').keyup(function() {
    value = $(this).val().replace(/\s+/g, '-');
    value = value.toLowerCase();
  $("#url_key").val(value);
      });
});

</script>

@endsection
