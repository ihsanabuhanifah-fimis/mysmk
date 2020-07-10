<script>
    $(document).ready( function () {
        $('#myHalaqohOnline').DataTable();
    } );
    </script>
<style>
.font{
    font-size:12px;
}
.header{
    line-height: 25px;
   min-height: 25px;
   height: 25px;
}
</style>



<div class="p-md-4 m-sm-0 border">
<table id="myHalaqohOnline" class="table table-responsive-sm table-bordered">
    <thead class="text-center bg-success header">
        <tr class="header">
            <th>No</th>
            <th>Tanggal</th>
            <th>Ustadz <br> Pembimbing</th>
            <th>Setoran <br> Hafalan</th>
            <th>Audio <br> Setoran</th>
            <th>Koreksi <br> Ustadz</th>
          
        </tr>
    </thead>
    <tbody class="text-center">
        @forelse($rekamans as $rekaman)
        <tr>
            <td class="font">{{$loop->iteration}}</td>
            <td class="font">{{$rekaman->tanggal}}</td>
            <td class="font">{{$rekaman->id_pembimbing}}</td>
            <td class="font">
            <?php $i=0; ?>
            <?php $jml_surat = count($surat) ; ?>
            @if($rekaman->surat_mulai == 0)
            <p>Santri Belum Setoran</p>
            @else
            @while($i < $jml_surat)
            @if($rekaman->surat_mulai == $surat[$i]->id_surat)
            <p>Surat <b>{{$surat[$i]->nama_surat}}</b> ayat <b>{{$rekaman->ayat_mulai}}</b></p>
            <p>Sampai</p>
            @endif
            <?php $i++; ?>
            @endwhile
            @endif
           
            <?php $j=0; ?>
            <?php $jml_surat = count($surat) ; ?>
            @if($rekaman->surat_akhir == 0)
         
            @else
            @while($j < $jml_surat)
            @if($rekaman->surat_akhir == $surat[$j]->id_surat)
            <p>Surat <b>{{$surat[$j]->nama_surat}}</b> ayat <b>{{$rekaman->ayat_akhir}}</b></p>
            @endif
            <?php $j++; ?>
            @endwhile
            @endif
            </td>
            <td class="font">
            @if($rekaman->rekaman == NULL)
            <p>Santri Belum Setoran</p>
            @else

            <iframe class="embed-responsive-item"
            background-color="white"
            frameborder="0"
            width="400"
            height="60"
            
            src="{{$rekaman->rekaman}}">
            </iframe>
             
           @endif
            </td>
            <td class="font">
            @if($rekaman->check == 0)

            <button class="btn btn-danger font">Santri Belum Upload</button>

            @elseif($rekaman->check == 1)
            <button class="btn btn-primary font">Rekaman belum di koreksi</button>

            @elseif($rekaman->check == 2)
            <button class="btn btn-success font">Lihat Komentar</button>

            @endif
            
            </td>
        </tr>


        @empty
        <tr>
            <td colspan="10" class="alert alert-warning font-weight-bold text-center">Saat ini belum ada jadwal setoran halaqoh online</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>