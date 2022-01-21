@extends('layouts.backend')
@section('content')

        <!-- /content-menu -->
      <div class="d-flex">
        <div class="main-sidebar"></div>
        <div class="content-area">
  				<nav class="content-menu">
  					<ul class="nav">
  						<li><a href="currency-overview.html"><span class="fas fa-chevron-left"></span>back</a></li>
  						<li><a href="#"><span class="far fa-save"></span>save</a></li>
  					</ul>
  				</nav>
  				<!-- /content-menu -->
  				<div class="content">
  					<div class="details-form">
  						<h3 class="form-name">Add Currency</h3>
  						<form action="#">
  							<div class="field">
  								<label>Currency</label>
  								<input type="text">
  							</div>

  								<div class="field">
  									<label>Symbol</label>
  									<input type="text">
  								</div>
  							  <div class="field">
  								  <label>Exchange Rate</label>
  								  <input type="text">
  							  </div>
  							  <div class="field field-disc-check">
  								  <label>Default Currency</label>
  								  <input type="checkbox">
  								  <p class="desc" style="margin-left: 20px;">Default currency is the currency you want see on the frontend. </p>
  						    </div>
  						</form>
  					</div>
  				</div>
  			</div>
      </div>

@endsection
