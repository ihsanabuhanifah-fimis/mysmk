
<script>
    $(document).ready( function () {
        $('#myHarian').DataTable();
    } );
    </script>
<div class="mt-3">
<table id="myHarian" class="table table-bordered">
    <thead class="bg-success">
        <tr>
            <th class="text-center">No</th>
            <th>Hari</th>
            <th class="text-center">Kegiatan</th>
            <th>Catatan Wali Kelas</th>
            
        </tr>
    </thead>
    <tbody>
        @forelse($daftars as $daftar)
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td>{{$daftar->hari}}, {{$daftar->tanggal}}</td>
          
            <td class="text-center">
            <button  type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal{{$loop->iteration}}">
               Kegiatan
                </button>
            </td>
            <td >
                {{$daftar->wali}}
            </td>
            </tr>
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        @empty
        @endforelse
    </tbody>
</table>
</div>