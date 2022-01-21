@extends('layouts.backend')
@section('content')
<style type="text/css">
  textarea{resize: auto;}
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
  <div class="content content-details">
    <form action="{{route('hotel-update',$hotel->id)}}" method="post" id="hotel_form" enctype="multipart/form-data">
       @csrf
      <div class="details-form">
        <h3 class="form-name">Hotel Contact Details</h3>
        <div class="field">
          <label>Hotel Name*</label>
          <input type="text" name="hotel_name" id="hotel_name" value="{{$hotel->hotel_name}}">
        </div>
        <div class="field">
          <label>Url Key*</label>
          <input type="text" name="url_key" id="url_key" value="{{$hotel->url_key}}" readonly>
        </div>
        <div class="text-danger">
         @error('hotel_name')
        <span>{{ $message}}</span>
         @enderror
         </div>
         <input type="hidden" name="status" value="{{$hotel->status}}">
        <div class="field">
          <label>Island</label>
          <select id="lbl-027" name="island">
            <option value="{{$hotel->island}}">{{$hotel->island_name}} ({{$hotel->atoll_name}})</option>
             @foreach($islands as $island)
            <option value="{{$island->id}}">{{$island->island_name}} ({{$island->atoll_name}})</option>
            @endforeach
          </select>
        </div>
        <div class="field">
          <label>Country*</label>
          <input type="text" class="datepicker" name="country" value="{{$hotel->country}}">
        </div>
        <div class="text-danger">
        @error('country')
        <span>{{ $message}}</span>
         @enderror
       </div>
        <div class="field">
          <label>Street / No.</label>
          <input type="text"  name="street" value="{{$hotel->street}}">
          <input type="text" class="xs-input" name="streetno" value="{{$hotel->streetno}}">
        </div>
        <div class="field">
          <label>ZIP/City</label>
          <input type="text" class="sm-input" name="zip" value="{{$hotel->zip}}">
          <input type="text" name="city" value="{{$hotel->city}}">
        </div>
        <div class="part2">
          <div class="field">
            <label>Phone</label>
            <input type="text" name="phone" value="{{$hotel->phone}}">
          </div>
          <div class="field">
            <label>E-mail</label>
            <input type="email" name="e_mail" value="{{$hotel->e_mail}}">
          </div>
          <div class="field">
            <label>Fax</label>
            <input type="text" name="fax" value="{{$hotel->fax}}">
          </div>
          <div class="field">
            <label>Internet</label>
            <input type="text" name="internet" value="{{$hotel->internet}}">
          </div>
          <div class="field">
            <label>Google Coordinates</label>
            <input type="text" name="google_coordinates" value="{{$hotel->google_coordinates}}">
          </div>

        </div>
        <h3 class="form-name">General Information</h3>
        <div class="field">
          <label>Stars*</label>
          <select id="lbl-028" name="stars">

            <option value="0" @if($hotel->stars=="0") selected @endif>0</option>
            <option value="2" @if($hotel->stars=="2") selected @endif>2</option>
            <option value="3" @if($hotel->stars=="3") selected @endif>3</option>
            <option value="3.5" @if($hotel->stars=="3.5") selected @endif>3.5</option>
            <option value="4" @if($hotel->stars=="4") selected @endif>4</option>
            <option value="4.5" @if($hotel->stars=="4.5") selected @endif>4.5</option>
            <option value="5" @if($hotel->stars=="5") selected @endif>5</option>
            <option value="5.5" @if($hotel->stars=="5.5") selected @endif>5.5</option>
            <option value="6" @if($hotel->stars=="6") selected @endif>6</option>
          </select>
        </div>
        <div class="text-danger">
        @error('stars')
        <span>{{ $message}}</span>
         @enderror
       </div>
        <div class="field">
          <label>Hotelcategory*</label>
          @php
            $hotel->hotelcategory1 = explode(",",$hotel->hotelcategory1);
            //var_dump($hotel->hotelcategory1);
            @endphp
          <select id="lbl-029" name="hotelcategory1[]" multiple="multiple" class="js-example-basic-single1">

            <option value="1" {{in_array("1", $hotel->hotelcategory1 ?: []) ? "selected": ""}}>Diver</option>
            <option value="2" {{in_array("2", $hotel->hotelcategory1 ?: []) ? "selected": ""}}>Familienfreundlich</option>
            <option value="3" {{in_array("3", $hotel->hotelcategory1 ?: []) ? "selected": ""}}>Luxury</option>
            <option value="4" {{in_array("4", $hotel->hotelcategory1 ?: []) ? "selected": ""}}>Honeymoon</option>
            <option value="5" {{in_array("5", $hotel->hotelcategory1 ?: []) ? "selected": ""}}>Die besten All Inclusive Resorts</option>
            <option value="6" {{in_array("6", $hotel->hotelcategory1 ?: []) ? "selected": ""}}>Friends of the Maldives
            </option>
            <option value="7" {{in_array("7", $hotel->hotelcategory1 ?: []) ? "selected": ""}}>Adults Only</option>
            <option value="8" {{in_array("8", $hotel->hotelcategory1 ?: []) ? "selected": ""}}>Guesthouse</option>
            <option value="9" {{in_array("9", $hotel->hotelcategory1 ?: []) ? "selected": ""}}>Resortinseln</option>
            </select>
        </div>
        <div class="text-danger">
          @error('hotelcategory1')
        <span>{{$message}}</span>
         @enderror
       </div>


        <div class="field">
          <label>Number of rooms*</label>
          <input type="text" name="number_rooms" value="{{$hotel->number_rooms}}">
        </div>
        <div class="text-danger">
          @error('number_rooms')
        <span>{{$message}}</span>
         @enderror
       </div>
       	<!-- Changed Invoice Currency to Hotel Currency -->
        <div class="field">
          <label>Hotel Currency*</label>
          <select id="lbl-032" name="invoice_currency" >

            <!-- <option value="{{$hotel->invoice_currency}}">{{$hotel->invoice_currency}}</option> -->
            <option value="euro" @if($hotel->invoice_currency == 'euro') selected @endif >Euro (&euro;)</option>
            <option value="usd" @if($hotel->invoice_currency == 'usd') selected @endif >USD ($)</option>
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
            <input type="text" name="credit_cards" value="{{$hotel->credit_cards}}">
            <p class="input-desc">visa;mc;ae;up;dc</p>
            <p class="input-desc"><i>Don't add space after</i> <b>;</b></p>
          </div>
        </div>

        <h3 class="form-name">Default Values</h3>
        <div class="field">
          <label>Minimum stay*</label>
          <select id="lbl-033" name="minimum_stay">
            <option value="{{$hotel->minimum_stay}}">{{$hotel->minimum_stay}}</option>
            <option value="3" @if($hotel->minimum_stay == '3') selected @endif>3 nights</option>
            <option value="4"@if($hotel->minimum_stay == '4') selected @endif>4 nights</option>
            <option value="5" @if($hotel->minimum_stay == '5') selected @endif>5 nights</option>
            <option value="7" @if($hotel->minimum_stay == '7') selected @endif>7 nights</option>
            <option value="10" @if($hotel->minimum_stay == '10') selected @endif>10 nights</option>
            <option value="14" @if($hotel->minimum_stay == '14') selected @endif>14 nights</option>
          </select>
        </div>
         <div class="text-danger">
          @error('minimum_stay')
        <span>{{$message}}</span>
         @enderror
       </div>

        <div class="field field-right">
          <div class="input-wrap">
            <textarea id="lbl-020" rows="5" name="minimum_text">{{$hotel->minimum_text}}</textarea>
            <p class="input-desc">Minimum stay at Christmas and New Year and the rest of the year</p>
          </div>
        </div>


        <div class="field">
          <label>Board*</label>
          <select id="lbl-034" name="board" >

            <option value="breakfast" @if($hotel->board=="breakfast") selected @endif>Frühstück</option>
            <option value="halfboard" @if($hotel->board=="halfboard") selected @endif>Halbpension</option>
            <option value="fullboard" @if($hotel->board=="fullboard") selected @endif>Vollpension</option>
            <option value="all inclusive" @if($hotel->board=="all inclusive") selected @endif>All Inclusive</option>
            <option value="Silver All Inclusive" @if($hotel->board=="Silver All Inclusive") selected @endif>Silver All Inclusive</option>
          </select>
        </div>
          <div class="text-danger">
          @error('board')
        <span>{{$message}}</span>
         @enderror
       </div>
       <div class="field">
          <label>Diving Bases</label>
          @php
            $hotel->divingbases = explode(",",$hotel->divingbases);
            //var_dump($hotel->divingbases);
            @endphp
          <select id="lbl-0291" name="divingbases[]" multiple="multiple" class="js-example-basic-single1">

            <option value="1" {{in_array("1", $hotel->divingbases ?: []) ? "selected": ""}}>Euro Divers</option>
            <option value="2" {{in_array("2", $hotel->divingbases ?: []) ? "selected": ""}}>Werner Lau</option>
            <option value="3" {{in_array("3", $hotel->divingbases ?: []) ? "selected": ""}}>Ocean Dimensions</option>
            <option value="4" {{in_array("4", $hotel->divingbases ?: []) ? "selected": ""}}>Joy Dive Maldives</option>
            <option value="5" {{in_array("5", $hotel->divingbases ?: []) ? "selected": ""}}>Providers Maldives</option>

            </select>
        </div>
        <div class="text-danger">
          @error('hotelcategory1')
        <span>{{$message}}</span>
         @enderror
       </div>
        <div class="field">
          <label>Accessible</label>
          <select id="lbl-035" name="accessible">

            <option value="yes" @if($hotel->accessible=="yes") selected @endif>Ja</option>
            <option value="no" @if($hotel->accessible=="no") selected @endif>Nein</option>
            <option value="Teilweise" @if($hotel->accessible=="Teilweise") selected @endif>Teilweise</option>
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
          <textarea id="lbl-019" rows="5" name="wifi">{{$hotel->wifi}}</textarea>
      </div>
        </div>
        <h3 class="form-name">Child Policy for Room Rates</h3>
        <div class="field field-right">
          <div class="input-wrap">
          <textarea id="lbl-019" rows="5" name="child_policy_for_rates">{{$hotel->child_policy_for_rates}}</textarea>
      </div>
        </div>
        <div class="field">
          <label>Baby</label>
          <input type="text" class="sm-input" name="cpfr_baby_min" value="{{$hotel->cpfr_baby_min}}">
          <input type="text" class="sm-input" name="cpfr_baby_max" value="{{$hotel->cpfr_baby_max}}">
          Years
        </div>

        <div class="field">
          <label>Child</label>
          <input type="text" class="sm-input" name="cpfr_child_min" value="{{$hotel->cpfr_child_min}}">
          <input type="text" class="sm-input" name="cpfr_child_max" value="{{$hotel->cpfr_child_max}}">
          Years
        </div>

        <div class="field">
          <label>Teen</label>
          <input type="text" class="sm-input" name="cpfr_teen_min" value="{{$hotel->cpfr_teen_min}}">
          <input type="text" class="sm-input" name="cpfr_teen_max" value="{{$hotel->cpfr_teen_max}}">
          Years
        </div>

        <div class="field">
          <label>Adult</label>
          <input type="text" class="sm-input" name="cpfr_adult_min" value="{{$hotel->cpfr_adult_min}}">
          <input type="text" class="sm-input" name="cpfr_adult_max" value="{{$hotel->cpfr_adult_max}}">
          Years
        </div>
      </div>
      <div class="details-form" style="padding-left: 10px;">
        <h3 class="form-name">On- / Offline</h3>
        <div class="bookable">
          <div class="switch">
            <p>Hotel online bookable</p>
            <div class="custom-check">
              @php
              //dd($hotel);
              @endphp
              <input type="checkbox" class="chk" name="bstatus" id="lbl-00001" @if($hotel->online_bookable ==1) checked @endif>
              <label for="lbl-00001">Hotel online bookable</label>
            </div>
          </div>
          <p>The hotel can still be seen online on the website. <br> However, it is not bookable for customers. It appears "On request".</p>
        </div>

         <h3 class="form-name form-name-img" style="margin-bottom: 10px">Teaser Images <span class="chooseimg float-right">
                  <input type="file" style="display:none;" title="Choose Images" id="files" name="file[]" multiple="multiple">
                  <label class="chooseimg1" for="files">Choose Images</lable></span> </h3>
                  <p style="color: #b0b0b0">Recommended Image size 1024 x 768*</p>
        <div class="image" id="image" class="img-fluid">
          @foreach($hotel_image as $hotel_img)
        <div class="images-box">

          <div class="image">
            <img src="{{url('/images/hotel-galleries/'.$hotel->id.'/others/'.$hotel_img->h_image)}}" alt="#">
          </div>
          <p class="img-name">{{$hotel_img->h_image}}</p>
          <a href="{{route('hotel-image-delete', $hotel_img->id)}}" class="btn-delete" onclick="return confirm(' you want to delete?');">
            <span class="far fa-trash-alt"></span>
            <span></span>
          </a>
        </div>
        @endforeach
        </div>


      <h3 class="form-name form-name-img">Hotel Banner Image <span class="chooseimg float-right">
                  <input type="file" style="display:none;" title="Choose Images" id="files2" name="file2[]" multiple="multiple">
                  <label class="chooseimg1" for="files2">Choose Images</lable></span> </h3>
        <div class="image" id="image2" class="img-fluid">
          @foreach($hotel_detail_image as $hotel_img)
        <div class="images-box">

          <div class="image">
            <img src="{{url('/images/hotel-galleries/'.$hotel->id.'/others/hoteldetail/'.$hotel_img->h_image)}}" alt="#">
          </div>
          <p class="img-name">{{$hotel_img->h_image}}</p>
          <a href="{{route('hotel-detail-image-delete', $hotel_img->id)}}" class="btn-delete" onclick="return confirm(' you want to delete?');">
            <span class="far fa-trash-alt"></span>
            <span></span>
          </a>
        </div>
        @endforeach
      </div>

        <h3 class="form-name">SEO Tag section</h3>
        <div class="field">
            <label>Meta title</label>
            <input type="text" name="meta_title" value="{{$hotel->meta_title}}">
          </div>
          <div class="field">
            <label>Meta Description</label>
            <input type="text" name="meta_description" value="{{$hotel->meta_description}}">
          </div>
          <div class="field">
            <label>Meta keyword</label>
            <input type="text" name="meta_keyword" value="{{$hotel->meta_keyword}}">
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
    $('#hDetails').addClass('active');
});

</script>


<!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> -->

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
          $('#image').append("<div class=\"col-md-2\"> " +
            "<img class=\"imageThumb\" style=\"\" src=\"" + e.target.result + "\" title=\"" +  e.target.name + "\"/>" +
            "</div>");


        });
        fileReader.readAsDataURL(f);
      }
    });


    $("#files2").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $('#image2').append("<div class=\"col-md-2\"> " +
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
