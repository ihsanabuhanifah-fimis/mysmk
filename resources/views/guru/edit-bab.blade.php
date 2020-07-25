<form method="post" class="form_edit_bab"  action="javascript:void(0)">
      @csrf
      {{method_field('PUT')}}
      <div class="notice-bab text-center"></div>
        <label for="id_subject">Mata Pelajaran</label>
        <select class="form-control" name="id_subject" id="id_subject">
            @forelse ($mapels as $mapel)

            <option  value="{{$mapel->id_subject}}">{{$mapel->subject_name}}</option>
            @empty
            @endforelse
        </select>
        <label for="id_bab">Nama Bab</label>
        <input type="hidden" name="id" value="{{$mapels[0]->id_bab}}">
        <input class="form-control" required type="text" value="{{$mapels[0]->nama_bab}}" name="id_bab" id="id_bab" /> 
     
        
      </div>
      <div class="mt-5 bg-light">
              <label for="hapus">Apakah Ustadz ingin menghapusnya (Pilih Ya jika ingin menghapus)</label>
              <select class="form-control" name="hapus" id="hapusbab">
                  <option value="">-</option>
                  <option value="1">Ya</option>
                  <option value="2">Batal</option>
              </select>

          </div>
      </form>

      <script>
        $(document).ready(function(){
        var i=1;
            $("#hapusbab").change(function(){
                
                var a = $(this).val();
                if(a==1){
                    $('#hapus-bab').removeClass('btn-success');
                    $('#hapus-bab').addClass('btn-danger');
                    $('#hapus-bab').text("Hapus");


                }else{
                    $('#hapus-bab').removeClass('btn-danger');
                    $('#hapus-bab').addClass('btn-success');
                    $('#hapus-bab').text("Edit");
                }
                });
});
      </script>
