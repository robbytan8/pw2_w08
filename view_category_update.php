<?php
$command = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_SPECIAL_CHARS);
if (isset($command) && $command == 'udt') {
    $id = filter_input(INPUT_GET, 'tod', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoryData = getCategoryFromDb($id);
}

$submitUpdate = filter_input(INPUT_POST, 'btnUpdate');
if (isset($submitUpdate)) {
    $newName = filter_input(INPUT_POST, 'txtCatName');
    updateCategory($categoryData['id'], $newName);
    header("location:index.php?navito=category");
}
?>

<form action="" method="post">
    <fieldset>
        <legend>Update Category Data</legend>
        <label for="idTxtCatName">Category name</label>
        <input id="idTxtCatName" name="txtCatName" type="text" autofocus="" placeholder="Category Name" required="" value="<?php echo $categoryData['name']; ?>">
        <br>
        <input type="submit" name="btnUpdate" value="Update Data" class="button button-primary">
    </fieldset>
</form>