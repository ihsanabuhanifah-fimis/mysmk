// load index
$(document).ready(function(){

$('.ujian-teori').click(function(){
    $(".jadwal-ujian-teori").show();
    $(".jadwal-ujian-praktek").hide();
  
});
$('.ujian-praktek').click(function(){
    $(".jadwal-ujian-praktek").show();
    $(".jadwal-ujian-teori").hide();
    $(".jadwal-ujian-praktek").load("/siswa/jadwal-ujian-praktek");
    // $(".jadwal-ujian-praktek").load("/siswa/jadwal-ujian");
});
$('.menu-jadwal-ujian-praktek').click(function(){
    $(".tampilkan-ujian-teori").hide();
    $(".tampilkan-ujian-praktek").show();
    $(".tampilkan-ujian-praktek").load("/siswa/jadwal-ujian-praktek");
 
});
$('.menu-jadwal-ujian-teori').click(function(){
    $(".tampilkan-ujian-praktek").hide();
    $(".tampilkan-ujian-teori").show();
    $(".tampilkan-ujian-teori").load("/siswa/jadwal-ujian");
 
});

    
});

// load index