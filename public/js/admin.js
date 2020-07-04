$(document).ready(function(){

    $("#menu-daftar-user").hide();
    $("#menu-kelas").hide(); 
    
 
    $(".dashboard").show(); 
});

$(document).ready(function(){
    $(".menu-daftar-user").click(function(){
    
        $(".dashboard").hide(); 
        $("#menu-kelas").hide(); 
        $("#menu-daftar-user").show(); 
        $(".tampilkan-daftar-user").load("/admin/user")
       

    });
  });

  $(document).ready(function(){
    $(".menu-daftar-kelas").click(function(){
        $(".dashboard").hide(); 
        $("#menu-daftar-user").hide(); 
        $("#menu-kelas").show(); 
     
        $(".tampilkan-daftar-kelas").load("/admin/kelas");
     
       

    });
  });