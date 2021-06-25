<?php require 'View/includes/header.php'; ?>
<div class="col-lg-7 offset-lg-2 mx-auto my-2">
    <form method="post" class="text-center">
        <button name="insert" class="btn btn-primary">Create a new Class</button>
    </form>
</div>
</div>
<div class="row">
<section class="my-5">
    <table class="table table-striped shadow mx-auto">
        <thead class="">
        <tr class="text-center">
            <th>Name</th>
            <th>Location</th>
            <th>Teacher</th>
            <th>Students</th>
            <th colspan="2" ></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($classObj as $c): ?>
                <tr>
                    <td>
                        <?php echo $c->getName(); ?>
                    </td>
                    <td>
                        <?php echo $c->getLocation() ; ?>
                    </td>
                    <td>
                        <a href="?teacher=<?php echo $c->getTeacherId(); ?>"><?php echo $c->getTeacher(); ?></a>
                    </td>

                    <td>
                        <?php if (!empty($c->getStudents())): ?>
                            <?php echo count($c->getStudents()) ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form method="post">
                            <button name="editId" class="btn btn-warning mx-auto d-block w-75" value="<?php echo $c->getId() ?>">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form method="post">
                            <button name="deleteId" class="btn btn-danger m-auto d-block w-75" value="<?php echo $c->getId() ?>">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>


<?php require 'View/includes/footer.php'; ?>
