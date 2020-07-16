// load index
$(document).ready(function(){
    $(".kehadiran").hide();
    $(".jadwal-ujian").hide();
    $("#menu-jadwal").hide();
    $(".halaqoh-online").hide();
    $("#menu-pengumuman").hide();
    $('#menu-mapel').hide();
    $(".dashboard").show();
    $(".tampilkan-kehadiran").load('/wali/kehadiran');
    $(".dashboard-show").load('/wali/identitas');
       
   
    $('.menu-kehadiran').click(function(){
        $(".dashboard").hide();
        $(".jadwal-ujian").hide();
        $("#menu-pengumuman").hide();
        $(".halaqoh-online").hide();
        $("#menu-jadwal").hide();
        $('#menu-mapel').hide();
        $(".kehadiran").show();
        $(".tampilkan-kehadiran").load('/wali/kehadiran');
        
     
    });
    $('.menu-jadwal-ujian').click(function(){
        $(".dashboard").hide();
        $(".kehadiran").hide();
        $("#menu-pengumuman").hide();
        $("#menu-jadwal").hide();
        $(".halaqoh-online").hide();
        $('#menu-mapel').hide();
        $(".jadwal-ujian").show();
        $(".tampilkan-jadwal-ujian").load('/wali/jadwal-ujian');
       
        
     
    });

    $('.menu-halaqoh-online').click(function(){
       
        $(".dashboard").hide();
        $("#menu-jadwal").hide();
        $(".kehadiran").hide();
        $("#menu-pengumuman").hide();
        $(".jadwal-ujian").hide();
        $('#menu-mapel').hide();
        $(".halaqoh-online").show();
        $(".catatan-halaqoh-online").load('/wali/catatan-halaqoh-online');
       
        
     
    });

    $('.menu-mapel').click(function(){
       
        $(".dashboard").hide();
        $("#menu-jadwal").hide();
        $("#menu-pengumuman").hide();
        $(".kehadiran").hide();
        $(".jadwal-ujian").hide();
        $(".halaqoh-online").hide();
        $('#menu-mapel').show();
        $("#menu-mapel").load('/wali/mapel-aktif');
       
       
     
    });
    $('.menu-dashboard').click(function(){
       
        $("#menu-jadwal").hide();
        $(".kehadiran").hide();
        $(".jadwal-ujian").hide();
        $(".halaqoh-online").hide();
        $("#menu-pengumuman").hide();
        $('#menu-mapel').hide();
        $(".dashboard").show();
        $(".dashboard-show").load('/wali/identitas');
       
       
     
    });
    $('.menu-jadwal').click(function(){
      
        $(".kehadiran").hide();
        $(".jadwal-ujian").hide();
        $(".halaqoh-online").hide();
        $('#menu-mapel').hide();
        $(".dashboard").hide();
        $("#menu-pengumuman").hide();
        $("#menu-jadwal").show();
        $("#menu-jadwal").load('/wali/jadwal');
       
       
     
    });
    $('.menu-pengumuman').click(function(){
      
      
        $(".kehadiran").hide();
        $(".jadwal-ujian").hide();
        $(".halaqoh-online").hide();
        $('#menu-mapel').hide();
        $(".dashboard").hide();
        $("#menu-jadwal").hide();
        $("#menu-pengumuman").show();
       
       
     
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
                  
               
                  
                  setTimeout(function(){
                  
               
                      },2000);
                                    
                 
              },
              error: function (jqXHR, exception) {
                  $(".cari-kehadiran").text("Bismillah");
                  
              setTimeout(function(){
                 
                  
                 
                  },5000);
              }
          });
          
		$(".cari-kehadiran").click(function(){
           
            $(this).text("Mencari ...");
             
            
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
                    $(".cari-kehadiran").text("Bismillah");
                     $(".tampilkan-kehadiran").html(data);
                    
                    
                    setTimeout(function(){
                       
                    $(".ket-absen").empty();
                        },2000);
                                      
                   
                },
                error: function (jqXHR, exception) {
                    $(".cari-kehadiran").text("Bismillah");
                  
                setTimeout(function(){
                   
                  
                   
                   
                    },10000);
                }
			});
			
			
			});
        });