<?php require 'View/includes/header.php'; ?>
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

                <tr>
                    <td>
                        <?php echo $selectedClass->getName(); ?>
                    </td>
                    <td>
                        <?php echo $selectedClass->getLocation() ; ?>
                    </td>
                    <td>
                        <a href="?teacher=<?php echo $selectedClass->getTeacherId(); ?>"><?php echo $selectedClass->getTeacher(); ?></a>
                    </td>
                    <td>
                        <ul>
                        <?php foreach ($selectedClass->getStudents() as $s): ?>
                        <li>
                            <a href="?student=<?php echo $s['id']; ?>"><?php echo $s['name']; ?></a>
                        </li>
                        <?php endforeach; ?>
                        </ul>
                    </td>
                    <td>
                        <form method="post">
                            <button name="editId" class="btn btn-warning mx-auto d-block w-75" value="<?php echo $selectedClass->getId() ?>">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form method="post">
                            <button name="deleteId" class="btn btn-danger m-auto d-block w-75" value="<?php echo $selectedClass->getId() ?>">Delete</button>
                        </form>
                    </td>
                </tr>

        </tbody>
    </table>
</section>

<?php require 'View/includes/footer.php'; ?>
