
<script>
      $(document).ready(function() {
        $('#myTableWali').DataTable();
      } );
  </script>
   <div class="text-center mt-5">
<h5>Daftar Wali Santri Aktif</h5>
</div>
<table id="myTableWali" class="table table-responsive-sm  table-bordered table-striped">
<thead class="bg-success">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NISN</th>
        <th>Wali dari</th>
        <th>Email</th>
        <th>No. Handphone</th>
        
        
    </tr>
</thead>
    <tbody>
        @forelse($walis as $wali)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$wali->name}}</td>
            <td>{{$wali->nisn}}</td>
            <td>{{$wali->nama_santri}}</td>
            <td>{{$wali->email}}</td>
            <td>{{$wali->no_hp}}</td>
            
            
        </tr>
        @empty
        @endforelse
        <tr>

        </tr>
    </tbody>

</table>