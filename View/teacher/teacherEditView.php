<?php require 'View/includes/header.php'; ?>

<section class="my-5">
    <table class="table table-striped shadow mx-auto">
        <thead>
        <tr class="text-center">
            <th>Name</th>
            <th>Email</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbdody>
            <form method="post">
                <tr>
                    <td>
                        <input class="form-control" type="text" name="name"
                               value="<?php echo $selectedTeacher->getName(); ?>">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="email"
                               value="<?php echo $selectedTeacher->getEmail(); ?>"
                    </td>
                    <td>
                        <input type="number" name="id" value="<?php echo $selectedTeacher->getId(); ?>" hidden>
                        <input type="submit" class="btn btn-primary" name="submitTeacherEdit">
                    </td>
                </tr>
            </form>
        </tbdody>
    </table>
</section>

<?php require 'View/includes/footer.php'; ?>
