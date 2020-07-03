$(document).ready(function(){
       $(".tampilkan-menu-materi").hide();
       $(".tampilkan-menu-penilaian").hide(); 
       $(".tampilkan-menu-jadwal").hide();
       $(".tampilkan-menu-mapel").hide();
       $(".tampilkan-menu-jurnal-guru").hide();
       $(".tampilkan-menu-halaqoh").hide(); 
       $(".tampilkan-menu-bank-soal").hide();
       $(".tampilkan-edit-absen").hide();
       
    
       $(".dashboard").show(); 
});

$(document).ready(function(){
    $(".menu-materi").click(function(){
        $(".tampilkanbab").hide(); 
        $(".tampilkan-menu-bank-soal").hide();
        $(".tampilkan-edit-absen").hide();
        $(".tampilkan-menu-jadwal").hide();
        $(".tampilkan-menu-jurnal-guru").hide();
        $(".tampilkan-menu-bank-soal").hide();
        $(".tampilkan-menu-penilaian").hide();
        $(".tampilkan-menu-mapel").hide();
        $(".tampilkan-menu-halaqoh").hide(); 
        $(".dashboard").hide();
        $(".tampilkanmateri").load("guru/tampilkanmateri"); 
        $(".tampilkanmateri").show();
        $(".tampilkan-menu-materi").show(); 

       });
  });

  $(document).ready(function(){
    $(".menu-dashboard").click(function(){
    $(".tampilkan-menu-materi").hide(); 
    $(".tampilkan-menu-halaqoh").hide(); 
    $(".tampilkan-menu-jurnal-guru").hide();
    $(".tampilkan-menu-mapel").hide();
    $(".tampilkan-edit-absen").hide();
    $(".tampilkan-menu-bank-soal").hide();
    $(".tampilkan-menu-penilaian").hide(); 
    $(".tampilkan-menu-jadwal").hide();
    $(".dashboard").show();
   
     });
  });

  $(document).ready(function(){
    $(".menu-jadwal").click(function(){
      $(".tampilkan-menu-halaqoh").hide(); 
      $(".tampilkan-menu-jurnal-guru").hide();
        $(".tampilkan-menu-penilaian").hide(); 
        $(".tampilkan-menu-mapel").hide();
        $(".tampilkan-edit-absen").hide();
        $(".tampilkan-menu-penilaian").hide();
    $(".tampilkan-menu-materi").hide(); 
    $(".dashboard").hide();
    $(".tampilkan-menu-jadwal").show(); 
    $(".tampilkan-jadwal").show();
   
     });
  });
  $(document).ready(function(){
    $(".menu-penilaian").click(function(){
    $(".tampilkan-menu-materi").hide(); 
    $(".tampilkan-menu-jurnal-guru").hide();
    $(".tampilkan-menu-mapel").hide();
    $(".tampilkan-edit-absen").hide();
    $(".tampilkan-menu-bank-soal").hide();
    $(".rekapnilaipraktek").hide();
    $(".rekapnilaiteori").hide();
    $(".dashboard").hide();
    $(".tampilkan-menu-jadwal").hide(); 
    $(".tampilkan-menu-halaqoh").hide(); 
    $(".tampilkan-menu-penilaian").show(); 
    $(".tampilkanujian").load("guru/tampilkanujian");
    $(".tampilkanujian").show();
   
   
     });
  });

  $(document).ready(function(){
    $(".menu-bank-soal").click(function(){
        $(".tampilkan-menu-materi").hide(); 
        $(".tampilkan-menu-jurnal-guru").hide();
        $(".tampilkan-edit-absen").hide();
        $(".tampilkan-menu-mapel").hide();
        $(".tampilkan-menu-jadwal").hide(); 
         $(".tampilkan-menu-penilaian").hide(); 
        $(".dashboard").hide();
        $(".banksoallain").hide();  
        $(".tampilkan-menu-halaqoh").hide(); 
        $(".bank-soal-saya").load("guru/banksoal");
        $(".tampilkan-menu-bank-soal").show();
       
        

    });
  });


  $(document).ready(function(){
    $(".menu-halaqoh").click(function(){
        $(".tampilkan-menu-materi").hide(); 
        $(".tampilkan-menu-jurnal-guru").hide();
        $(".tampilkan-menu-mapel").hide();
        $(".tampilkan-edit-absen").hide();
        $(".tampilkan-menu-jadwal").hide(); 
         $(".tampilkan-menu-penilaian").hide(); 
        $(".dashboard").hide();
        $(".tampilkan-menu-bank-soal").hide();
        $(".tampilkan-menu-halaqoh").show();
        $(".tampilkan-menu-halaqoh").load("/guru/halaqoh");

       
        

    });
  });

  $(document).ready(function(){
    $(".menu-mapel").click(function(){
        $(".tampilkan-menu-materi").hide(); 
        $(".tampilkan-menu-jurnal-guru").hide();
        $(".tampilkan-edit-absen").hide();
        $(".tampilkan-menu-jadwal").hide(); 
         $(".tampilkan-menu-penilaian").hide(); 
        $(".dashboard").hide();
        $(".tampilkan-menu-bank-soal").hide();
        $(".tampilkan-menu-halaqoh").hide();
        $(".tampilkan-menu-mapel").show();
        $(".mapel-saya").show();  
        $(".mapel-saya").load("/guru/mapel");  

    });
  });

  $(document).ready(function(){
    $(".menu-jurnal-guru").click(function(){
        $(".tampilkan-menu-materi").hide(); 
        $(".tampilkan-edit-absen").hide();
        $(".tampilkan-menu-jadwal").hide(); 
         $(".tampilkan-menu-penilaian").hide(); 
        $(".dashboard").hide();
        $(".tampilkan-menu-bank-soal").hide();
        $(".tampilkan-menu-halaqoh").hide();
        $(".tampilkan-menu-mapel").hide();
        $(".tampilkan-menu-jurnal-guru").show();
        $(".tampilkan-menu-jurnal-guru").load("/guru/jurnal-guru");
        
     

    });
  });
 
    $(document).ready(function(){
        $(".rekapnilaipraktek").click(function(){
            $(".mapel-saya").hide(); 
            $(".rekapnilaiteori").hide();
            $(".rekapnilaipraktek").show();
            $(".rekapnilaipraktek").load("guru/rekapnilaipraktek"); 
   


        });
  });
  