<?php require 'View/includes/header.php'; ?>
<div class="col-lg-7 offset-lg-2 mx-auto my-2">
    <form method="post" class="text-center">
        <button name="insert" class="btn btn-primary mx-auto">Add a new student</button>
    </form>
</div>
</div>
<div class="row">
    <section class="my-5">
        <table class="table table-striped shadow mx-auto">
            <thead class="">
            <tr class="text-center">
                <th>Name</th>
                <th>Email</th>
                <th>Class</th>
                <th colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($studentObj as $s): ?>
                <tr>
                    <td>
                        <?php echo $s->getName(); ?>
                    </td>
                    <td>
                        <?php echo $s->getEmail(); ?>
                    </td>
                    <td>
                        <?php if (null !== $s->getClassId()): ?>
                            <a href="?class=<?php echo $s->getClassId(); ?>"><?php echo $s->getClassName(); ?></a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form method="post">
                            <button name="editId" class="btn btn-warning mx-auto d-block w-75"
                                    value="<?php echo $s->getId() ?>">Edit
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="post">
                            <button name="deleteId" class="btn btn-danger mx-auto d-block w-75"
                                    value="<?php echo $s->getId() ?>">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </section>

    <?php require 'View/includes/footer.php'; ?>
