<?php require 'View/includes/header.php'; ?>
<section class="my-5">
    <table class="table table-striped shadow mx-auto">
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
                         <?php echo count($t->getStudents()) ?>
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
