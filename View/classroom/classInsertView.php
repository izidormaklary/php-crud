<?php require 'View/includes/header.php'; ?>

<section class="my-5">
    <table class="table table-striped shadow mx-auto">
        <thead>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Teacher</th>
            <!--            <th>Students</th>-->
        </tr>
        </thead>
        <tbdody>
            <form method="post">
                <tr>
                    <td>
                        <input type="text" class="form-control" name="name">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="location">
                    </td>
                    <td>
                        <select class="form-select" name="teacherId">
                            <?php foreach ($teachers->getTeachers() as $t): ?>
                                <option value="<?php echo $t->getId(); ?>"><?php echo $t->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" class="btn btn-primary" name="insertNewClass">
                    </td>
                </tr>
            </form>
        </tbdody>
    </table>
</section>

<?php require 'View/includes/footer.php'; ?>
