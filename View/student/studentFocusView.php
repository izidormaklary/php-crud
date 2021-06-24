<?php require 'View/includes/header.php'; ?>
<section class="my-5">
    <table class="table table-striped shadow mx-auto">
        <thead class="">
        <tr class="text-center">
            <th>Name</th>
            <th>Email</th>
            <th>Teacher</th>
            <th>Class</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>
                <?php echo $selectedStudent->getName(); ?>
            </td>
            <td>
                <?php echo $selectedStudent->getEmail(); ?>
            </td>
            <td>
                <a href="?teacher=<?php echo $selectedStudent->getTeacherId(); ?>"><?php echo $selectedStudent->getTeacher(); ?></a>
            </td>
            <td>
                <?php if (null !== $selectedStudent->getClassId()): ?>
                    <a href="?class=<?php echo $selectedStudent->getClassId(); ?>"><?php echo $selectedStudent->getClassName(); ?></a>
                <?php endif; ?>
            </td>
            <td>
                <form method="post">
                    <button name="editId" class="btn btn-warning mx-auto d-block w-75"
                            value="<?php echo $selectedStudent->getId() ?>">Edit
                    </button>
                </form>
            </td>
            <td>
                <form method="post">
                    <button name="deleteId" class="btn btn-danger mx-auto d-block w-75"
                            value="<?php echo $selectedStudent->getId() ?>">Delete
                    </button>
                </form>
            </td>
        </tr>

        </tbody>
    </table>
    <form method="post">
        <button name="insert" class="btn btn-primary">Add a new student</button>
    </form>
</section>

<?php require 'View/includes/footer.php'; ?>
