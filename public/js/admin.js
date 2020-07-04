$(document).ready(function(){

    $("#menu-daftar-user").hide();
    
 
    $(".dashboard").show(); 
});

$(document).ready(function(){
    $(".menu-daftar-user").click(function(){
        $(".dashboard").hide(); 
        $("#menu-daftar-user").show(); 
        $(".tampilkan-daftar-user").load("/admin/user")
       

    });
  });