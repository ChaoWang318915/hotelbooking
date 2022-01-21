@extends('layouts.backend')
@section('content')
<!-- <div class="container">
    <div class="row justify-content-center"> -->
      <div class="d-flex">
      <div class="main-sidebar"></div>
      <div class="content-area">
        <nav class="content-menu">
          <ul class="nav">
            <li><a href="price-overview.html"><span class="fas fa-chevron-left"></span>back</a></li>
            <li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
            <li><a href="#"><span class="far fa-edit"></span>edit</a></li>
            <li><a href="#"><span class="far fa-trash-alt"></span>delete</a></li>
            <li><a href="add-images.html"><span class="fas fa-plus"></span>add images</a></li>
          </ul>
        </nav>
  <!-- /content-menu -->
@include('includes.inner_nav')
  <!-- /main-tabset -->
     <?php 
      $hid=request()->route('id');
      $did=request()->route('did');
      ?>
  <div class="content-rates">
   <!--  <div class="tab-sidebar">
      <div class="tab-sidebar-box">
     <h3>Room Rates</h3>
        <nav>
          <ul>
            <li><a href="{{url('/add-prices')}}">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
          </ul>
        </nav>
      </div>
      <div class="tab-sidebar-box">
        <h3>Menuplan</h3>
        <nav>
          <ul>
            <li><a href="{{url('/price-menuplan')}}">27.12.2018 - 10.01.2019</a></li>
          </ul>
        </nav>
      </div>
      <div class="tab-sidebar-box">
        <h3>Transfer</h3>
        <nav>
          <ul>
            <li><a href="{{('/price-transfer')}}">27.12.2018 - 10.01.2019</a></li>
          </ul>
        </nav>
      </div>
      <div class="tab-sidebar-box">
        <h3>Additional Service</h3>
        <nav>
          <ul>
            <li><a href="{{url('/price-additional-service')}}">27.12.2018 - 10.01.2019</a></li>
          </ul>
        </nav> 
      </div>
    </div> -->

    <div class="price-content content">
      <form action="{{route('price-menuplan-update',[$hid,$did])}}" method="post" class="transfer-form" id="pricemenu" enctype="multipart/form-data">
        @csrf
        <div class="details-form">
          <h3 class="form-name">Menuplan</h3>
          <div class="field">
            <div class="fied-item">
              <label>Name</label>
              <input type="text" name="menuplan_name" value="{{old('menuplan_name', isset($rd) ? $rd->menuplan_name : '') }}">
            </div>

            <div class="fied-item">
              <label>Rates</label>
              <div class="items">
                <div class="item">
                  <input type="text" name="rates_adult" value="{{old('rates_adult', isset($rd) ? $rd->rates_adult : '') }}">
                  <label>Adult</label>
                </div>
                <div class="item">
                  <input type="text" name="rates_child" value="{{old('rates_child', isset($rd) ? $rd->rates_child : '') }}">
                  <label>Child</label>
                </div>
                <div class="item">
                  <input type="text" name="rates_baby" value="{{old('rates_baby', isset($rd) ? $rd->rates_baby : '') }}">
                  <label>Baby</label>
                </div>
                <div class="item">
                  <input type="text" name="rates_teen" value="{{old('rates_teen', isset($rd) ? $rd->rates_teen : '') }}">
                  <label>Teen</label>
                </div>
              </div>
            </div>
          </div>

          <div class="field field-desc">
            <label>Description</label>
            <textarea id="lbl-022" rows="12" name=menuplan_description>{{old('menuplan_description', isset($rd) ? $rd->menuplan_description : '') }}</textarea>
          </div>

        </div>
        <div class="details-form">
      <div class="form-room-item">
        <h3 class="form-name form-name-img">Images <span class="chooseimg float-right">
                  <input type="file" style="display:none;" title="Choose Images" id="files" name="file" multiple="multiple">
                  <label class="chooseimg1" for="files">Choose Images</lable></span></h3>
        <!-- <div>
                  <input type="file" id="files" name="file[]" multiple="multiple">
                </div> -->
                
                  <div class="image" id="image" class="img-fluid">
                    
                  
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
    $('#rates').addClass('active');
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
  <script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#pricemenu').submit();
 });
});
</script> 

@endsection
