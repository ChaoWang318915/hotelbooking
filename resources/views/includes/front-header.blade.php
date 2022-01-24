<header id="header" class="type3">
   
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
  <script src="{{asset('js/front/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('js/front/jquery-ui.min.js')}}"></script>
	<script src="{{asset('js/front/slick.min.js')}}"></script>
	<script src="{{asset('js/front/autocomplete-resorts.js')}}"></script>
	<script src="{{asset('js/front/datepicker.js')}}"></script>
	<script src="{{asset('js/front/datepicker-de.js')}}"></script>
	<script src="{{asset('js/front/lazyloader.js')}}"></script>
	<script src="{{asset('js/front/jquery.sticky-kit.min.js')}}"></script>
	<script src="{{asset('js/front/lozad.min.js')}}"></script>
	<script src="{{asset('js/front/jquery.fancybox.min.js')}}"></script>
	<script src="{{asset('js/front/jquery-ui-touch-punch.min.js')}}"></script>
	<script src="{{asset('js/front/jquery.nicescroll.min.js')}}"></script>
	<script src="{{asset('js/front/select2.min.js')}}"></script>
	<style>
	.ui-autocomplete 
	{
	  height: 200px;
	  overflow-y: auto;
	}
	</style>
<div class="container">
<div class="header-row">
<strong class="logo"><a href="https://www.my-maldives.com" title="Zur Startseite">Meine Malediven</a></strong>
<div class="header-body">
<div class="header-search-form">
	
<form method="post" action="{{route('hotel-search-autocomplete')}}">
 @csrf
<input placeholder="Sag uns wohin du möchtest oder welche Interessen du hast"  autocomplete="off" type="test" name="hotel_name" class="form-control typeahead" id="typeahead">
<span class="btn-search">
 
</span>
</form>
</div></div>

<nav class="main-nav type2">
 
<ul>
<li><a href="#" title="LOGIN">LOGIN</a></li>
</ul>
</nav>

<a href="#" class="btn-menu d-lg-none"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></a>
</div></div>
 
<script type="text/javascript">
	 
	var path = "{{route('autocomplete')}}"
	 $(document).ready(function() {	 		
	    $("#typeahead").autocomplete({	  
	        source: function(request, response) {
	            $.ajax({
	            url: path,
	            data: {
	                    term : request.term
	             },
	            dataType: "json",
	            success: function(data){
	               var resp = $.map(data,function(obj){	               	 
	                    return obj.hotel_name;
	               }); 
	  
	               response(resp);
	            }
	        });
	    },
	     minLength: 1
	 });
	});

	
</script>
</header>
