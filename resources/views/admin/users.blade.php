
<style>
    .hide{
        display:none;
    }
</style>
<script>
      $(document).ready(function() {
        $('#myTableUser').DataTable();
      } );
  </script>

<div class="conteiner mt-3">
    <div class="d-flex justify-content-md-end justify-content-sm-between   ">
        <button id="daftar-wali" class="btn btn-success  mr-md-2 ">Daftar Wali</button>
        <button id="daftar-siswa" class="btn btn-success mr-md-2 ">Daftar Siswa</button>
        <button id="daftar-user" class="btn btn-success ">Daftar User</button>
        

    </div>
    <div class="p-md-4 p-sm-0 border mt-3">
    <div class="daftar-siswa hide"></div>
    <div class="daftar-wali hide"></div>
    <div class="daftar-user">
        <h4 class="text-center">Daftar User</h4>
        <table id="myTableUser" class="table table-responsive-sm table-responsive-md mt-2 border">
        <thead class="bg-success">
            <tr>
                <th class="text-center">No</td>
                <th>Nama</td>
                <th class="text-center">NISN</th>
                <th>Email</th>
                <th class="text-center">Daftar Sebagai</th>
                <th>Secret</th>
                <th>Verifikasi Email</th>
                
            
                
            </tr>
        </thead>
        <tbody class=>
        @forelse ($users as $user)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td class="text-center">{{$user->nisn}}</td>
            <td>{{$user->email}}</td>
            <td>
            @if($user->daftar_sebagai == 1)
            <p>Kepala Sekolah</p>
            @elseif($user->daftar_sebagai == 2)
            <p>Guru</p>
            @elseif($user->daftar_sebagai == 3)
            <p>Musyrif</p>
            @elseif($user->daftar_sebagai == 4)
            <p>Staf TU</p>
            @elseif($user->daftar_sebagai == 5)
            <p>Wali Santri</p>
            @elseif($user->daftar_sebagai == 6)
            <p>Santri</p>
            @endif

            </td>
            <td>{{$user->secret_number}}</td>
            <td>{{$user->email_verified_at}}</td>
          
        
            
        </tr>

        @empty

        @endforelse
        </tbody>
        </table>
    </div>
</div>
</div> 
<script>
    $(document).ready(function(){
    $("#daftar-siswa").click(function(){
        $(".daftar-wali").addClass("hide");
        $(".daftar-user").addClass("hide")
        $(".daftar-siswa").removeClass("hide")
        $(".daftar-siswa").load("/admin/daftar-siswa")
       

    });
  });
  $(document).ready(function(){
    $("#daftar-wali").click(function(){
     
        $(".daftar-user").addClass("hide");
        $(".daftar-siswa").addClass("hide");
        $(".daftar-wali").removeClass("hide");
        $(".daftar-wali").load("/admin/daftar-wali");
       

    });
  });
  $(document).ready(function(){
    $("#daftar-user").click(function(){
        $(".daftar-wali").addClass("hide");
        $(".daftar-siswa").addClass("hide")
        $(".daftar-user").removeClass("hide")
      
       

    });
  });
</script>