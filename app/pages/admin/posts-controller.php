<?php

//dodaj nowego
if ($action == 'add') {
    if (!empty($_POST)) {
      //validate
      $errors = [];
  
      if (empty($_POST['title'])) {
        $errors['title'] = "A title is required";
      } 
  

      if (empty($_POST['category_id'])) {
        $errors['category_id'] = "A category_id is required";
      }


        $slug =str_to_url($_POST['category']);
        $query = "select id from posts where slug = :slug limit 1";
        $slug_row = query($query, ['slug' => $slug]);
    
     if ($slug_row) {
      $slug.=rand(1000,9999);
     }

      if (empty($errors)) {
        //save to database
        $data = [];
        $data['title'] = $_POST['title'];
        $data['content']    = $_POST['content'];
        $data['category_id']    = $_POST['category_id'];
        $data['slug']     = $slug;
        $data['user_id']     = user('id');

        $query = "insert into posts (title,content,slug,category_id,user_id) values (:title,:content,:slug,:category_id,:user_id)";
        query($query, $data);
  
        redirect('admin/posts');
      }
    }
  } 
else
  

  
    if ($action == 'edit') {
  
      $query = "select*from posts where id=:id limit 1;";
      $row = query_row($query, ['id' => $id]);
  
  if (!empty($_POST)) {
     
    if($row)
    {

      //validate
      $errors = [];

    if (empty($_POST['title'])) {
        $errors['title'] = "A title is required";
      } 
  

      if (empty($_POST['category_id'])) {
        $errors['category_id'] = "A category_id is required";
      }


       }
        if (empty($errors)) {
          //save to database
          $data = [];
          $data['title'] = $_POST['title'];
          $data['content']    = $_POST['content'];
          $data['category_id']     = $_POST['category_id'];
          $data['id']     = $id;
  
       $query = "update posts set title=:title, content=:content, category_id=:category_id where id=:id limit 1;";
        
  
          query($query, $data);
  
          redirect('admin/posts');
        }
      }
    
  
     } else
  
 
  
    if ($action == 'delete') {
  
      $query = "select*from posts where id=:id limit 1;";
      $row = query_row($query, ['id' => $id]);
  
  if (!empty($_SERVER['REQUEST_METHOD']=="POST")) {
     
      if ($row) {
        //validate
        $errors = [];
  
        if (empty($errors)) {
          //delete from database
          $data = [];
  
          $data['id']     = $id;
            $query="delete from posts where id=:id limit 1";
  
          query($query, $data);
  
          redirect('admin/posts');
        }
      }
    }
  }

?>