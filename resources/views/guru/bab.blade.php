    
       <select  class="form-control" name="id_bab" id="id_bab">
          @forelse ($babs as $bab)
           <option value="{{$bab->id_bab}}">{{$bab->nama_bab}}</option>
           @empty
          @endforelse  
    </select>
 
    