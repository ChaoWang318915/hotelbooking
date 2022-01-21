@extends('layouts.backend')
@section('content')
<?php 
        $hid=request()->route('id');
         ?>
<div class="d-flex">
  <div class="main-sidebar"></div>
  <div class="content-area">
    <nav class="content-menu">
      <ul class="nav">
        <li><a href="{{url('/restaurants-bars-overview',$hid)}}"><span class="fas fa-chevron-left"></span>back</a></li>
        <li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
        <!-- <li><a href="add-images.html"><span class="fas fa-plus"></span>add images</a></li> -->
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
    <div class="content content-rest">
      <div class="restaurants-tabs">
        <ul>
          <li><a href="{{url('/add-restaurants',$hid)}}">Restaurant</a></li>
          <li><a href="{{url('/add-bars',$hid)}}">Bar</a></li>
          <li  class="active"><a href="{{url('/add-menuplan',$hid)}}">Menuplan</a></li>
        </ul>
      </div>
      <div class="details-form details-form-menu">
        <form action="{{route('menuplan-create',$hid)}}" method="post" id="menu_form">
          @csrf
          <!-- <div class="child-policy-box"> -->
            <h3 class="form-name">Child Policy</h3>
              <div class="field">
                <label>Baby</label>
                <input style="margin-right: 10px" type="text" name="baby" value="{{ old('baby') }}">
                
                <input type="text" name="baby_age" value="{{ old('baby_age') }}">
              </div>

              <div class="field">
                <label>Child</label>
                <input style="margin-right: 10px" type="text" name="child" value="{{ old('child') }}">
                
                <input type="text" name="child_age" value="{{ old('child_age') }}">
              </div>

              <div class="field">
                <label>Adult</label>
                <input style="margin-right: 10px" type="text" name="adult" value="{{ old('adult') }}">
                
                <input type="text" name="adult_age" value="{{ old('adult_age') }}">

              </div>
           <!--    <div class="field">
                <label>Kind</label>
                <input type="text" name="kind" value="{{ old('kind') }}">
              </div> -->
              <!-- <div class="field">
                <label>(Alter) Kind & Erwachsener </label>
                <select  name = "kind">
                    <option value = "Kind">Kind</option>
                    <option value = "Erwachsener">Erwachsener</option>
                </select>
              </div> -->
             <!--  <div class="field">
                <label>Erwachsener</label>
                <input type="text" name="erwachsener" value="{{ old('erwachsener') }}">
              </div>
          </div> -->

          <div class="menu-plan-item">
            <h3 class="form-name">Menuplan 1</h3>
            <div class="field">
              <label>Menuplan name</label>
              <input type="text" name="menuplan_name1" value="{{ old('menuplan_name1') }}">
            </div>
            <div class="field">
              <label for="lbl-008">Description</label>
              <textarea id="lbl-008" rows="6" name="description1"></textarea>
            </div>
            <div class="field">
              <label for="lbl-009">Terms</label>
              <textarea id="lbl-009" rows="6" name="terms1"></textarea>
            </div>
          </div>
          <div class="menu-plan-item">
            <h3 class="form-name">Menuplan 2</h3>
            <div class="field">
              <label>Menuplan name</label>
              <input type="text" name="menuplan_name2" value="{{ old('menuplan_name2') }}">
            </div>
            <div class="field">
              <label for="lbl-010">Description</label>
              <textarea id="lbl-010" rows="6" name="description2"></textarea>
            </div>
            <div class="field">
              <label for="lbl-011">Terms</label>
              <textarea id="lbl-011" rows="6" name="terms2" value="{{ old('terms2') }}"></textarea>
            </div>
          </div>
          <div class="menu-plan-item">
            <h3 class="form-name">Menuplan 3</h3>
            <div class="field">
              <label>Menuplan name</label>
              <input type="text" name="menuplan_name3" value="{{ old('menuplan_name3') }}">
            </div>
            <div class="field">
              <label for="lbl-012">Description</label>
              <textarea id="lbl-012" rows="6" name="description3"></textarea>
            </div>
            <div class="field">
              <label for="lbl-013">Terms</label>
              <textarea id="lbl-013" rows="6" name="terms3"></textarea>
            </div>
          <!-- </div> -->
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $('#rest_bar').addClass('active');
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#menu_form').submit();
 });
});
</script>
@endsection
