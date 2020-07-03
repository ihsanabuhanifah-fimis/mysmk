
   
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
                <?php $jml_penilaian = count($hasils) ; ?>
        
             <!-- PH -->
             <?php $jml_PH=count($PH) ;?>
            <?php $nilai_PH=[] ;?>
            <?php $c=0 ; ;?>    
          
            <?php $x=0; ?>
            @while($x < $jml_penilaian)
              
                @if($jenis[$x]==1)
                <?php $d=0 ;?>
                    @while($d<$jmlsiswa)
                         @if ($hasils[$x][$d]->s== $siswas[$i]->nis)
          
                         <?php $nilai_PH[]=$hasils[$x][$d]->n ;?>
                        @endif
                        <?php $d++;?>
                    @endwhile
                 @endif
            <?php $x++; ?>
            @endwhile
            @if($jml_PH = NULL)
            <?php $nilai_PH[]=0 ;?>
            @endif
           
<!-- PH -->
            <!-- PTS -->
            <?php $jml_PTS=count($PTS) ;?>
            <?php $nilai_PTS=[] ;?>
            <?php $c=0 ; ;?>    
          
            <?php $x=0; ?>
            @while($x < $jml_penilaian)
              
                @if($jenis[$x]==2)
                <?php $d=0 ;?>
                    @while($d<$jmlsiswa)
                         @if ($hasils[$x][$d]->s== $siswas[$i]->nis)
          
                         <?php $nilai_PTS[]=$hasils[$x][$d]->n ;?>
                        @endif
                        <?php $d++;?>
                    @endwhile
                 @endif
            <?php $x++; ?>
            @endwhile
            @if($jml_PTS = NULL)
            <?php $nilai_PTS[]=0 ;?>
            @endif

       
            <!-- PTS -->

            <!-- PAS -->
            
            <?php $jml_PAS=count($PAS) ;?>
            <?php $nilai_PAS=[] ;?>
            <?php $c=0 ; ;?>    
          
            <?php $x=0; ?>
            @while($x < $jml_penilaian)
              
                @if($jenis[$x]==3)
                <?php $d=0 ;?>
                    @while($d<$jmlsiswa)
                         @if ($hasils[$x][$d]->s== $siswas[$i]->nis)
          
                         <?php $nilai_PAS[]=$hasils[$x][$d]->n ;?>
                        @endif
                        <?php $d++;?>
                    @endwhile
                 @endif
            <?php $x++; ?>
            @endwhile
            @if($jml_PAS = NULL)
            <?php $nilai_PAS[]=0 ;?>
            @endif
         
            <!-- PAS -->
            <!-- Kuis -->
            
            <?php $jml_Kuis=count($Kuis) ;?>
            <?php $nilai_Kuis=[] ;?>
            <?php $c=0 ; ;?>    
          
            <?php $x=0; ?>
            @while($x < $jml_penilaian)
              
                @if($jenis[$x]==4)
                <?php $d=0 ;?>
                    @while($d<$jmlsiswa)
                         @if ($hasils[$x][$d]->s== $siswas[$i]->nis)
          
                         <?php $nilai_Kuis[]=$hasils[$x][$d]->n ;?>
                        @endif
                        <?php $d++;?>
                    @endwhile
                 @endif
            <?php $x++; ?>
            @endwhile
            @if($jml_Kuis = NULL)
            <?php $nilai_Kuis[]=0 ;?>
            @endif
         
           
            <!-- Kuis -->
             <!-- Tugas -->
            
             <?php $jml_Tugas=count($Tugas) ;?>
            <?php $nilai_Tugas=[] ;?>
            <?php $c=0 ; ;?>    
          
            <?php $x=0; ?>
            @while($x < $jml_penilaian)
              
                @if($jenis[$x]==5)
                <?php $d=0 ;?>
                    @while($d<$jmlsiswa)
                         @if ($hasils[$x][$d]->s== $siswas[$i]->nis)
          
                         <?php $nilai_Tugas[]=$hasils[$x][$d]->n ;?>
                        @endif
                        <?php $d++;?>
                    @endwhile
                 @endif
            <?php $x++; ?>
            @endwhile
            @if($jml_Tugas = NULL)
            <?php $nilai_Tugas[]=0 ;?>
            @endif
           
           
            <!-- Tugas -->
            <?php
            $persen_PH = $persen->PH ; 
            $persen_PTS = $persen->PTS ; 
            $persen_PAS = $persen->PAS;
            $persen_Kuis = $persen->Kuis ; 
            $persen_Tugas = $persen->Tugas ; 
            $jml_PH=count($PH);
            $jml_PTS=count($PTS);
            $jml_PAS=count($PAS);
            $jml_Kuis=count($Kuis);
            $jml_Tugas=count($Tugas);
            
           
            ?>

            @if($jml_PH == 0)
           
            <?php $jml_nilai_PH = 0 ?>
            @else

            <?php $jml_nilai_PH = ((array_sum($nilai_PH))/$jml_PH) * ($persen_PH/100); ?>
            @endif

            @if($jml_PTS == 0)
           
           <?php $jml_nilai_PTS = 0 ?>
           @else

           <?php $jml_nilai_PTS = ((array_sum($nilai_PTS))/$jml_PTS) * ($persen_PTS/100); ?>
           @endif

           @if($jml_PAS == 0)
           
           <?php $jml_nilai_PAS = 0 ?>
           @else

           <?php $jml_nilai_PAS = ((array_sum($nilai_PAS))/$jml_PAS) * ($persen_PAS/100); ?>
           @endif

           @if($jml_Kuis == 0)
           
           <?php $jml_nilai_Kuis = 0 ?>
           @else

           <?php $jml_nilai_Kuis = ((array_sum($nilai_Kuis))/$jml_Kuis) * ($persen_Kuis/100); ?>
           @endif

           @if($jml_Tugas == 0)
           
           <?php $jml_nilai_Tugas = 0 ?>
           @else

           <?php $jml_nilai_Tugas = ((array_sum($nilai_Tugas))/$jml_Tugas) * ($persen_Tugas/100); ?>
           @endif
          

           <?php $jumlahnilai= $jml_nilai_PH + $jml_nilai_PTS + $jml_nilai_PAS + $jml_nilai_Kuis +$jml_nilai_Tugas ;?>
            <?= number_format(($jumlahnilai),2) ;?>
           


      
            </td>
        </tr>


        <?php $i++ ; ?>
        @endwhile

        




        </tbody>

        
    </table>
    </div>