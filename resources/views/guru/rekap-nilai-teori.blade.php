
   
<script>
    $(document).ready( function () {
        $('#myRekapNilaiTeori').DataTable();
    } );
    </script>
</div>
<div class="border p-md-4">
    <table id="myRekapNilaiTeori" class="table datatable table-responsive-sm table-bordered">
        <thead class="bg-success"" >
            <th class="text-center">No</th>
            <th class="text-center">NIS</th>
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
            <td class="text-center">{{$i+1}}</td>
            <td class="text-center">{{$siswas[$i]->nis}}</td>
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
            
            <?php $jml_PH=count($PH) ;?>
            <?php $nilai=[] ;?>
            <?php $a=0 ; ;?>    
            @while($a<$jml_PH)
            
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

            <!-- PTS -->
            <?php $jml_PTS=count($PTS) ;?>
            <?php $nilai_PTS=[] ;?>
            <?php $c=0 ; ;?>    
            @while($c<$jml_PTS)
            
            <?php $d=0 ;?>
            @while($d<$jmlsiswa)
            
          
            @if ($hasils[$c][$d]->s== $siswas[$i]->nis)
            <?php $nilai_PTS[]=$hasils[$c][$d]->n ;?>
            @else
            
            @endif


            <?php $d++;?>
            @endwhile
            <?php $c++ ;?>
            @endwhile
            
            <!-- PTS -->

            <!-- PAS -->
            <?php $jml_PAS=count($PAS) ;?>
            <?php $nilai_PAS=[] ;?>
            <?php $e=0 ; ;?>    
            @while($e<$jml_PAS)
            
            <?php $f=0 ;?>
            @while($f<$jmlsiswa)
            
          
            @if ($hasils[$e][$f]->s== $siswas[$i]->nis)
            <?php $nilai_PAS[]=$hasils[$e][$f]->n ;?>
            @else
            
            @endif


            <?php $f++;?>
            @endwhile
            <?php $e++ ;?>
            @endwhile
            
           
            <!-- PAS -->
            <!-- Kuis -->
            <?php $jml_Kuis=count($Kuis) ;?>
            <?php $nilai_Kuis=[] ;?>
            <?php $e=0 ; ;?>    
            @while($e<$jml_Kuis)
            
            <?php $f=0 ;?>
            @while($f<$jmlsiswa)
            
          
            @if ($hasils[$e][$f]->s== $siswas[$i]->nis)
            <?php $nilai_Kuis[]=$hasils[$e][$f]->n ;?>
            @else
            
            @endif


            <?php $f++;?>
            @endwhile
            <?php $e++ ;?>
            @endwhile
            
           
            <!-- Kuis -->
             <!-- Tugas -->
             <?php $jml_Tugas=count($Kuis) ;?>
            <?php $nilai_Tugas=[] ;?>
            <?php $e=0 ; ;?>    
            @while($e<$jml_Tugas)
            
            <?php $f=0 ;?>
            @while($f<$jmlsiswa)
            
          
            @if ($hasils[$e][$f]->s== $siswas[$i]->nis)
            <?php $nilai_Tugas[]=$hasils[$e][$f]->n ;?>
            @else
            
            @endif


            <?php $f++;?>
            @endwhile
            <?php $e++ ;?>
            @endwhile
            
           
            <!-- Tugas -->
            <?php
            $persen_PH = $persen[$i]->PH ; 
            $persen_PTS = $persen[$i]->PTS ; 
            $persen_PAS = $persen[$i]->PAS;
            $persen_Kuis = $persen[$i]->Kuis ; 
            $persen_Tugas = $persen[$i]->Tugas ; 
           
            ?>

            <?php
                $nilai_Tugas = (((array_sum($nilai))*$persen_Tugas)/100)/$jml_Tugas;
                $nilai_Kuis = (((array_sum($nilai))*$persen_Kuis)/100)/$jml_Kuis;
              $nilai_PAS = (((array_sum($nilai_PAS))*$persen_PAS)/100)/$jml_PAS;
              $nilai_PTS = (((array_sum($nilai_PTS))*$persen_PTS)/100)/$jml_PTS;
              $nilai_PH = (((array_sum($nilai))*$persen_PH)/100)/$jml_PH;
           
           
            ;?>

            <?php $jumlahnilai= $nilai_PH + $nilai_PTS + $nilai_PAS + $nilai_Kuis +$nilai_Tugas ;?>
            <?= number_format(($jumlahnilai)) ;?>
            </td>
        </tr>


        <?php $i++ ; ?>
        @endwhile

        




        </tbody>

        
    </table>
    </div>