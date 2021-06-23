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
                    <input type="text" name="name">
                </td>
                <td>
                    <input type="text" name="location" >
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
    <input type="submit" name="insertNewClass">
</form>
<?php require 'View/includes/footer.php'; ?>
