<div>
    <label for="ph"><h5>Penilaian Harian (dalam %)</h5></label>
    <input class="form-control" type="number" name="ph" id="ph" value="{{$mapels[0]->PH}}" />
</div>
<br>
<div>
    <label for="pts"><h5>Penilaian Tengah Semester (dalam %)</h5></label>
    <input class="form-control" type="number" name="pts" id="pts" value="{{$mapels[0]->PTS}}" />
</div>
<br>
<div>
    <label for="ph"><h5>Penilaian Akhir Semester (dalam %)</h5></label>
    <input class="form-control" type="number" name="pas" id="pas" value="{{$mapels[0]->PAS}}" />
</div>
<br>
<div>
    <label for="tugas"><h5>Tugas (dalam %)</h5></label>
    <input class="form-control" type="number" name="tugas" id="tugas" value="{{$mapels[0]->Tugas}}" />
</div>
<br>
<div>
    <label for="kuis"><h5>Kuis (dalam %)</h5></label>
    <input class="form-control" type="number" name="kuis" id="kuis" value="{{$mapels[0]->Kuis}}" />
</div>

<input type="hidden" name="id" value="{{$mapels[0]->id}}">