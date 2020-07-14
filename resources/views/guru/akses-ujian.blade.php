<style>
    .table-akses{
        font-size:12px;
    }
    td{
        font-size:12px;
    }

   .nav-height{
       height:60px;
   }
</style>

<table class="table table-responsive-sm table-bordered ">
    <thead class="table-akses text-center">
        <tr>
            <th><h6>No</h6></th>
            <th><h6>Izin</h6></th>
            <th><h6>NISN</h6></th>
            <th><h6>Nama</h6></th>
            
        </tr>
    </thead>
<tbody class="table-akses">
<?php $i=0 ; ?>
@forelse ($akses as $aks)

    <tr>
        <td>{{$loop->iteration}}</td>
        <td>
     
        <select class="form-control" name="izin[]" id="">
        @if($aks["hak_akses"]== 1)
        <option selected value="1">Ya</option>
        <option value="0">Tidak</option>
        @else
        <option selected value="0">Tidak</option>
        <option value="1">Ya</option>
        @endif

        </select>
     
      
        </td>
        <td>
        <input class="form-control" type="number" name="nis[]" id="nis" value="{{$aks['nis']}}" />
        <td>
    
        <input class="form-control" type="text" name="nama[]" value="{{$aks['nama']}}">
       
        </td>
        
    </tr>
    <?php $i++; ;?>
@empty
@endforelse

<input type="hidden" name="id" value="{{$id->id}}">
</tbody>
</table>