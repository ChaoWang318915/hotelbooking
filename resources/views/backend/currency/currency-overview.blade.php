@extends('layouts.backend')
@section('content')

    	<div class="d-flex">
      		<div class="main-sidebar"></div>
    		<div class="content-area">
        		<nav class="content-menu d-flex">
					<ul class="nav">
						<!-- <li><a href="{{url('/add-currency')}}"><span class="fas fa-plus"></span>add currency</a></li> -->
					</ul>
				</nav>
        <!-- /content-menu -->
@php

$exchanges = \App\Currency::all();
@endphp
        		<div class="hotel-admin">
					<table class="hotel-admin-table" style="margin-top: 46px !important">
						<thead>
							<tr >
								
								<th>ID</th>
								<th>Currency </th>
                				<th></th>
								<th></th>
								<th>Symbol</th>
								<th>Base</th>
								<th>Exchange Rate</th>
								<th>Exchange Value</th>
								<th>Last Updated By Cron</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($exchanges as $exchange)
							<tr class="cr12">
								
								<td>{{$exchange->id}}</td>
								<td>{{$exchange->title}}</td>
								<td></td>
								<td></td>
								<td> {{$exchange->symbol}}</td>
								<td>{{$exchange->base}}</td>
								<td>{{$exchange->exchange_rate}}</td>
								<td>{{$exchange->exchange_value}}</td>
								<td>{{$exchange->updated_at}}</td>
								<!-- <td class="btn-holder">
									<a href="#" class="btn-delete">
										<span class="far fa-trash-alt"></span>
										<span>Delete</span>
									</a>
								</td> -->
							</tr>

							@endforeach
							
						</tbody>
					</table>
				</div>
      		</div>
    	</div>

		<!-- <script>
   			$(function () {
      		var table = $('#example1').DataTable({
        	dom: 'rtip',

        	// 'paging'      : true,
        	// 'lengthChange': true,
        	// 'searching'   : true,
        	'ordering'    : true,
        	// 'info'        : true,
        	'autoWidth'   : true,
      		})
		});
  </script> -->
@endsection
