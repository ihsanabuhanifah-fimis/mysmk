
<div class="container">
<div class="row">
<table class="table table-borderless">
    <tr>
        <td>Mata Pelajaran</td>
        <td>:</td>
        <td>{{$ujians[0]->subject_name}}</td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>:</td>
        <td>{{$ujians[0]->nama_rombel}}</td>
    </tr>
    <tr>
        <td>Mata Pelajaran</td>
        <td>:</td>
        <td>{{$ujians[0]->nama_ta}}</td>
    </tr>
   
</table>
</div>
    <table class="table datatable table-bordered">
        <thead class="bg-secondary text-white" >
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            @forelse ($ujians as $ujian)
            <th class="text-center">{{$ujian->nama_ujian}}</>
            @empty
            @endforelse
            <th class="text-center">Nilai Akhir</th>
            
        </thead>
        <tbody>
        <?php $i=0 ; $jmlsiswa=count($siswas) ; $jmlnilai=count($hasils) ; ?>
        @while($i < $jmlsiswa)
        <tr>
            <td>{{$i+1}}</td>
            <td>{{$siswas[$i]->nis}}</td>
            <td>{{$siswas[$i]->nama}}</td>
            <?php $a=0 ; ;?>
            @while($a<$jmlnilai)
            <td class="text-center">
            <?php $b=0 ;?>
            @while($b<$jmlsiswa)
            @if ($hasils[$a][$b]->s== $siswas[$i]->nis)
            {{$hasils[$a][$b]->n}}
            @else
            
            @endif


            <?php $b++;?>
            @endwhile
            </td>
            <?php $a++ ;?>
            @endwhile

            <td class="text-center">
            <?php $nilai=[] ;?>
            <?php $a=0 ; ;?>    
            @while($a<$jmlnilai)
            
            <?php $b=0 ;?>
            @while($b<$jmlsiswa)
            
          
            @if ($hasils[$a][$b]->s== $siswas[$i]->nis)
            <?php $nilai[]=$hasils[$a][$b]->n ;?>
            @else
            
            @endif


            <?php $b++;?>
            @endwhile
            <?php $a++ ;?>
            @endwhile
            <?php $jumlahnilai=(array_sum($nilai)) ;?>
            <?= number_format(($jumlahnilai)/3) ;?>
            </td>
        </tr>


        <?php $i++ ; ?>
        @endwhile

        




        </tbody>

        
    </table>

    </div>