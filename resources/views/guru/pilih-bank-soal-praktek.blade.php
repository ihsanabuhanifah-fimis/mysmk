<style>
.class{
    overflow:auto;
}
</style>

<div class="alert alert-success list ">
@forelse($soals as $soal)
<div class="list-item class" draggable="true">{!!$soal->s!!}</div>
@empty
@endforelse
</div>
<script src="/js/drag-drop.js"></script>
<script>
        $(document).ready(function() {
        $('.summernote').summernote();
        
        });     
    </script>