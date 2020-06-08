$(document).ready(function(){
    $(".tampilkanmateri").load("guru/tampilkanmateri");  
    $(".tampilkanujian").load("guru/tampilkanujian");  
    $(".banksoal").load("guru/banksoal");

    
});


$(document).ready(function(){
    $(".bank-soal-lain").click(function(){
        $(".banksoallain").load("guru/banksoallain");
        $(".banksoal").hide(); 
        $(".banksoallain").show();   
    });
    $(".materi-saya").click(function(){
        $(".tampilkanmateri").load("guru/tampilkanmateri"); 
        $(".tampilkanmateri").show(); 
        $(".tampilkanbab").hide();
    });
    $(".bab-saya").click(function(){
        $(".tampilkanbab").load("guru/tampilkanbab"); 
        $(".tampilkanmateri").hide(); 
        $(".tampilkanbab").show(); 
    });
  });

  
$(document).ready(function(){
    $(".bank-soal-saya").click(function(){
        $(".banksoal").load("guru/banksoal");
        $(".banksoal").show();
        $(".banksoallain").hide();   
        

    });
  });


	$(document).ready(function(){
		$("#tambah-ujian").click(function(){
            $(".noticeujian").removeClass("alert alert-success");
            $(".noticeujian").removeClass("alert alert-danger");
            $(".noticeujian").empty("");
            $(this).text("Sedang menyimpan ...")
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "/guru/tambahujian",
				data: $('#form-ujian').serialize(),
				success: function(data) {
                    $(".noticeujian").addClass("alert alert-success");
                    $(".noticeujian").text(data);
                    $("#tambah-ujian").text("Save");
                    $(".tampilkanujian").load("guru/tampilkanujian");   
                    setTimeout(function(){
                        $(".noticeujian").removeClass("alert alert-success");
                        $(".noticeujian").empty();
                        },5000);
                        document.getElementById("form-ujian").reset();               
                   
                },
                error: function (jqXHR, exception) {
                $(".noticeujian").text("Penilaian tidak berhasil ditambahkan");
                $(".noticeujian").addClass("alert alert-danger");
                $("#tambah-ujian").text("Simpan");
                setTimeout(function(){
                    $(".noticeujian").removeClass("alert alert-danger");
                    $(".noticeujian").empty();
                    },3000);
                }
			});
			
			
			});
        });
        
        $(document).ready(function(){
            $("#penilaian").click(function(){
                $(".rekapnilaiteori").hide();
                $(".rekapnilaipraktek").hide();
                $(".tampilkanujian").load("guru/tampilkanujian");
                $(".tampilkanujian").show(); 

                

            });
          });
        $(document).ready(function(){
            $("#rekapnilai").click(function(){
                $(".tampilkanujian").hide(); 
                $(".rekapnilaipraktek").hide();
                $(".rekapnilaiteori").show();
                $(".rekapnilaiteori").load("guru/rekapnilai"); 
              
            });

            });
            $(document).ready(function(){
                $("#rekapnilaipraktek").click(function(){
                    $(".tampilkanujian").hide(); 
                    $(".rekapnilaiteori").hide();
                    $(".rekapnilaipraktek").show();
                    $(".rekapnilaipraktek").load("guru/rekapnilaipraktek"); 
           
    
    
                });
          });


          $(document).ready(function(){
            $("#tambah-bank-soal").click(function(){
                $(this).text("Sedang Menyimpan");
                $(".notice-bank").removeClass("alert alert-success");
                $(".notice-bank").removeClass("alert alert-danger");
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                $.ajax({
                    type: 'POST',
                    url: "guru/banksoal",
                    data: $('#form-soal').serialize(),
                    success: function(data) {
                        $(".notice-bank").addClass("alert alert-success");
                            $(".notice-bank").text("Alhamdulilah bank soal berhasil ditambahkan");
                            $("#tambah-bank-soal").text("Simpan");
                            $(".banksoal").load("guru/banksoal"); 
                            
                        setTimeout(function(){
                            $(".notice-bank").removeClass("alert alert-success");
                            $(".notice-bank").empty();
                            },2000);
                            document.getElementById("form-soal").reset(); 
                        
                    },
                    error: function (jqXHR, exception) {
                        $(".notice-bank").text("Bank soal tidak berhasil ditambahkan");
                        $(".notice-bank").addClass("alert alert-danger");
                        $("#tambah-bank-soal").text("Simpan");
                        setTimeout(function(){
                            $(".notice-bank").empty();
                            $(".notice-bank").removeClass("alert alert-danger");
                            },1000);
                            document.getElementById("form-soal").reset();
                       
                        }
                });
                
                
                });
            });

//Edit Bank Soal
            $(document).ready(function(){
                $("#simpan-soal").click(function(){
                    $(".succest").empty()
                    $(".succest").removeClass("alert alert-success text-center")
                    $("#simpan-soal").html("Update Database Soal..." )
                    $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });
                    $.ajax({
                        type: 'PUT',
                        url: "/editsoal",
                        data: $('#form-soal').serialize(),
                        success: function(data) {
                            $(".succest").append(data);  
                            $(".succest").addClass("alert alert-success text-center")
                            $("#simpan-soal").html("Submit" )
                        }
                    });
                    
                    
                    });
                });



                $(document).ready(function(){
                    $(".cari-jadwal").click(function(){

                        $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                        });
                        $.ajax({
                            type: 'POST',
                            url: "guru/jadwal/  ",
                            data: $('#form-jadwal').serialize(),
                            success: function(data) {
                            $(".tampilkan-jadwal").html(data);
                            
                               
                            },
                            error: function (jqXHR, exception) {
                            
                            }
                        });
                        
                        
                        });
                    });

                    $(document).ready(function(){
                        
    
                            $.ajaxSetup({
                              headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                            });
                            $.ajax({
                                type: 'POST',
                                url: "guru/jadwal/  ",
                                data: $('#form-jadwal').serialize(),
                                success: function(data) {
                                $(".tampilkan-jadwal").html(data);
                                               
                                   
                                },
                                error: function (jqXHR, exception) {
                                
                                }
                            });
                            
                            
                            });
                        

                            $(document).ready(function(){
                                var id
                              $(".preview").on('click',function(){
                                id = $(this).attr('id');
                                $.ajax({
                                      url:"/guru/preview/"+id,
                                        success:function(data){
                                       $(".navpdf").show();
                                       $(".create-soal").hide(); 
                                       $(".previews").show() ;   
                                       $(".previews").html(data) ; 
                                     
                                        }
                                              
                                     });
                                
                              });
                            });



                                       
	$(document).ready(function(){
        var a;
		$("#materi1").click(function(){
            a = $(".materiw").val();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('savejurnal')}}",
				data: {materi:"kkkk"},
				success: function(data) {
                    // $('.notif-absen').addClass('alert alert-success');
                    // $('.notif-absen').text(data);
                    // $('#send_form').html('Simpan');
                   alert(data);
                   
                },
                error: function (jqXHR, exception) {
                    // $('.notif-absen').addClass('alert alert-danger');
                    // $('.notif-absen').text("Absensi tidak berhasil tersimpan, Mohon untuk mengecek tanggal");
                    // $('#send_form').html('Simpan');       
                }
			});
			
			
			});
		});
	
  