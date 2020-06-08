@extends('admin.layout.master')
@section('title','Daftar User')

@section('content')
<script>
      $(document).ready(function() {
        $('#tabel-data').DataTable();
      } );
  </script>
<h4 class="text-center mb-4 mt-4">Daftar User</h4>
<div class="conteiner">
<table class="table mt-2 border id="tabel-data">
<thead class="">
    <tr>
        <th class="text-center">No</td>
        <th>Nama</td>
        <th>Username</td>
        <th class="text-center">Nisn</th>
        <th class="text-center">Email</th>
        <th>Tempat, Tanggal Lahir</th>
        <th class="text-center" colspan="2">Action</th>
        
    </tr>
</thead>
<tbody class=>
@forelse ($users as $user)
<tr>
    <td class="text-center">{{$loop->iteration}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->username}}</td>
    <td class="text-center">{{$user->nisn}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->tempat}}, {{$user->tanggal}}</td>
    <td><a href="{{route('admin.edituser',['id'=>$user->id])}}">Ubah</a></td>
    <td><a href="">Hapus</a></td>
</tr>

@empty

@endforelse
</tbody>
</table>
</div>
@endsection