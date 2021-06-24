<?php require 'View/includes/header.php'; ?>
<form method="post">
    <table class="table">
        <thead>
        <tr class="text-center">
            <th>Name</th>
            <th>Location</th>
            <th>Teacher</th>
            <th></th>
<!--            <th>Students</th>-->
        </tr>
        </thead>
        <tbody>

            <tr>
                <td>
                    <input class="form-control" type="text" name="name" value="<?php echo $selectedClass->getName(); ?>">
                </td>
                <td>
                    <input class="form-control" type="text" name="location" value="<?php echo $selectedClass->getLocation(); ?>"
                </td>
                <td>
                    <select name="teacherId" class="form-select" aria-label=".form-select-lg example">
                        <?php foreach (array_unique($teachers->getTeachers(),SORT_REGULAR) as $t): ?>
                                <option value="<?php echo $t->getId(); ?>"><?php echo $t->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input type="number" name="id" value="<?php echo $selectedClass->getId(); ?>" hidden>
                    <input type="submit" class="btn btn-primary" name="submitClassEdit">
                </td>
            </tr>
        </tbody>
    </table>

</form>
<?php require 'View/includes/footer.php'; ?>
