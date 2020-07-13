$(document).ready(function(){
    $(".tampilkan-menu-jadwal-ujian").hide();
    $(".tampilkan-menu-pelajaran").hide();
    $("#menu-jadwal").hide();
    $('#menu-mapel').hide();
    $(".tampilkan-halaqoh-online").hide();
    $(".tampilkan-menu-jadwal-ujian-teori").hide();
    $(".tampilkan-menu-jadwal-ujian-praktek").hide();
    $(".dashboard").show(); 
});

$(document).ready(function(){
    $(".menu-dashboard").click(function(){
    $(".tampilkan-menu-pelajaran").hide();
    $(".tampilkan-menu-jadwal-ujian").hide();
    $("#menu-jadwal").hide();
    $('#menu-mapel').hide();
    $(".tampilkan-halaqoh-online").hide();
    $(".tampilkan-menu-jadwal-ujian-teori").hide();
    $(".tampilkan-menu-jadwal-ujian-praktek").hide();
    $(".dashboard").show();
   
     });
  });

$(document).ready(function(){
 $(".menu-pelajaran").click(function(){
    
     $(".dashboard").hide();
     $(".tampilkan-halaqoh-online").hide();
     $(".tampilkan-menu-jadwal-ujian").hide();
     $("#menu-jadwal").hide();
     $('#menu-mapel').hide();
     $(".tampilkan-menu-jadwal-ujian-teori").hide();
     $(".tampilkan-menu-jadwal-ujian-praktek").hide();
     $(".tampilkanpelajaran").load("/siswa/materi");
     $(".tampilkan-menu-pelajaran").show();
     $(".tampilkanpelajaran").show();
});
});


$(document).ready(function(){
    $(".menu-jadwal-ujian-teori").click(function(){
    $(".tampilkan-menu-pelajaran").hide();
    $(".dashboard").hide();
    $(".tampilkan-halaqoh-online").hide();
    $(".tampilkan-ujian-praktek").hide();
    $(".tampilkan-ujian-teori").hide();
    $("#menu-jadwal").hide();
    $('#menu-mapel').hide();
    $(".tampilkan-menu-jadwal-ujian-teori").show();
    $(".tampilkan-menu-jadwal-ujian-praktek").hide();
    $(".tampilkan-ujian-teori").show();
    $(".tampilkan-ujian-teori").load("/siswa/jadwal-ujian");
 
   
     });
  });

  $(document).ready(function(){
    $(".menu-jadwal-ujian-praktek").click(function(){
    $(".tampilkan-menu-pelajaran").hide();
    $(".dashboard").hide();
    $(".tampilkan-halaqoh-online").hide();
    $(".tampilkan-ujian-praktek").hide();
    $("#menu-jadwal").hide();
    $('#menu-mapel').hide();
    $(".tampilkan-ujian-teori").hide();
    $(".tampilkan-menu-jadwal-ujian-praktek").show();
    $(".tampilkan-menu-jadwal-ujian-teori").hide();
    $(".tampilkan-ujian-praktek").show();
    $(".tampilkan-ujian-praktek").load("/siswa/jadwal-ujian-praktek");
 
   
     });
  });


  $(document).ready(function(){
    $(".menu-halaqoh-online").click(function(){
    $(".tampilkan-menu-pelajaran").hide();
    $(".dashboard").hide();
    $('#menu-mapel').hide();
    $(".tampilkan-ujian-praktek").hide();
    $(".tampilkan-ujian-teori").hide();
    $("#menu-jadwal").hide();
    $(".tampilkan-menu-jadwal-ujian").hide();
    $(".tampilkan-halaqoh-online").show();
    $(".tampilkan-halaqoh-online").load("/siswa/halaqoh");
 
   
     });
     $('.menu-jadwal').click(function(){
      
      $(".tampilkan-menu-pelajaran").hide();
      $(".dashboard").hide();
      $('#menu-mapel').hide();
      $(".tampilkan-ujian-praktek").hide();
      $(".tampilkan-ujian-teori").hide();
      $(".tampilkan-menu-jadwal-ujian").hide();
      $(".tampilkan-halaqoh-online").hide();
      $("#menu-jadwal").show();
      $("#menu-jadwal").load('/wali/jadwal');
     
     
   
  });
  $('.menu-mapel').click(function(){
       
    $(".tampilkan-menu-pelajaran").hide();
      $(".dashboard").hide();
      $(".tampilkan-ujian-praktek").hide();
      $(".tampilkan-ujian-teori").hide();
      $(".tampilkan-menu-jadwal-ujian").hide();
      $(".tampilkan-halaqoh-online").hide();
      $("#menu-jadwal").hide();
    $('#menu-mapel').show();
    $("#menu-mapel").load('/wali/mapel-aktif');
   
   
 
});
  });
