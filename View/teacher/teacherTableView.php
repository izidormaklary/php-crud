<?php require 'View/includes/header.php'; ?>
<section>
    <table class="table table-striped">
        <thead class="">
        <tr class="text-center">
            <th>Name</th>
            <th>Email</th>
            <th>Students</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($teacherObj as $t): ?>
            <tr>
                <td>
                    <?php echo $t->getName(); ?>
                </td>
                <td>
                    <?php echo $t->getEmail(); ?>
                </td>
                <td>
                    <ul>
                        <?php if (!empty($t->getStudents())): ?>
                            <?php foreach ($t->getStudents() as $student): ?>
                                <li>
                                    <a href="?student=<?php echo $student['id']; ?>"><?php echo $student['name']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </td>
                <td>
                    <form method="post">
                        <button name="editId" class="btn btn-warning mx-auto d-block w-75"
                                value="<?php echo $t->getId() ?>">Edit
                        </button>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <button name="deleteId" class="btn btn-danger mx-auto d-block w-75"
                                value="<?php echo $t->getId() ?>">Delete
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <form method="post">
        <button name="insert" class="btn btn-primary">Add a new teacher</button>
    </form>
</section>

<?php require 'View/includes/footer.php'; ?>
