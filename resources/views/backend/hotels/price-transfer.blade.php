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
						<li><a href="#"><span class="far fa-save"></span>save</a></li>
						<li><a href="#"><span class="far fa-edit"></span>edit</a></li>
						<li><a href="#"><span class="far fa-trash-alt"></span>delete</a></li>
						<li><a href="#"><span class="fas fa-plus"></span>add images</a></li>
					</ul>
				</nav>
  <!-- /content-menu -->
@include('includes.inner_nav')
  <!-- /main-tabset -->
  <div class="content-rates">
    <div class="tab-sidebar">
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
            <li><a href="{{url('/price-transfers')}}">27.12.2018 - 10.01.2019</a></li>
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
    </div>

    <div class="price-content content">
      <form action="#" class="transfer-form">
        <div class="details-form">
          <h3 class="form-name">Transfer</h3>
          <div class="field">
            <div class="fied-item">
              <label>Name</label>
              <input type="text" name="transfer_name">
            </div>

            <div class="fied-item">
              <label>Rates</label>
              <div class="items">
                <div class="item">
                  <input type="text" name="trates_adult">
                  <label>Adult</label>
                </div>
                <div class="item">
                  <input type="text" name="trates_child">
                  <label>Child</label>
                </div>
                <div class="item">
                  <input type="text" name="trates_baby">
                  <label>Baby</label>
                </div>
                <div class="item">
                  <input type="text" name="trates_teen">
                  <label>Teen</label>
                </div>
              </div>
            </div>
          </div>

          <div class="field field-desc">
            <label>Description</label>
            <textarea id="lbl-022" rows="12" name="transfer_description"></textarea>
          </div>

        </div>
        <div class="details-form">
          <h3 class="form-name form-name-img">Images</h3>
          <div class="images-box">
            <div class="image">
              <img src="images/default-img.jpg" alt="#">
            </div>
            <p class="img-name">ichbineeinbildername.jpg</p>
            <a href="#" class="btn-delete">
              <span class="far fa-trash-alt"></span>
              <span>Delete</span>
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<script>
$(document).ready(function(){
    $('#transfer').addClass('active');
});
</script>
@endsection
