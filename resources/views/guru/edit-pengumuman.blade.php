<form method="post" class="form-pengumuman" action="javascript:void(0)">
         @csrf
         <div>
             <label for="tanggal">Tanggal</label>
             <input type="date" value="{{$daftars[0]->tanggal}}" name="tanggal" class="form-control">
         </div>
         <div>
             <label for="id_subject">Mata Pelajaran</label>
         
             <select class="form-control" name="id_subject" id="id_subject">
             <option selected value="{{$daftars[0]->id_subject}}">{{$daftars[0]->subject_name}}</option>   
             @forelse($subjects as $subject)

                <option value="{{$subject->id_subject}}">{{$subject->subject_name}}</option>
                 @empty
                 @endforelse
                 <option value="W">Wali Santri</option>
             </select>
             </div>
             <div>
             <label for="id_rombel">Kelas</label>
             
             <select class="form-control" name="id_rombel" id="id_rombel">
             <option selected value="{{$daftars[0]->id_rombel}}">{{$daftars[0]->nama_rombel}}</option>   
                 @forelse($rombels as $rombel)

                <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
                 @empty
                 @endforelse
                 <option value="W">Wali Santri</option>
             </select>
         </div>
         <div class="mt-3">
             <textarea name="umum" class="summernote">{{$daftars[0]->pengumuman}}</textarea>
         </div> 
    
      </div>
      <div class="mt-5 bg-light p-4">
              <label for="hapus">Apakah Ustadz ingin menghapusnya (Pilih Ya jika ingin menghapus)</label>
              <select class="form-control" name="hapus" id="hapus">
                  <option value="">-</option>
                  <option value="1">Ya</option>
              </select>

          </div>

      <div class="modal-footer">
        
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success simpan-pengumuman">Edit</button>
         </form>

         
<script>
        $(document).ready(function() {
        $('.summernote').summernote();
        
        });     
    </script>