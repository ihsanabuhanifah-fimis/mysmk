$(document).ready(function(){
    $(".tampilkan-menu-jadwal-ujian").hide();
    $(".tampilkan-menu-pelajaran").hide();
    $(".dashboard").show(); 
});

$(document).ready(function(){
    $(".menu-dashboard").click(function(){
    $(".tampilkan-menu-pelajaran").hide();
    $(".tampilkan-menu-jadwal-ujian").hide();
    $(".dashboard").show();
   
     });
  });

$(document).ready(function(){
 $(".menu-pelajaran").click(function(){
    
     $(".dashboard").hide();

     $(".tampilkan-menu-jadwal-ujian").hide();
     $(".tampilkanpelajaran").load("/siswa/materi");
     $(".tampilkan-menu-pelajaran").show();
     $(".tampilkanpelajaran").show();
});
});


$(document).ready(function(){
    $(".menu-jadwal-ujian").click(function(){
    $(".tampilkan-menu-pelajaran").hide();
    $(".dashboard").hide();
    $(".tampilkan-ujian-praktek").hide();
    $(".tampilkan-ujian-teori").hide();
    $(".tampilkan-menu-jadwal-ujian").show();
 
   
     });
  });
