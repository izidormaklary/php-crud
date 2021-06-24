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
                    <select name="classId" class="form-select">
                        <?php foreach ($classrooms->getClassrooms() as $c): ?>
                            <option value="<?php echo $c->getId(); ?>"><?php echo $c->getName() . " (teacher: " . $c->getTeacher() . ")"; ?></option>
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
