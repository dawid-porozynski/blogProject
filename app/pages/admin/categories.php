<?php if ($action == 'add') : ?>

<div class="col-md-6 mx-auto">
  <form method="post" enctype="multipart/form-data">

    <h1 class="h3 mb-3 fw-normal">Create category</h1>

    <?php if (!empty($errors)) : ?>
      <div class="alert alert-danger">Please fix the errors below</div>
    <?php endif; ?>

    <div class="my-2">
      <label class="d-block">

      </label>
      <?php if (!empty($errors['image'])) : ?>
        <div class="text-danger"><?= $errors['image'] ?></div>
      <?php endif; ?>


    </div>


    <div class="form-floating">
      <input value="<?= oldValue('category') ?>" name="category" type="text" class="form-control mb-2" id="floatingInput" placeholder="category">
      <label for="floatingInput">category</label>
    </div>
    <?php if (!empty($errors['category'])) : ?>
      <div class="text-danger"><?= $errors['category'] ?></div>
    <?php endif; ?>

 
    <div class="form-floating my-3">

      <select name="disabled" class="form-select">
        <option value="0">tak</option>
        <option value="1">nie</option>
      </select>
      <label for="floatingInput">acrive</label>
    </div>
 
    <a href="<?= ROOT ?>/admin/categories">
      <button class="mt-4 btn btn-lg btn-primary" type="button">Back</button>
    </a>
    <button class="mt-4 btn btn-lg btn-primary float-end" type="submit">Create</button>

  </form>
</div>






<?php elseif ($action == 'edit') : ?>
<div class="col-md-6 mx-auto">
  <form method="post" enctype="multipart/form-data">

    <h1 class="h3 mb-3 fw-normal">edit account</h1>
    <?php if (!empty($row)) : ?>
      <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">Please fix the errors below</div>
      <?php endif; ?>

      <div class="form-floating">
        <input value="<?= oldValue('category', $row['category']) ?>" name="category" type="text" class="form-control mb-2" id="floatingInput" placeholder="category">
        <label for="floatingInput">category</label>
      </div>
      <?php if (!empty($errors['category'])) : ?>
        <div class="text-danger"><?= $errors['category'] ?></div>
      <?php endif; ?>

      
      <div class="form-floating my-3">

        <select name="disabled" class="form-select">
          <option value="0">yes </option>
          <option value="1">no</option>
        </select>
        <label for="floatingInput">active</label>
      </div>
      
      <a href="<?= ROOT ?>/admin/categories">
        <button class="mt-4 btn btn-lg btn-primary" type="button">Back</button>
      </a>
      <button class="mt-4 btn btn-lg btn-primary float-end" type="submit">Save</button>
    <?php else : ?>
      <div class="alet alert-danger text-center">Record not found</div>
    <?php endif; ?>
  </form>
</div>





<?php elseif ($action == 'delete') : ?>
<div class="col-md-6 mx-auto">
  <form method="post" enctype="multipart/form-data">

    <h1 class="h3 mb-3 fw-normal">delete category</h1>
    <?php if (!empty($row)) : ?>
      <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">Please fix the errors below</div>
      <?php endif; ?>

   
      <div class="form-floating">
        <div class="form-control mb-2"><?= oldValue('category', $row['category']) ?></div>
      </div>
      <?php if (!empty($errors['category'])) : ?>
        <div class="text-danger"><?= $errors['category'] ?></div>
      <?php endif; ?>

      <div class="form-floating">
        <div class="form-control mb-2"><?= oldValue('slug', $row['slug']) ?></div>

      </div>
      <?php if (!empty($errors['slug'])) : ?>
        <div class="text-danger"><?= $errors['slug'] ?></div>
      <?php endif; ?>

      <a href="<?= ROOT ?>/admin/categories">
        <button class="mt-4 btn btn-lg btn-primary" type="button">Back</button>
      </a>
      <button class="mt-4 btn btn-lg btn-primary float-end" type="submit">delete</button>
    <?php else : ?>
      <div class="alet alert-danger text-center">Record not found</div>
    <?php endif; ?>
  </form>
</div>


<?php else : ?>

<h4>
  Kategorie
  <a href="<?= ROOT ?>/admin/categories/add">
    <button class="btn btn-primary">Add New</button>
  </a>
</h4>

<div class="table-responsive">
  <table class="table">

    <tr>
      <th>#</th>
      <th>Kategoria</th>
      <!-- <th>slug</th> -->
      <th>disabled</th>
      
      <th>Action</th>
    </tr>

    <?php
    $limit = 10;
    $offset = (1 - 1) * $limit;

    $query = "select * from categories order by id desc limit $limit offset $offset";
    $rows = query($query);

    ?>
    <?php

    if (!empty($rows)) : ?>
      <?php foreach ($rows as $row) : ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['category'] ?></td>
          <!-- <td><?= $row['slug'] ?></td> -->
          <td><?= $row['disabled'] ?></td>

          <td>
            <a href="<?= ROOT ?>/admin/categories/edit/<?= $row['id'] ?>">
              <button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
            </a>
            <a href="<?= ROOT ?>/admin/categories/delete/<?= $row['id'] ?>">
              <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
            </a>
          </td>
        </tr>

      <?php endforeach; ?>
    <?php endif; ?>
  </table>
</div>
<?php endif; ?>