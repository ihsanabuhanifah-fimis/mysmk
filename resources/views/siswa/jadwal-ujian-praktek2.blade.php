
<script>
    $(document).ready( function () {
        $('#myPraktek').DataTable();
    } );
    </script>
<style>
.font{
    font-size:12px;
}
</style>
<div class="mt-3 p-md-4 p-sm-0 border">
<table id="myPraktek" class="table table-bordered table-striped mt-2 table-responsive-sm">
<p class="d-flex justify-content-end font"><i>*Nilai akhir adalah nilai yang diberikan oleh Guru Pengampu</i></p>
    <thead class="bg-success">
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Materi</th>
            <th>Pengampu</th>
            <th>Jenis Ujian</th>
            <th>Tipe Ujian</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Masuk</th>
        
           
            
        </tr>
    </thead>
    <tbody>
    <?php $k=0 ;?>
        @forelse ($ujians as $ujian)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$ujian->subject_name}}</td>
            <td>{{$ujian->materi}}</td>
            <td>{{$ujian->cikgu_name}}</td>
            <td>{{$ujian->nama_ujian}}</td>
            <td>{{$ujian->nama_tipe}}</td>
            @if($ujian->tanggal_mulai == 0)

            <td >-</td>
            @else
            <td>{{$ujian->tanggal_mulai}} <br> {{$ujian->waktu_mulai}}</td>
            @endif
            @if($ujian->tanggal_selesai == 0)
            <td>-</td>
            @else
            <td>{{$ujian->tanggal_selesai}} <br> {{$ujian->waktu_selesai}}</td>
            @endif
            <td><a href="{{route('masuk_ujian_praktek',['id'=>$ujian->id])}}" class="btn btn-primary kerjakan-soal">Masuk</a></td>
           
          
            
        </tr>

        <?php $k++ ; ?>
        @empty
        <td colspan="10" class="alert alert-warning text-center font-weight-bold">Saat ini tidak terdapat ujian untuk kelas ini</td>
        @endforelse
    </tbody>

</table>
</div>
