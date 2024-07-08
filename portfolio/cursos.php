 <?php include "./includes/header.php"; ?>
 <section class="section color-1 d-flex align-items-center ptb_100 ">
     <div class="container">
         <div class="row">
             <div class="col-12 mt-5">
                 <div class="breadcrumb-content text-center">
                     <h1 class="text-white  mb-3 mt-5">Meus cursos</h1>
                     <ol class="breadcrumb d-flex justify-content-center">
                         <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.html">Inicio</a></li>
                         <li class="breadcrumb-item text-white active">Cursos</li>
                     </ol>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <section class="section color-1 d-flex align-items-center ptb_150">
     <div class="container color-1 rounded">
         <div class="row justify-content-center">
                 <div class="section-heading text-center bg-white rounded-3">
                     <?php include "./controllers/ControllerCurso.php"; ?>
             </div>
         </div>
     </div>
 </section>
 <script src="./assets/js/script-mensagens-cursos.js"></script>
 <?php include "./includes/footer.php"; ?>