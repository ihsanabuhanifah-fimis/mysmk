
@extends('guru.layout.master2')
@section('title','Validasi Penilaian')

@section('content')

 <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
               
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                 
            </div>
        </div>
    </div>
<!-- awal web -->
<div class="mt-5">
<h5 class="mt-2 text-center font-weight-bold">VALIDASI PENILAIAN </h5>
</div>
<div class="container">
<div class="container">
@if(session()->has('pesan'))
<div class="alert alert-danger text-center" role="alert">
{{ session()->get('pesan')}}
</div>
@endif


</div>
</div>
    
@endsection
