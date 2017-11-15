<?php
$categoryDao = new CategoryDaoImpl();

$command = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_SPECIAL_CHARS);
if (isset($command) && $command == 'rem') {
    $id = filter_input(INPUT_GET, 'tod', FILTER_SANITIZE_SPECIAL_CHARS);
    $toBeDeletedCategory = new Category();
    $toBeDeletedCategory->setId($id);
    $categoryDao->deleteCategory($toBeDeletedCategory);
}

$submitPressed = filter_input(INPUT_POST, "btnSubmit");
if (isset($submitPressed)) {
    $name = filter_input(INPUT_POST, "txtCatName", FILTER_SANITIZE_SPECIAL_CHARS);
    $newCategory = new Category();
    $newCategory->setName($name);
    $categoryDao->addNewCategory($newCategory);
}
?>

<form action="" method="post">
    <fieldset>
        <legend>Category Form</legend>
        <label for="idTxtCatName">Category name</label>
        <input id="idTxtCatName" name="txtCatName" type="text" autofocus="" placeholder="New Category Name" required="">
        <br>
        <input type="submit" name="btnSubmit" value="Submit Data" class="button button-primary">
        <input type="reset" value="Reset Form" class="button">
    </fieldset>
</form>

<table id="tableId" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $categoryDao->getAllCategories();
        /* @var $category Category */
        foreach ($result as $category) {
            echo '<tr>';
            echo '<td>' . $category->getId() . '</td>';
            echo '<td>' . $category->getName() . '</td>';
            echo '<td>' . '<button onclick="sendToUpdate(\'' . $category->getId() . '\');"><img src="images/row_edit.png" alt="Update Image"></button>'
            . ' '
            . '<button onclick="sendToDelete(\'' . $category->getId() . '\');"><img src="images/row_delete.png" alt="Delete Image"></button>' . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>