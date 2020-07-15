$(document).ready(function(){

    $("#menu-daftar-user").hide();
    $("#menu-kelas").hide(); 
    $("#menu-jadwal").hide();
 
    $(".dashboard").show(); 
});

$(document).ready(function(){
    $(".menu-daftar-user").click(function(){
    
        $(".dashboard").hide(); 
        $("#menu-kelas").hide(); 
        $("#menu-jadwal").hide();
        $("#menu-daftar-user").show(); 
        $(".tampilkan-daftar-user").load("/admin/user")
       

    });
  });

  $(document).ready(function(){
    $(".menu-daftar-kelas").click(function(){
        $(".dashboard").hide(); 
        $("#menu-daftar-user").hide(); 
        $("#menu-jadwal").hide();
        $("#menu-kelas").show(); 
     
        $(".tampilkan-daftar-kelas").load("/admin/kelas");
     
       

    });
  });

  $(document).ready(function(){
    $(".menu-jadwal").click(function(){
        $(".dashboard").hide(); 
        $("#menu-daftar-user").hide(); 
        $("#menu-kelas").hide(); 
        $("#menu-jadwal").show(); 
     
        $(".tampilkan-jadwal").load("/admin/jadwal");
       
     
       

    });
  });