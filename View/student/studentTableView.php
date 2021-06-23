<?php require 'View/includes/header.php'; ?>
<section>
    <table class="table table-striped">
        <thead class="">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Teacher</th>
            <th>Class</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($studentObj as $s): ?>
                <tr>
                    <td>
                        <?php echo $s->getName(); ?>
                    </td>
                    <td>
                        <?php echo $s->getEmail() ; ?>
                    </td>
                    <td>
                        <a href="?teacher=<?php echo $s->getTeacherId(); ?>"><?php echo $s->getTeacher(); ?></a>
                    </td>
                    <td>
                        <?php if(null !==$s->getClassId()):?>
                        <a href="?class=<?php echo $s->getClassId(); ?>"><?php echo $s->getClassName(); ?></a>
                        <?php endif; ?>
                    </td>
<!--                    <td>-->
<!--                        <ul>-->
<!--                        --><?php //foreach ($s->getStudents() as $s): ?>
<!--                        <li>-->
<!--                            <a href="?student=--><?php //echo $s['id']; ?><!--">--><?php //echo $s['name']; ?><!--</a>-->
<!--                        </li>-->
<!--                        --><?php //endforeach; ?>
<!--                        </ul>-->
<!--                    </td>-->
                    <td>
                        <form method="post">
                            <button name="editId" class="btn btn-warning" value="<?php echo $s->getId() ?>">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form method="post">
                            <button name="deleteId" class="btn btn-danger" value="<?php echo $s->getId() ?>">Delete</button>
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
