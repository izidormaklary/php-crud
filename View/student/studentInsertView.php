<?php require 'View/includes/header.php'; ?>

<section class="my-5">
    <table class="table table-striped shadow mx-auto">
        <thead>
        <tr class="text-center">
            <th>Name</th>
            <th>Email</th>
            <th>Class</th>
            <th></th>
        </tr>
        </thead>
        <tbdody>
            <form method="post">
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
        </form>
    </table>
</section>

<?php require 'View/includes/footer.php'; ?>
