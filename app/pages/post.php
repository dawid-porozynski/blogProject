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
        <li><a href="<?=ROOT?>/admin" class="nav-link px-2">Admin</a></li>
      
        <li><a href="<?=ROOT?>/logout" class="nav-link px-2">Wyloguj sie </a></li>
        
      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">New project</button>
        <a href="<?=ROOT?>/login"><button type="button" class="btn btn-primary">Login</button>
        <a href="<?=ROOT?>/logout"><button type="button" class="btn btn-primary me-2">Logout</button>
        
      </div>
    </header>
  </div>

<main class="p-2">
  <div class="row my-2 justify-content-center"></div>

<?php
$slug =$url[1]?? null;
if($slug){
    $query ="select posts.*,categories.category from posts join categories on posts.category_id = categories.id where posts.slug=:slug limit 1";
    $row= query_row($query,['slug'=>$slug]);
}

if (!empty($row)) {?>
   
<div class="col mb-12">
   
       <div class=" g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        
       <div class="col-12 d-lg-block">
       
         <img class="bd-placeholder-img" src="<?php echo ROOT?>/assets/images/image2.jpg" width="220" height="250" >
        
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary-emphasis"><?=$row['category']?? 'unknown'?></strong>
          <h3 class="mb-0"><?=$row['title']?></h3>
          <div class="mb-1 text-body-secondary"><?= date("jS M, Y", strtotime($row['date'])) ?></div>
          <p class="card-text mb-auto"><?=substr($row['content'],0,200)?></p>
       
        </div>
       </div>
      </div>
    </div>



<?php
}else {
echo "no items found ";
}

?>
   
    </main>

<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="<?=ROOT?>" class="nav-link px-2 text-body-secondary">Home</a></li>
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