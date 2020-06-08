<style>
    .table-akses{
        font-size:12px;
    }
    td{
        font-size:12px;
    }
</style>

<table class="table">
    <thead class="table-akses">
        <tr>
            <td>No</td>
            <td>Izin</td>
            <td>NIS</td>
            <td>Nama</td>
        </tr>
    </thead>
<tbody class="table-akses">
<?php $i=0 ; ?>
@forelse ($aksess as $aks)

    <tr>
        <td>{{$loop->iteration}}</td>
        <td>
     
        <select class="" name="izin[]" id="">
        @if($aks->a == 1)
        <option selected value="1">Ya</option>
        <option value="0">Tidak</option>
        @else
        <option selected value="0">Tidak</option>
        <option value="1">Ya</option>
        @endif

        </select>
     
      
        </td>
        <td>
            <input class="" type="number" name="nis[]" id="nis" value="{{$aks->s}}" />
        </td>
        <td>
            <input class="" type="text" name="nama[]" value="nama">
        </td>
        
    </tr>
    <?php $i++; ;?>
@empty
@endforelse

<input type="hidden" name="id" value="{{$akses->id}}">
</tbody>
</table>