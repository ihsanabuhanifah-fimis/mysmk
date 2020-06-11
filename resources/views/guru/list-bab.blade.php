
    <script src="/js/jquery-3.3.1.min.js"></script> 
    <h1 class="mt-4">List BAB</h1>
 <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Ini adalah daftar bab yang telah di buat</li>
 </ol>
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalBab">
            Tambah_bab
        </button> -->
    <table class="table table-bordered table-responsive-sm">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Mata Pelajaran</th>
                <th>Nama Bab</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse($babs as $bab)
            <tr>
              
                <td class="text-center">{{$loop->iteration}}</td>
                <td>{{$bab->subject_name}}</td>
                <td>{{$bab->nama_bab}}</td>
                <td class="text-center"><a class="btn btn-outline-danger">Hapus</a></td>

              
            </tr>
            @empty
            <td colspan="100"><h6 class="alert alert-danger text-center">Ustadz saat ini tidak memiliki BAB Materi yang dibuat</h6></td>
                @endforelse
        </tbody>

    </table>

<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		$(".tambah_bab").click(function(){
            $(this).text("Menambahkan Bab ...");
            $("notice-bab").removeClass("alert alert-success");
            $("notice-bab").removeClass("alert alert-danger");
            $("notice-bab").empty();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'post',
				url: "{{route('tambah_bab')}}",
				data: $('.form_tambah_bab').serialize(),
				success: function(data) {
                 
                    $(".notice-bab").addClass("alert alert-success");
                    $(".notice-bab").text(data);
                    $(".tambah_bab").text("Tambah");
                    $(".tampilkanbab").load("guru/tampilkanbab"); 
                    document.getElementById(".id_bab").reset(); 
                    setTimeout(function(){
                        $(".notice-bab").removeClass("alert alert-success");
                         $(".notice-bab").empty();
                    },10000);
                },
                error: function(jqXHR, exception){
                        $(".notice-bab").addClass("alert alert-danger");
                        $(".notice-bab").text("Bab tidak berhasil ditambahkan");
                        $(".tambah_bab").text("Tambah");
                    setTimeout(function(){
                        $(".notice-bab").removeClass("alert alert-danger");
                        $(".notice-bab").empty();
                        
                    },5000);

                    
                   
                }
			});
			
			
			});
		});
       
  </script>