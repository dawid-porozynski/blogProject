<?php if ($action == 'add') : ?>

    <div class="col-md-6 mx-auto">
        <form method="post" enctype="multipart/form-data">

            <h1 class="h3 mb-3 fw-normal">Create Posts</h1>

            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger">Please fix the errors below</div>
            <?php endif; ?>

            <div class="my-2">
                <label class="d-block">

                </label>


            </div>


            <div class="form-floating">
                <input value="<?= oldValue('title') ?>" name="title" type="text" class="form-control mb-2" id="floatingInput" placeholder="title">
                <label for="floatingInput">title</label>
            </div>
            <?php if (!empty($errors['title'])) : ?>
                <div class="text-danger"><?= $errors['title'] ?></div>
            <?php endif; ?>

            <div class="">

                <textarea rows="8" placeholder="post content" id="floatingInput" name="content" type="content"><?= oldValue('content') ?></textarea>


            </div>
            <?php if (!empty($errors['content'])) : ?>
                <div class="text-danger"><?= $errors['content'] ?></div>
            <?php endif; ?>



            <div class="form-floating my-3">
                <select name="category_id" class="form-select">

                    <?php
                    $query = "select * from categories order by id desc ";
                    $categories = query($query);

                    ?>

                    <!--  ktora kategoria wybrana  -->
                    <option value="">---Wybierz---</option>
                    <?php if (!empty($categories)) : ?>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?= $cat['id'] ?>"><?= $cat['category'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <label for="floatingInput">Category</label>
            </div>
            <?php if (!empty($errors['category'])) : ?>
                <div class="text-danger"><?= $errors['category'] ?></div>
            <?php endif; ?>

            <a href="<?= ROOT ?>/admin/posts">
                <button class="mt-4 btn btn-lg btn-primary" type="button">Back</button>
            </a>
            <button class="mt-4 btn btn-lg btn-primary float-end" type="submit">Create</button>

        </form>
    </div>






<?php elseif ($action == 'edit') : ?>
    <div class="col-md-6 mx-auto">
        <form method="post" enctype="multipart/form-data">

            <h1 class="h3 mb-3 fw-normal">edit Posts</h1>
            <?php if (!empty($row)) : ?>
                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">Please fix the errors below</div>
                <?php endif; ?>

                <div class="form-floating">
                    <input value="<?= oldValue('title', $row['title']) ?>" name="title" type="text" class="form-control mb-2" id="floatingInput" placeholder="title">
                    <label for="floatingInput">title</label>
                </div>
                <?php if (!empty($errors['title'])) : ?>
                    <div class="text-danger"><?= $errors['title'] ?></div>
                <?php endif; ?>


                <div class="">

                    <textarea rows="8" placeholder="post content" id="floatingInput" name="content" type="content"><?= oldValue('content') ?></textarea>


                </div>
                <?php if (!empty($errors['content'])) : ?>
                    <div class="text-danger"><?= $errors['content'] ?></div>
                <?php endif; ?>



                <div class="form-floating my-3">
                    <select name="category_id" class="form-select">

                        <?php
                        $query = "select * from categories order by id desc ";
                        $categories = query($query);

                        ?>

                        <!--  ktora kategoria wybrana  -->
                        <option value="">---Wybierz---</option>
                        <?php if (!empty($categories)) : ?>
                            <?php foreach ($categories as $cat) : ?>
                                <option value="<?= $cat['id'] ?>"><?= $cat['category'] ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <label for="floatingInput">Category</label>
                </div>
                <?php if (!empty($errors['category'])) : ?>
                    <div class="text-danger"><?= $errors['category'] ?></div>
                <?php endif; ?>
                <a href="<?= ROOT ?>/admin/posts">
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

            <h1 class="h3 mb-3 fw-normal">delete Posts</h1>
            <?php if (!empty($row)) : ?>
                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">Please fix the errors below</div>
                <?php endif; ?>


                <div class="form-floating">
                    <div class="form-control mb-2"><?= oldValue('title', $row['title']) ?></div>

                </div>
                <?php if (!empty($errors['title'])) : ?>
                    <div class="text-danger"><?= $errors['title'] ?></div>
                <?php endif; ?>

                <div class="form-floating">
                    <div class="form-control mb-2"><?= oldValue('slug', $row['slug']) ?></div>

                </div>
                <?php if (!empty($errors['slug'])) : ?>
                    <div class="text-danger"><?= $errors['slug'] ?></div>
                <?php endif; ?>

                <a href="<?= ROOT ?>/admin/posts">
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
        posts
        <a href="<?= ROOT ?>/admin/posts/add">
            <button class="btn btn-primary">Add New</button>
        </a>
    </h4>

    <div class="table-responsive">
        <table class="table">

            <tr>
                <th>#</th>
                <th>Tytul</th>
                <!-- <th>Slug</th> -->
                <th>Date</th>
                <th>Action</th>
            </tr>

            <?php
            $limit = 10;
            $offset = (1 - 1) * $limit;

            $query = "select * from posts order by id desc limit $limit offset $offset";
            $rows = query($query);

            ?>
            <?php

            if (!empty($rows)) : ?>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <!-- <td><?= $row['slug'] ?></td> -->


                        <td><?= date("jS M, Y", strtotime($row['date'])) ?></td>
                        <td>
                            <a href="<?= ROOT ?>/admin/posts/edit/<?= $row['id'] ?>">
                                <button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= ROOT ?>/admin/posts/delete/<?= $row['id'] ?>">
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
<?php endif; ?>