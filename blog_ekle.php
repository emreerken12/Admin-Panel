<?php
include ('head.php');

?>


  <body class="vertical  dark  ">


    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
      
        <ul class="nav">
          
        
        
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">

          <!-- nav bar -->
     <?php
     
    include 'navbar.php';
     
     ?>
<!-- navbar end -->



<!-- MAIN START -->
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                      
                    </div>
                </div>
                <!-- card start -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Blog Ekle</strong>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="./posts/blog_ekle_post.php"  enctype="multipart/form-data" >
                            <div class="row">
                                <div class="col-md-4">
             
                                 
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <img style="width: 10%;" src="./assets/images/images.png" alt="#"> <br>
                                        <label for="example-fileinput">Blog Resim</label>
                                        <input name="image_src" type="file"   id="example-fileinput" class="form-control-file mb-3">
                                        <input name="title" type="text" placeholder="Başlık"  id="simpleinput" class="form-control mb-3">
                                        <textarea name="description" placeholder="Açıklama Metni" class="form-control mb-3" id="example-textarea" rows="4"></textarea>
                                        <input name="category" type="text" placeholder="Kategori"  id="simpleinput" class="form-control mb-3">
                                     
                                    </div>

                                  
                                    
                                    <button type="submit" class="btn btn-success">Ekle</button>
                                    </form>

                                </div>

                                <div class="col-md-4">
                                    
                              

                                    </div>








                            </div>
                       
                    </div>
                </div>
                <!-- / .card -->
            </div>
        </div>
    </div> <!-- .container-fluid -->

<?php
include ('modal.php');
?>


<!-- proje 1 başlangıç -->

<!-- <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center mb-2">
                <div class="col">
                     Boş alan 
                </div>
            </div>
             card start 
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Project Controls <br> Proje 1 </strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="./posts/project1_post.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="example-fileinput"> Proje İsmi </label>
                                    <input name="project_name1" type="text" placeholder="Proje İsmi" id="simpleinput" class="form-control mb-3">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-fileinput">Proje Açıklaması</label>
                                    <input name="project_description" type="text" placeholder="Proje Açıklaması" id="simpleinput" class="form-control mb-3">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="example-fileinput">Proje Kategorisi</label>
                                    <input name="project_category_name" type="text" placeholder="Proje Kategorisi" id="simpleinput" class="form-control mb-3">
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <img style="width: 10%;" src="./assets/images/images.png" alt="#"> <br>
                                    <label for="example-fileinput">Proje 1 Görsel</label>
                                    <input name="project_image_url" type="file" id="example-fileinput" class="form-control-file">
                                </div>
                                <button type="submit" class="btn mb-2 btn-success">Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          
        </div>
    </div>
</div> -->





<!-- proje 2 başlangıç -->



<!-- proje 2 son -->


<!-- proje 3 başlangıç -->




<!-- proje 3 son -->


<!-- proje 4 başlangıç -->





<!-- proje 4 son -->


</main> <!-- main -->
<!-- MAIN SON -->





<?php

include ('script.php')

?>


  </body>
</html>