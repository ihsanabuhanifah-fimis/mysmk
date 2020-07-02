
@extends('siswa.layout.master2')
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
<h5 class="mt-2 text-center">Validasi Ujian</h5>

<div class="container">
<div class="container">
@if(session()->has('pesan'))
<div class="alert alert-danger text-center" role="alert">
{{ session()->get('pesan')}}
</div>
@endif


    <form action="{{route('kerjakan_ujian')}}" method="post">
        @csrf
        <input type="hidden" name="attemp" value="{{$attemp}}">
    <table class="table table-borderless">
        <input type="hidden" name="id" value="{{$ujians[0]->id}}">
        <tr>
            <th>Mata Pelajaran</th>
            <td >:</td>
            <td>{{$ujians[0]->subject_name}}</td>
        </tr>
        <tr>
            <th>Pengampu</th>
            <td >:</td>
            <td>{{$ujians[0]->cikgu_name}}</td>
        </tr>
        <tr>
            <th>Materi</th>
            <td >:</td>
            <td>{{$ujians[0]->materi}}</td>
        </tr>
        @if($ujians[0]->disable_waktu == 2)
        <tr>
            <th>Tanggal Mulai</th>
            <td >:</td>
            <td>{{$ujians[0]->tanggal_mulai}} {{$ujians[0]->waktu_mulai}}</td>
        </tr>
        <tr>
            <th>Tanggal Selesai</th>
            <td >:</td>
            <td>{{$ujians[0]->tanggal_selesai}} {{$ujians[0]->waktu_selesai}}</td>
        </tr>
        @else
        <tr>
            <th>Status</th>
            <td>:</td>
            <td>Aktif</td>
        </tr>
        <tr>
            <th>Tanggal Mulai</th>
            <td >:</td>
            <td>-</td>
        </tr>
        <tr>
            <th>Tanggal Selesai</th>
            <td >:</td>
            <td>-</td>
        </tr>
        @endif
        <tr>
            <th>Durasi</th>
            <td >:</td>
            <td>{{$ujians[0]->durasi}} </td>
        </tr>
        
        
    </table>

</div>
<button type="submit" class="btn btn-success">Kerjakan</button>
</form>
</div>
</div>
    
@endsection
