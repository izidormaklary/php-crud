<?php require 'View/includes/header.php'; ?>
<form method="post">
    <table class="table">
        <thead>
        <tr class="text-center">
            <th>Name</th>
            <th>Email</th>
<!--            <th>Students</th>-->
        </tr>
        </thead>
        <tbdody>

            <tr >
                <td>
                    <input class="form-control" type="text" name="name" value="<?php echo $selectedTeacher->getName(); ?>">
                </td>
                <td>
                    <input class="form-control" type="text" name="email" value="<?php echo $selectedTeacher->getEmail(); ?>"
                </td>
                <td>
                    <input type="number" name="id" value="<?php echo $selectedTeacher->getId(); ?>" hidden>
                    <input type="submit" class="btn btn-primary" name="submitTeacherEdit">
                </td>
            </tr>
        </tbdody>
    </table>

</form>
<?php require 'View/includes/footer.php'; ?>
