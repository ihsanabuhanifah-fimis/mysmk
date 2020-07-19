<div class="card p-3 mt-md-5 mt-lg-3 mt-xl-3 mt-sm-1">
        <table class="table table-borderless table-responsive">
                <thead>
                        <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <th>{{$siswa[0]->nama}}</th>
                        </tr>
                        <tr>
                                <th>NISN</th>
                                <th>:</th>
                                <th>{{$siswa[0]->nis}}</th>
                        </tr>
                </thead>

        </table>
        <div class="p-2 border ">
              
                <div>{!!$soal[0]->s!!}</div>
        </div>
        <div class="p-2">
        <h6 class="text-center">JAWABAN</h6>
        <?php $jml = count($jawaban) ?>
        @if($jml == NULL)
       <div class="alerr alert-warning p-4 text-center font-weight-bold">Tidak Ditemukan Jawaban</div>
        @else
        
        {!!$jawaban[0]->jawaban!!}
        @endif
        </div>
        
        
</div>