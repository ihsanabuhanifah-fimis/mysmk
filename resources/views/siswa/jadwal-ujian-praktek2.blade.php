
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
<div class="container mt-3 p-4 border">
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
            <th>Action</th>
            <th>Nilai Akhir</th>
            <th>Status</th>
            <th class="text-center">Riwayat Ujian</th>
            
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
            <td>{{$ujian->tanggal_mulai}} <br> {{$ujian->waktu_mulai}}</td>
            <td>{{$ujian->tanggal_selesai}} <br> {{$ujian->waktu_selesai}}</td>
            <td><a href="{{route('masuk_ujian',['id'=>$ujian->id])}}" class="btn btn-primary kerjakan-soal">Masuk</a></td>
           
            <td>{{$nilai_akhir[$k]}}</td>

            @if($nilai_akhir[$k] >= $ujian->kkm)
            <td>Lulus</td>
            @elseif($nilai_akhir[$k] == NULL)
            <td>Nilai Belum Masuk</td>
            @else
            <td>Tidak Lulus</td>
            @endif
            @forelse ($nilais as $nilai)
            @if($nilai->id_penilaian == $ujian->id)
            <td> Hasil Ujian ke-{{$loop->iteration}} : {{$nilai->nilai}}</td>
            @endif
           
            @empty
            @endforelse
            <td><button class="btn btn-success">Lihat</button></td>
        </tr>

        <?php $k++ ; ?>
        @empty
        @endforelse
    </tbody>

</table>
</div>
