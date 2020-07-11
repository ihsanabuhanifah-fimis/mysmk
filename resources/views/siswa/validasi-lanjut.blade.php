
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
<div class="mt-5">
<h5 class="mt-2 text-center">LANJUTKAN PENILAIAN</h5>
</div>
<div class="container">
@if(session()->has('pesan'))
<div class="alert alert-danger text-center" role="alert">
{{ session()->get('pesan')}}
</div>
@endif


    <form action="{{route('lanjut_ujian')}}" method="post">
        @csrf
        <input type="hidden" name="attemp" value="{{$ujian_aktif[0]->attemp}}">
        <input type="hidden" name="status" value="2">
        <input type="hidden" name="id" value="{{$ujians[0]->id}}">
        <input type="hidden" name="id_subject" value="{{$ujians[0]->id_subject}}">
        <input type="hidden" name="id_cikgu" value="{{$ujians[0]->id_cikgu}}">
        <input type="hidden" name="id_ujian" value="{{$ujian_aktif[0]->id_penilaian}}">

        <input type="hidden" name="status" value="2">
        <div class="mt-3 card p-sm-1 p-md-4 pl-md-5">
        <div class="card-title ">
    <table class="table table-borderless">
   
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
        <tr>
            <th>Sisa Waktu</th>
            <td >:</td>
            <td>{{$ujian_aktif[0]->sisa_waktu}} </td>
        </tr>
        <tr>
            <th>Status</th>
            <td >:</td>
            @if($ujians[0]->status == 1)
            <td>Aktif</td>
            @else
            <td>Tidak Aktif</td>
            @endif
        </tr>
     
    </table>
    <button type="submit" class="form-control btn-success mt-4">Lanjutkan</button>
    </div></div>

</div>

</form>

    
@endsection
