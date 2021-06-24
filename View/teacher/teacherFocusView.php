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

        <tr>
            <td>
                <?php echo $selectedTeacher->getName(); ?>
            </td>
            <td>
                <?php echo $selectedTeacher->getEmail(); ?>
            </td>
            <td>

                <?php if (!empty($selectedTeacher->getStudents())): ?>
                <ul>
                    <?php foreach ($selectedTeacher->getStudents() as $student): ?>
                        <li>
                            <a href="?student=<?php echo $student['id']; ?>"><?php echo $student['name']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </td>
            <td>
                <button name="deleteId" class="btn btn-danger mx-auto d-block w-75"
                        value="<?php echo $selectedTeacher->getId() ?>" disabled>Delete
                </button>

                <?php else: ?>
                <p> no students</p>
            </td>
            <td>
                <form method="post">
                    <button name="deleteId" class="btn btn-danger mx-auto d-block w-75"
                            value="<?php echo $selectedTeacher->getId() ?>">Delete
                    </button>
                </form>
            </td>
            <?php endif; ?>

        </tr>
        </tbody>
    </table>
</section>

<?php require 'View/includes/footer.php'; ?>
