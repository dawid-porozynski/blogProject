<?php if ($action == 'add') : ?>

  <div class="col-md-6 mx-auto">
    <form method="post" enctype="multipart/form-data">

      <h1 class="h3 mb-3 fw-normal">Create account</h1>

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
        <input value="<?= oldValue('username') ?>" name="username" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
        <label for="floatingInput">Username</label>
      </div>
      <?php if (!empty($errors['username'])) : ?>
        <div class="text-danger"><?= $errors['username'] ?></div>
      <?php endif; ?>

      <div class="form-floating">
        <input value="<?= oldValue('email') ?>" name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <?php if (!empty($errors['email'])) : ?>
        <div class="text-danger"><?= $errors['email'] ?></div>
      <?php endif; ?>

      <div class="form-floating my-3">

        <select name="role" class="form-select">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
        <label for="floatingInput">Role</label>
      </div>
      <?php if (!empty($errors['role'])) : ?>
        <div class="text-danger"><?= $errors['role'] ?></div>
      <?php endif; ?>

      <div class="form-floating">
        <input value="<?= oldValue('password') ?>" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <?php if (!empty($errors['password'])) : ?>
        <div class="text-danger"><?= $errors['password'] ?></div>
      <?php endif; ?>

      <div class="form-floating">
        <input value="<?= oldValue('retypePassword') ?>" name="retypePassword" type="password" class="form-control" id="floatingPassword" placeholder="Retype Password">
        <label for="floatingPassword">Retype password</label>
      </div>

      <a href="<?= ROOT ?>/admin/users">
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
          <input value="<?= oldValue('username', $row['username']) ?>" name="username" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
          <label for="floatingInput">Username</label>
        </div>
        <?php if (!empty($errors['username'])) : ?>
          <div class="text-danger"><?= $errors['username'] ?></div>
        <?php endif; ?>

        <div class="form-floating">
          <input value="<?= oldValue('email', $row['email']) ?>" name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <?php if (!empty($errors['email'])) : ?>
          <div class="text-danger"><?= $errors['email'] ?></div>
        <?php endif; ?>

        <div class="form-floating my-3">

          <select name="role" class="form-select">
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
          <label for="floatingInput">Role</label>
        </div>
        <?php if (!empty($errors['role'])) : ?>
          <div class="text-danger"><?= $errors['role'] ?></div>
        <?php endif; ?>
        <div class="form-floating">
          <input value="<?= oldValue('password') ?>" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <?php if (!empty($errors['password'])) : ?>
          <div class="text-danger"><?= $errors['password'] ?></div>
        <?php endif; ?>

        <div class="form-floating">
          <input value="<?= oldValue('retypePassword') ?>" name="retypePassword" type="password" class="form-control" id="floatingPassword" placeholder="Retype Password">
          <label for="floatingPassword">Retype password</label>
        </div>

        <a href="<?= ROOT ?>/admin/users">
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

      <h1 class="h3 mb-3 fw-normal">delete account</h1>
      <?php if (!empty($row)) : ?>
        <?php if (!empty($errors)) : ?>
          <div class="alert alert-danger">Please fix the errors below</div>
        <?php endif; ?>

        <div class="my-2">

          <?php if (!empty($errors['image'])) : ?>
            <div class="text-danger"><?= $errors['image'] ?></div>
          <?php endif; ?>
        </div>
        <div class="form-floating">
          <div class="form-control mb-2"><?= oldValue('username', $row['username']) ?></div>

        </div>
        <?php if (!empty($errors['username'])) : ?>
          <div class="text-danger"><?= $errors['username'] ?></div>
        <?php endif; ?>

        <div class="form-floating">
          <div class="form-control mb-2"><?= oldValue('email', $row['email']) ?></div>

        </div>
        <?php if (!empty($errors['email'])) : ?>
          <div class="text-danger"><?= $errors['email'] ?></div>
        <?php endif; ?>

        <a href="<?= ROOT ?>/admin/users">
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
    Users
    <a href="<?= ROOT ?>/admin/users/add">
      <button class="btn btn-primary">Add New</button>
    </a>
  </h4>

  <div class="table-responsive">
    <table class="table">

      <tr>
        <th>#</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Image</th>
        <th>Date</th>
        <th>Action</th>
      </tr>

      <?php
      $limit = 10;
      $offset = (1 - 1) * $limit;

      $query = "select * from users order by id desc limit $limit offset $offset";
      $rows = query($query);

      ?>
      <?php

      if (!empty($rows)) : ?>
        <?php foreach ($rows as $row) : ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['role'] ?></td>

            <td><?= date("jS M, Y", strtotime($row['date'])) ?></td>
            <td>
              <a href="<?= ROOT ?>/admin/users/edit/<?= $row['id'] ?>">
                <button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
              </a>
              <a href="<?= ROOT ?>/admin/users/delete/<?= $row['id'] ?>">
                <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
              </a>
            </td>
          </tr>

        <?php endforeach; ?>
      <?php endif; ?>
    </table>
  </div>
<?php endif; ?>