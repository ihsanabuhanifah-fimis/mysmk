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
                $(".rekapnilaipraktek2").hide();
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
                            $(".bank-soal-saya").load("guru/banksoal"); 
                            
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
                    $("#tombol-jadwal-saya-hari-ini").click(function(){
                        $(this).text("Mencari ...")
                        $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                        });
                        $.ajax({
                            type: 'POST',
                            url: "guru/jadwal-saya  ",
                            data: $('#form-jadwal-hari-ini').serialize(),
                            success: function(data) {
                            $(".tampilkan-jadwal").html(data);
                            $("#tombol-jadwal-saya-hari-ini").text('Submit')
                               
                            },
                            error: function (jqXHR, exception) {
                            
                            }
                        });
                        
                        
                        });

                        $(".edit-absensi").click(function(){
                           $(".tampilkan-menu-jadwal").hide();
                           $(".tampilkan-jadwal").hide();
                           $(".tampilkan-edit-absen").show();
                           $("#form-edit-absen").show();
                        });
                        $(".jadwal").click(function(){
         
                            $(".tampilkan-menu-jadwal").show();
                            $(".tampilkan-jadwal").show();
                            $(".tampilkan-edit-absen").hide();
                            $("#form-edit-absen").hide();
                            $(".tampilkan-rekap-absen").hide();
                        
                         });
                        $(".rekap-absensi").click(function(){
                            $(".tampilkan-menu-jadwal").hide();
                            $(".tampilkan-jadwal").hide();
                            $(".tampilkan-edit-absen").hide();
                            $("#form-edit-absen").hide();
                            $(".tampilkan-rekap-absen").show();
                            $(".tampilkan-rekap-absen").load("/guru/rekap-absen");
                         });

                  

                        $("#tombol-edit-absen").click(function(){
                            $(this).text("mencari ....");
                            $(".keterangan-absensi").removeClass("alert alert-success");
                            $(".keterangan-absensi").removeClass("alert alert-danger");
                            $(".keterangan-absensi").empty();
                            $(".tampilkan-hasil-absen").empty();
                              
                            $.ajaxSetup({
                                headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                      }
                              });
                              $.ajax({
                                  type: 'POST',
                                  url: "guru/edit-absen  ",
                                  data: $('#form-edit-absen').serialize(),
                                  success: function(data) {
                                    $(".keterangan-absensi").addClass("alert alert-success");
                                    $(".keterangan-absensi").text("Alhamdulilah absensi ditemukan");
                                    $("#tombol-edit-absen").text("Cari");
                                    $(".tampilkan-hasil-absen").html(data);
                                    setTimeout(function(){
                                        $(".keterangan-absensi").removeClass("alert alert-success");
                                        $(".keterangan-absensi").removeClass("alert alert-danger");
                                        $(".keterangan-absensi").empty();
                                        },3000);
                                     
                              
                                                 
                                     
                                  },
                                  error: function (jqXHR, exception) {
                                    $(".keterangan-absensi").addClass("alert alert-danger");
                                    $(".keterangan-absensi").text("Mohon maaf absensi tidak ditemukan ditemukan");
                                    $("#tombol-edit-absen").text("Cari");
                                    setTimeout(function(){
                                        $(".keterangan-absensi").removeClass("alert alert-success");
                                        $(".keterangan-absensi").removeClass("alert alert-danger");
                                        $(".keterangan-absensi").empty();
                                        },3000);
                                  }
                              });
                        })
                    });

                    $(document).ready(function(){
                        
    
                            $.ajaxSetup({
                              headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                            });
                            $.ajax({
                                type: 'POST',
                                url: "guru/jadwal-saya  ",
                                data: $('#form-jadwal-hari-ini').serialize(),
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



                                       
	
  