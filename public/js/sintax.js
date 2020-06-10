
          $(document).ready(function(){
            $(".materi-saya").click(function(){
            $(".tampilkanmateri").load("guru/tampilkanmateri"); 
            $(".tampilkanmateri").show(); 
            $(".dashboard").hide();
            $(".tampilkanbab").hide();
               });
          });
          $(document).ready(function(){
            $(".menu-dashboard").click(function(){
            $(".tampilkanmateri").hide(); 
            $(".dashboard").show();
            $(".tampilkanbab").hide();
             });
          });
          $(document).ready(function(){
          $(".bab-saya").click(function(){
            $(".tampilkanbab").load("guru/tampilkanbab"); 
            $(".tampilkanmateri").hide(); 
            $(".tampilkanbab").show(); 
            $(".dashboard").hide();
        });
    });

    $(document).ready(function(){
        $(".jadwal-hari-ini").click(function(){
          $(".tampilkanbab").load("guru/tampilkanbab"); 
          $(".tampilkanmateri").hide(); 
          $(".tampilkanbab").show(); 
          $(".dashboard").hide();
          $(".tampilkan-jadwal-hari-ini").removeClass('')
      });
  });

  $(document).ready(function(){
    $(".rekap-nilai-teori2").click(function(){
        $(".tampilkanujian").hide(); 
        $(".rekapnilaipraktek").hide();
        $(".rekapnilaiteori").show();
        $(".rekapnilaiteori").load("guru/rekapnilai"); 
      
    });

    });

    $(document).ready(function(){
        $(".rekap-nilai-praktek2").click(function(){
            $(".tampilkanujian").hide(); 
            $(".rekapnilaiteori").hide();
            $(".rekapnilaipraktek").show();
            $(".rekapnilaipraktek").load("guru/rekapnilaipraktek"); 
   


        });
  });

  $(document).ready(function(){
    $(".bank-soal-lain2").click(function(){
        $(".bank-soal-saya").hide(); 
      
        $(".bank-soal-lain").show();
        $(".bank-soal-lain").load("guru/banksoallain"); 



    });
});

$(document).ready(function(){
    $(".bank-soal-saya2").click(function(){
        $(".bank-soal-lain").hide(); 
      
        $(".bank-soal-saya").show();
        $(".bank-soal-saya").load("guru/banksoal"); 



    });
});
        