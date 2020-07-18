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
<button class="btn btn-success izinkan mb-4"> Izinkan semua</button>
<table class="table table-responsive-sm table-bordered ">
    <thead class="table-akses text-center bg-success">
        <tr>
            <th><h6>No</h6></th>
            <th><h6>Izin</h6></th>
            <th><h6>NISN</h6></th>
            <th class="text-left"><h6>Nama</h6></th>
            
        </tr>
    </thead>
<tbody class="table-akses">
<?php $i=0 ; ?>
@forelse ($akses as $aks)

    <tr>
        <td class="text-center">{{$loop->iteration}}</td>
        <td class="text-center">
     
        <select class="btn border" class="akses" name="izin[]" id="">
        @if($aks["hak_akses"]== 1)
        <option selected value="1">Ya</option>
        <option value="0">Tidak</option>
        @else
        <option selected value="0">Tidak</option>
        <option value="1">Ya</option>
        @endif

        </select>
     
      
        </td>
        <td class="text-center">
        {{$aks['nis']}}   
        <input class="form-control" type="hidden" name="nis[]" id="nis" value="{{$aks['nis']}}" />
        <td>
        {{$aks['nama']}}
        <input class="form-control" type="hidden" name="nama[]" value="{{$aks['nama']}}">
       
        </td>
        
    </tr>
    <?php $i++; ;?>
@empty
@endforelse

<input type="hidden" name="id" value="{{$id->id}}">
</tbody>
</table>

<script>
$(document).ready(function(){
  $(".izinkan").click(function(){
   $(".akses").selected()
  });
});
</script>