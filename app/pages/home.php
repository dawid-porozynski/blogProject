<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Home</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="<?= ROOT?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   
    
    <!-- Custom styles for this template -->
    <link href="<?php echo ROOT?>/assets/css/headers.css" rel="stylesheet">
  </head>
  <body>
   


<main>
  
  

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        
          <img src="<?php echo ROOT?>/assets/images/logo.jpg" width="80" height="64"> 
     
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?=ROOT?>" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="<?=ROOT?>/blog" class="nav-link px-2">blog</a></li>
        <li><a href="<?=ROOT?>/admin" class="nav-link px-2">admin</a></li>
        <li><a href="<?=ROOT?>/logout" class="nav-link px-2">Wyloguj sie </a></li>
        
      </ul>

      <div class="col-md-3 text-end">
      <a href="<?=ROOT?>/admin/posts/add"><button type="button" class="btn btn-outline-primary me-2">New project</button>
        <a href="<?=ROOT?>/login"><button type="button" class="btn btn-primary">Login</button>
        <a href="<?=ROOT?>/logout"><button type="button" class="btn btn-primary me-2">Logout</button>
        
      </div>
    </header>
  </div>
<link rel="stylesheet" href="<?php echo ROOT?>/assets/slider/ism/css/my-slider.css"/>
<script src="<?php echo ROOT?>/assets/slider/ism/js/ism-2.2.min.js"></script>
<!--slider-->
<link rel="stylesheet" href="ism/css/my-slider.css"/>
  <script src="<?php echo ROOT?>/assets/slider/ism/js/ism-2.2.min.js"></script>
  
<div class="ism-slider" data-transition_type="fade" data-play_type="loop" id="my-slider">
  <ol>
    <li>
      <img src="<?php echo ROOT?>/assets/slider/ism/image/slides/flower-729514_1280.jpg">
     
    </li>
    <li>
      <img src="<?php echo ROOT?>/assets/slider/ism/image/slides/beautiful-701678_1280.jpg">
   
    </li>
    <li>
      <img src="<?php echo ROOT?>/assets/slider/ism/image/slides/summer-192179_1280.jpg">
      
    </li>
    <li>
      <img src="<?php echo ROOT?>/assets/slider/ism/image/slides/city-690332_1280.jpg">
      
    </li>
  </ol>
</div>
<main class="p-2">
  <div class="row my-2 justify-content-center"></div>

<?php
$query ="select posts.*,categories.category from posts join categories on posts.category_id = categories.id order by id desc limit 6";
$rows= query($query);
if ($rows) {
foreach($rows as $row){
  include '../app/pages/includes/post-card.php';
}
}else {
echo "no items found ";
}

?>
   
    </main>

<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="<?=ROOT?>" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li><a href="<?=ROOT?>/blog" class="nav-link px-2">blog</a></li>
      <li><a href="<?=ROOT?>/admin" class="nav-link px-2">Admin</a></li>
      
        <li><a href="<?=ROOT?>/logout" class="nav-link px-2">Wyloguj sie </a></li>
         </ul>
    <p class="text-center text-body-secondary">&copy; 2024 BlogProject</p>
  </footer>
</div>
 
</main>
<script src="<?php echo ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
