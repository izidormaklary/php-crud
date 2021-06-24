<?php require 'View/includes/header.php'; ?>
<section>
    <table class="table table-striped">
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
                        <ul>
                        <?php foreach ($c->getStudents() as $s): ?>
                        <li>
                            <a href="?student=<?php echo $s['id']; ?>"><?php echo $s['name']; ?></a>
                        </li>
                        <?php endforeach; ?>
                        </ul>
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
    <form method="post">
        <button name="insert" class="btn btn-primary">Create a new Class</button>
    </form>
</section>

<?php require 'View/includes/footer.php'; ?>
