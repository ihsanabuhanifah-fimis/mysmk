@forelse($nilais as $nilai)

<div class="card p-2 mb-3 alert alert-success">
@if($loop->iteration == 1)

<b>Penilaian ke - {{$loop->iteration}} : Nilai {{$nilai->nilai}}</b>
@else
<b>Remidial Ke- {{$loop->iteration}} : Nilai {{$nilai->nilai}}</b>
@endif
</div>

@empty
@endforelse



