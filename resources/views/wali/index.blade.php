@extends('wali.layout.master')
@section('title','Home')

@section('content')

<header>
 <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
               
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</header>
<main>
<div class="container-fluid">
  <div class="row">
  <div class="col-md-2 border">
  <div class="navigasi">
  <div class=" mx-auto mt-3 text-primary ">
     
     <ul class=" dekstop mt-3 ml-2 mr-2 nav nav-pills mb-3 flex-column" id="tab" role="tablist">
     <li class=" font-weight-bold border-bottom ml-2 mr-2 mb-2 nav-bab nav-item">
         <p class=" nav-link ">MENU ADMINISTRASI</p>
       </li>
       <li class=" ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link " id="" data-toggle="pill" 
         href="#" role="tab" aria-controls="pills-tugas" 
         aria-selected="true">Dashboard </a>
       </li>
     <li class=" ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link " id="materi" data-toggle="pill" 
         href="#pills-tugas" role="tab" aria-controls="pills-tugas" 
         aria-selected="true">Pengumuman </a>
       </li>
       <li class="ml-2 mr-2 mb-2  nav-bab nav-item">
         <a class=" nav-link " id="tugas" data-toggle="pill" 
         href="#pills-materi" role="tab" aria-controls="pills-materi" 
         aria-selected="true">Pelajaran</a>
       </li>
       <li class="ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link active" id="pills-jadwal-tab" data-toggle="pill" 
         href="#pills-jadwal" role="tab" aria-controls="pills-jadwal" 
         aria-selected="false">Jadwal Ujian</a>
       </li>
       <li class="ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link" id="pills-contact-tab" data-toggle="pill" 
         href="#pills-contact" role="tab" aria-controls="pills-contact" 
         aria-selected="false">Nilai</a>
       </li>
       <li class=" ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link" id="pills-nilai-tab" data-toggle="pill" 
         href="#pills-nilai" role="tab" aria-controls="pills-contact" 
         aria-selected="false">Halaqoh</a>
       </li>
       <li class=" ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link" id="pills-nilai-tab" data-toggle="pill" 
         href="#pills-ujian" role="tab" aria-controls="pills-contact" 
         aria-selected="false">Pelanggaran</a>
       </li>
     </ul>
     </div>
      </div>
  </div>

  <div class="col-md-10 border">
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores repudiandae sed laboriosam sit beatae odio quis possimus, amet minima cupiditate aperiam corrupti repellendus, blanditiis temporibus necessitatibus iusto ex? Quam itaque dignissimos veritatis suscipit quis omnis officia deserunt corporis iste! Nostrum perferendis eius recusandae quos, quaerat dolorum explicabo eligendi consectetur assumenda necessitatibus maxime ad nam doloremque ea, qui expedita similique modi reiciendis tenetur magnam vel! Error incidunt rerum omnis voluptatibus dignissimos! Dolor magni ipsa iste similique doloribus laboriosam fugit odio fuga expedita dolorem quaerat quibusdam sequi, voluptatibus praesentium, maiores nulla ullam obcaecati accusamus molestiae tenetur impedit neque! Officia natus dicta aliquid veritatis rerum reiciendis, impedit delectus fugiat sed assumenda et provident, velit repudiandae amet facilis eveniet nobis doloremque unde, obcaecati consectetur nesciunt vel? Dolore atque neque sed, laborum corporis sit sunt accusantium doloribus sequi officiis reprehenderit eligendi beatae culpa alias ex quas autem repellat quidem libero laudantium molestiae delectus qui iste! Velit sit dolore ex debitis suscipit, sed fugit quae? Eaque, culpa numquam? Impedit cum, est soluta omnis minus quisquam itaque numquam sed iste tempore dolor officia dolores in aut asperiores? Laboriosam, repellendus harum vel impedit nobis molestias similique sit, sint laborum, magnam atque distinctio beatae! Ad sed maiores, molestiae ab quasi quae laudantium placeat nisi, possimus repudiandae distinctio. Necessitatibus, veniam minima. Similique neque provident unde necessitatibus recusandae, aut fugiat. Quia quisquam deleniti fugiat numquam commodi? Praesentium quis esse ipsa necessitatibus aspernatur quisquam, facilis voluptas ab porro? Similique dolores ab repellendus atque eligendi quo! Ipsa odio iusto, natus aliquam ex harum blanditiis dolore quas, sapiente deleniti inventore ad, libero repellendus at! Veniam, voluptatibus rem illo neque nobis iusto nemo, delectus quis eum explicabo magni doloremque numquam culpa adipisci aut et sint qui animi sunt aliquid ratione, molestiae repellendus! Adipisci iusto, vero non nobis distinctio placeat soluta ratione voluptate minima, reiciendis culpa quo repellat eos natus ducimus architecto aperiam laborum officia possimus odit dolor! Animi dolore, nihil corporis consectetur sequi adipisci voluptate sint esse aut autem veniam optio provident, enim praesentium sed recusandae perferendis odit. Obcaecati dolorem atque error! Cumque reiciendis iste incidunt nisi nobis cum sunt nihil maiores! Ipsam adipisci eaque illo! Minima similique hic deserunt, beatae facilis cumque perferendis pariatur itaque eum illo molestias in sed ut voluptas expedita enim esse at eaque harum nesciunt nobis nostrum quod odio? In possimus aliquam quam cumque. Iure illum optio in impedit nesciunt culpa tenetur iusto sed architecto? Quasi blanditiis quisquam perferendis libero laborum quaerat reiciendis cum magnam quis vitae totam laboriosam inventore exercitationem ad officiis explicabo, fugiat placeat error maiores cumque rem harum. Aperiam quis, consectetur totam nihil eum numquam? Repellendus earum quaerat consequuntur laudantium iure! Doloremque architecto velit pariatur maiores eaque ducimus, facere accusamus amet nemo quas aspernatur, autem consequatur impedit aperiam sequi? Ad, tenetur. Quo minus, neque odio accusantium necessitatibus cumque magni sint, nemo aliquam nisi aperiam quas aliquid ipsum veniam illum. Voluptates quis in sequi cum, et repudiandae itaque maxime animi similique a enim incidunt nostrum repellendus officiis veniam exercitationem, natus, ducimus libero! Molestiae odio placeat laudantium aspernatur quas.</div>

  </div>
</div>
</main>
@endsection