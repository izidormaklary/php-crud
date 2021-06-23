<?php require 'View/includes/header.php'; ?>
<form method="post">
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Teacher</th>
<!--            <th>Students</th>-->
        </tr>
        </thead>
        <tbdody>

            <tr>
                <td>
                    <input type="text" name="name" value="<?php echo $selectedClass->getName(); ?>">
                </td>
                <td>
                    <input type="text" name="location" value="<?php echo $selectedClass->getLocation(); ?>"
                </td>
                <td>
                    <select name="teacherId">
                        <?php foreach ($teachers->getTeachers() as $t): ?>
                                <option value="<?php echo $t->getId(); ?>"><?php echo $t->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

        </tbdody>
    </table>
    <input type="number" name="id" value="<?php echo $selectedClass->getId(); ?>" hidden>
    <input type="submit" name="submitClassEdit">
</form>
<?php require 'View/includes/footer.php'; ?>
