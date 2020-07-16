<h4 class="mt-5 mb-3 text-center"> TUGAS / PENGUMUMAN </h4>
                       <ol class="breadcrumb mb-4">
                           <li class="breadcrumb-item active">
                             <div class="text-center">silahkan cek pengumuman terbaru</div>
                           
                           </li>
                       </ol>
</h4>  

<style>
    .tab{
        font-size:12px;
    }
    .box{
        box-shadow: 2px 2px 10px grey;
      }

</style>
<div class="card-group">
@forelse($umums as $umum)

  <div class="card box mb-2">

    <div class="card-body">
        <div class="border-bottom pb-2">
        <table class="table table-borderless tab">
            <tr>
                <th>Tanggal</th>
                <th>:</th>
                <th>{{$umum->tanggal}}</th>
            </tr>
            <tr>
                <th>Pengampu</th>
                <th>:</th>
                <th>{{$umum->cikgu_name}}</th>
            </tr>
            <tr>
                <th>Mata Pelajaran</th>
                <th>:</th>
                <th>{{$umum->subject_name}}</th>
            </tr>
        </table>
        </div>
    <div class="p-3">
      <h6>Tugas :</h6>
      <p class="card-text text-justify">{!!$umum->pengumuman!!}</p>
      </div>
    </div>
  </div>

</div>


@empty
@endforelse
  
