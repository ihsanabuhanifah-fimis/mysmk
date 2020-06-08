// load index
$(document).ready(function(){
$(".jadwal-ujian-teori").load("/siswa/jadwal-ujian");
$(".materi").load("/siswa/materi");
$('.ujian-teori').click(function(){
    $(".jadwal-ujian-teori").show();
    $(".jadwal-ujian-praktek").hide();
    $(".jadwal-ujian-teori").load("/siswa/jadwal-ujian");
});
$('.ujian-praktek').click(function(){
    $(".jadwal-ujian-praktek").show();
    $(".jadwal-ujian-teori").hide();
    $(".jadwal-ujian-praktek").load("/siswa/jadwal-ujian-praktek");
    // $(".jadwal-ujian-praktek").load("/siswa/jadwal-ujian");
});


    
});

// load index