$(document).ready(function(){
       $(".tampilkan-menu-materi").hide();
       $(".tampilkan-menu-penilaian").hide(); 
       $(".tampilkan-menu-jadwal").hide();
       $(".tampilkan-menu-bank-soal").hide();
       $(".dashboard").show(); 
});

$(document).ready(function(){
    $(".menu-materi").click(function(){
        $(".tampilkanbab").hide(); 
        $(".tampilkan-menu-bank-soal").hide();
        $(".tampilkan-menu-jadwal").hide();
        $(".dashboard").hide();
    $(".tampilkanmateri").load("guru/tampilkanmateri"); 
    $(".tampilkanmateri").show();

   
    $(".tampilkan-menu-materi").show(); 

       });
  });

  $(document).ready(function(){
    $(".menu-dashboard").click(function(){
    $(".tampilkan-menu-materi").hide(); 
    $(".tampilkan-menu-bank-soal").hide();
    $(".tampilkan-menu-penilaian").hide(); 
    $(".tampilkan-menu-jadwal").hide();
    $(".dashboard").show();
   
     });
  });

  $(document).ready(function(){
    $(".menu-jadwal").click(function(){
        $(".tampilkan-menu-penilaian").hide(); 
        $(".tampilkan-menu-bank-soal").hide();
    $(".tampilkan-menu-materi").hide(); 
    $(".dashboard").hide();
    $(".tampilkan-menu-jadwal").show(); 
   
     });
  });
  $(document).ready(function(){
    $(".menu-penilaian").click(function(){
    $(".tampilkan-menu-materi").hide(); 
    $(".tampilkan-menu-bank-soal").hide();
    $(".rekapnilaipraktek").hide();
    $(".rekapnilaiteori").hide();
    $(".dashboard").hide();
    $(".tampilkan-menu-jadwal").hide(); 
    $(".tampilkan-menu-penilaian").show(); 
    $(".tampilkanujian").load("guru/tampilkanujian");
    $(".tampilkanujian").show();
   
   
     });
  });

  $(document).ready(function(){
    $(".menu-bank-soal").click(function(){
        $(".tampilkan-menu-materi").hide(); 
        $(".tampilkan-menu-jadwal").hide(); 
         $(".tampilkan-menu-penilaian").hide(); 
        $(".dashboard").hide();
        $(".banksoallain").hide();   
        $(".bank-soal-saya").load("guru/banksoal");
        $(".tampilkan-menu-bank-soal").show();
       
        

    });
  });