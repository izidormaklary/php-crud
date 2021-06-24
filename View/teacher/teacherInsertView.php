<?php require 'View/includes/header.php'; ?>

<section class="my-5">
    <table class="table table-striped shadow mx-auto">
        <thead>
        <tr class="text-center">
            <th>Name</th>
            <th>Email</th>
            <th>Teacher</th>
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
                    <!--                <td>-->
                    <!--                    <select name="teacherId" class="form-select">-->
                    <!--                        --><?php //foreach ($teachers->getTeachers() as $t): ?>
                    <!--                            <option value="--><?php //echo $t->getId(); ?><!--">-->
                    <?php //echo $t->getName() . " (class: " . $t->getClassName() . ")"; ?><!--</option>-->
                    <!--                        --><?php //endforeach; ?>
                    <!--                    </select>-->
                    <!--                </td>-->
                    <td>
                        <input type="submit" class="btn btn-primary" name="insertNewTeacher">
                    </td>
                </tr>
            </form>
        </tbdody>
    </table>
</section>


<?php require 'View/includes/footer.php'; ?>
