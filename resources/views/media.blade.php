<!-- Button trigger modal -->
<div class="p-2 mt-3 d-flex justify-content-end">
<div data-toggle="modal" data-target="#exampleModal"><i class="fa fa-lg mr-1 fa-file-image" aria-hidden="true"></i> Image</div>
<div data-toggle="modal" class="ml-3"><i class="fa fa-lg mr-1 fa-file-pdf" aria-hidden="true"></i>PDF</div>
</div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        <div class="gambar"></div>
      </div>
      
  
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.gambar').load('/upload/gambar')
    });