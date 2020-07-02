
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
@if(session()->has('pesan'))
<div class="alert alert-danger text-center" role="alert">
{{ session()->get('pesan')}}
</div>
@endif
<div class="row">

    <form action="{{route('lanjut_ujian')}}" method="post">
        @csrf
        <input type="hidden" name="attemp" value="{{$ujian_aktif[0]->attemp}}">
        <input type="hidden" name="status" value="2">
        <input type="hidden" name="id" value="{{$ujians[0]->id}}">
        <input type="hidden" name="id_subject" value="{{$ujians[0]->id_subject}}">
        <input type="hidden" name="id_cikgu" value="{{$ujians[0]->id_cikgu}}">
        <input type="hidden" name="id_ujian" value="{{$ujian_aktif[0]->id_penilaian}}">

        <input type="hidden" name="status" value="2">
    <table class="table">
   
        <tr>
            <td>Msta Pelajaran</td>
            <td >:</td>
            <td>{{$ujians[0]->subject_name}}</td>
        </tr>
        <tr>
            <td>Pengampu</td>
            <td >:</td>
            <td>{{$ujians[0]->cikgu_name}}</td>
        </tr>
        <tr>
            <td>Materi</td>
            <td >:</td>
            <td>{{$ujians[0]->materi}}</td>
        </tr>
        <tr>
            <td>Tanggal Mulai</td>
            <td >:</td>
            <td>{{$ujians[0]->tanggal_mulai}} {{$ujians[0]->waktu_mulai}}</td>
        </tr>
        <tr>
            <td>Tanggal Selesai</td>
            <td >:</td>
            <td>{{$ujians[0]->tanggal_selesai}} {{$ujians[0]->waktu_selesai}}</td>
        </tr>
        <tr>
            <td>Sisa Waktu</td>
            <td >:</td>
            <td>{{$ujian_aktif[0]->sisa_waktu}} </td>
        </tr>
        <tr>
            <td>Status</td>
            <td >:</td>
            @if($ujians[0]->status == 1)
            <td>Aktif</td>
            @else
            <td>Tidak Aktif</td>
            @endif
        </tr>
        
    </table>

</div>
<button type="submit" class="btn btn-success">Lanjutkan</button>
</form>
</div>
    
@endsection
