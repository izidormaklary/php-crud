<?php require 'View/includes/header.php'; ?>
<form method="post">
    <table class="table">
        <thead>
        <tr class="text-center">
            <th>Name</th>
            <th>Email</th>
            <th>Teacher</th>
            <th></th>
<!--            <th>Students</th>-->
        </tr>
        </thead>
        <tbdody>

            <tr >
                <td>
                    <input class="form-control" type="text" name="name" value="<?php echo $selectedStudent->getName(); ?>">
                </td>
                <td>
                    <input class="form-control" type="text" name="email" value="<?php echo $selectedStudent->getEmail(); ?>"
                </td>
                <td>
                    <select name="classId" class="form-select">
                        <?php foreach ($classrooms->getClassrooms() as $c): ?>
                            <option value="<?php echo $c->getId(); ?>"><?php echo $c->getName() . " (teacher: " . $c->getTeacher() . ")"; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input type="number" name="id" value="<?php echo $selectedStudent->getId(); ?>" hidden>
                    <input type="submit" class="btn btn-primary" name="submitStudentEdit">
                </td>
            </tr>

        </tbdody>
    </table>

</form>
<?php require 'View/includes/footer.php'; ?>
