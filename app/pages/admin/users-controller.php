<?php

//dodaj nowego
if ($action == 'add') {
    if (!empty($_POST)) {
      //validate
      $errors = [];
  
      if (empty($_POST['username'])) {
        $errors['username'] = "A username is required";
      } else
      if (!preg_match("/^[a-zA-Z]+$/", $_POST['username'])) {
        $errors['username'] = "Username can only have letters and no spaces";
      }
  
      $query = "select id from users where email = :email limit 1";
      $email = query($query, ['email' => $_POST['email']]);
  
      if (empty($_POST['email'])) {
        $errors['email'] = "A email is required";
      } else
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email not valid";
      } else
      if ($email) {
        $errors['email'] = "That email is already in use";
      }
  
      if (empty($_POST['password'])) {
        $errors['password'] = "A password is required";
      } else
      if (strlen($_POST['password']) < 8) {
        $errors['password'] = "Password must be 8 character or more";
      } else
      if ($_POST['password'] !== $_POST['retypePassword']) {
        $errors['password'] = "Passwords do not match";
      }
  
  
      if (empty($errors)) {
        //save to database
        $data = [];
        $data['username'] = $_POST['username'];
        $data['email']    = $_POST['email'];
        $data['role']     = $_POST['role'];
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
  
        $query = "insert into users (username,email,password,role) values (:username,:email,:password,:role)";
        query($query, $data);
  
        redirect('admin/users');
      }
    }
  } else
  
  
  
  
    if ($action == 'edit') {
  
      $query = "select*from users where id=:id limit 1;";
      $row = query_row($query, ['id' => $id]);
  
  if (!empty($_POST)) {
     
      if ($row) {
        //validate
        $errors = [];
  
        if (empty($_POST['username'])) {
          $errors['username'] = "A username is required";
        } else
      if (!preg_match("/^[a-zA-Z]+$/", $_POST['username'])) {
          $errors['username'] = "Username can only have letters and no spaces";
        }
  
        $query = "select id from users where email = :email && id !=:id limit 1";
        $email = query($query, ['email' => $_POST['email'], 'id' => $id]);
  
        if (empty($_POST['email'])) {
          $errors['email'] = "A email is required";
        } else
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          $errors['email'] = "Email not valid";
        } else
      if ($email) {
          $errors['email'] = "That email is already in use";
        }
  
        if (empty($_POST['password'])) {
          // unset($_POST['password']);
          $errors['password'] = "A password is required";
        } else
      if (strlen($_POST['password']) < 8) {
          $errors['password'] = "Password must be 8 character or more";
        } else
      if ($_POST['password'] !== $_POST['retypePassword']) {
          $errors['password'] = "Passwords do not match";
        }
  
  
        if (empty($errors)) {
          //save to database
          $data = [];
          $data['username'] = $_POST['username'];
          $data['email']    = $_POST['email'];
          $data['role']     = $_POST['role'];
          $data['id']     = $id;
  
          if (empty($_POST['password'])) {
            $query = "update users set username=:username, email=:email, role=:role where id=:id limit 1;";
          } else {
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "update users set username=:username, email=:email, password=:password, role=:role where id=:id limit 1;";
          }
  
          query($query, $data);
  
          redirect('admin/users');
        }
      }
    }
  }
  else
  
  
  
  
  
    if ($action == 'delete') {
  
      $query = "select*from users where id=:id limit 1;";
      $row = query_row($query, ['id' => $id]);
  
  if (!empty($_SERVER['REQUEST_METHOD']=="POST")) {
     
      if ($row) {
        //validate
        $errors = [];
  
        if (empty($errors)) {
          //delete from database
          $data = [];
  
          $data['id']     = $id;
            $query="delete from users where id=:id limit 1";
  
          query($query, $data);
  
          redirect('admin/users');
        }
      }
    }
  }
  
?>