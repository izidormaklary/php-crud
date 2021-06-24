<?php require 'View/includes/header.php'; ?>
<form method="post">
    <table class="table">
        <thead>
        <tr class="text-center">
            <th>Name</th>
            <th>Email</th>
            <th>Teacher</th>
            <th></th>
        </tr>
        </thead>
        <tbdody>

            <tr>
                <td>
                    <input type="text" class="form-control" name="name">
                </td>
                <td>
                    <input type="text" class="form-control" name="email">
                </td>
                <td>
                    <select name="teacherId" class="form-select">
                        <?php foreach ($teachers->getTeachers() as $t): ?>
                            <option value="<?php echo $t->getId(); ?>"><?php echo $t->getName() . " (class: " . $t->getClassName() . ")"; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input type="submit" class="btn btn-primary" name="insertNewStudent">
                </td>
            </tr>
        </tbdody>
    </table>

</form>
<?php require 'View/includes/footer.php'; ?>
