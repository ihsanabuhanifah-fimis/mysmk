// load index
$(document).ready(function(){
    $(".kehadiran").hide();
    $(".jadwal-ujian").hide();
    $(".halaqoh-online").hide();
    $(".dashboard").show();
    $(".tampilkan-kehadiran").load('/wali/kehadiran');
   
    $('.menu-kehadiran').click(function(){
        $(".dashboard").hide();
        $(".jadwal-ujian").hide();
        $(".halaqoh-online").hide();
        $(".kehadiran").show();
        $(".tampilkan-kehadiran").load('/wali/kehadiran');
        
     
    });
    $('.menu-jadwal-ujian').click(function(){
        $(".dashboard").hide();
        $(".kehadiran").hide();
        $(".halaqoh-online").hide();
        $(".jadwal-ujian").show();
        $(".tampilkan-jadwal-ujian").load('/wali/jadwal-ujian');
       
        
     
    });

    $('.menu-halaqoh-online').click(function(){
       
        $(".dashboard").hide();
        $(".kehadiran").hide();
        $(".jadwal-ujian").hide();
        $(".halaqoh-online").show();
        $(".catatan-halaqoh-online").load('/wali/catatan-halaqoh-online');
       
        
     
    });
        
    });
    
    // load index



    //proses

    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
          });
          $.ajax({
              type: 'POST',
              url: "/wali/kehadiran",
              data: $('.form-kehadiran').serialize(),
              success: function(data) {
                  $(".cari-kehadiran").text("Cari");
                   $(".tampilkan-kehadiran").html(data);
                   $(".ket-absen").addClass("alert alert-success")
                   $(".ket-absen").text("Alhamdulilah Rekap Absen ditemukan")
                  
                  setTimeout(function(){
                      $(".ket-absen").removeClass("alert alert-success")
                  $(".ket-absen").empty();
                      },2000);
                                    
                 
              },
              error: function (jqXHR, exception) {
                  $(".cari-kehadiran").text("Cari");
                  $(".ket-absen").addClass("alert alert-danger")
                  $(".ket-absen").text("Mohon Maaf Rekap Absensi Tidak Ditemukan")
              setTimeout(function(){
                 
                  $(".ket-absen").removeClass("alert alert-danger")
                  $(".ket-absen").empty();
                 
                  },5000);
              }
          });
          
		$(".cari-kehadiran").click(function(){
           
            $(this).text("Mencari ...");
             
            $(".ket-absen").removeClass("alert alert-danger")
            $(".ket-absen").empty();
            $(".tampilkan-kehadiran").empty();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "/wali/kehadiran",
				data: $('.form-kehadiran').serialize(),
				success: function(data) {
                    $(".cari-kehadiran").text("Cari");
                     $(".tampilkan-kehadiran").html(data);
                     $(".ket-absen").addClass("alert alert-success")
                     $(".ket-absen").text("Alhamdulilah Rekap Absen ditemukan")
                    
                    setTimeout(function(){
                        $(".ket-absen").removeClass("alert alert-success")
                    $(".ket-absen").empty();
                        },2000);
                                      
                   
                },
                error: function (jqXHR, exception) {
                    $(".cari-kehadiran").text("Cari");
                    $(".ket-absen").addClass("alert alert-danger")
                    $(".ket-absen").text("Mohon Maaf Rekap Absensi Tidak Ditemukan")
                setTimeout(function(){
                   
                    $(".ket-absen").removeClass("alert alert-danger")
                    $(".ket-absen").empty();
                   
                    },5000);
                }
			});
			
			
			});
        });