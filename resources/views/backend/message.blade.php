@if (Session::has('success'))
    <div class="animated fadeInDown alert alert-success" role="alert">
       {{Session::get('success')}}
    </div>
@endif

@if (Session::has('delete'))
    <div class="animated fadeInDown alert alert-danger" role="alert">
       {{Session::get('delete')}}
    </div>
@endif
