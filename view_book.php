<?php
$categoryDao = new CategoryDaoImpl();
$bookDao = new BookDaoImpl();

$submitPressed = filter_input(INPUT_POST, "btnSubmit");
if ($submitPressed) {
    //  Get field data from form (POST)
    $isbn = filter_input(INPUT_POST, "txtIsbn");
    $title = filter_input(INPUT_POST, "txtTitle");
    $author = filter_input(INPUT_POST, "txtAuthor");
    $publisher = filter_input(INPUT_POST, "txtPublisher");
    $year = filter_input(INPUT_POST, "txtYear");
    $categoryId = filter_input(INPUT_POST, "selCategory");

    //  Creating object to be inserted into database
    $category = new Category();
    $category->setId($categoryId);

    $book = new Book();
    $book->setAuthor($author);
    $book->setCategory($category);
    $book->setIsbn($isbn);
    $book->setPublish_year($year);
    $book->setPublisher($publisher);
    $book->setTitle($title);
    //  Get file cover data
    if (isset($_FILES['fileCover']['name']) && !empty($_FILES['fileCover']['name'])) {
        $allowedTypes = array(IMAGETYPE_JPEG);
        $targetDirectory = 'uploads/';
        $fileExtension = pathinfo($_FILES['fileCover']['name'],
                PATHINFO_EXTENSION);
        $fileType = exif_imagetype($_FILES['fileCover']['tmp_name']);
        $targetFile = $targetDirectory . $isbn . '.' . $fileExtension;
        if (in_array($fileType, $allowedTypes)) {
            $book->setCover($targetFile);
            move_uploaded_file($_FILES['fileCover']['tmp_name'], $targetFile);
            $bookDao->addNewBookWithCover($book);
        }
    } else {
        $bookDao->addNewBook($book);
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Book Form</legend>
        <label for="idTxtIsbn">ISBN</label>
        <input id="idTxtIsbn" name="txtIsbn" type="text" autofocus="" placeholder="ISBN" required="" maxlength="13" />
        <br>
        <label for="idTxtTitle">Title</label>
        <input id="idTxtTitle" name="txtTitle" type="text" placeholder="Title" required="" />
        <br>
        <label for="idTxtAuthor">Author</label>
        <input id="idTxtAuthor" name="txtAuthor" type="text" placeholder="Author" required="" />
        <br>
        <label for="idTxtPublisher">Publisher</label>
        <input id="idTxtPublisher" name="txtPublisher" type="text" placeholder="Publisher" required="" />
        <br>
        <label for="idTxtPublishYear">Publish Year</label>
        <input id="idTxtPublishYear" name="txtYear" type="text" placeholder="Publish Year" required="" />
        <br>
        <label for="fileCoverId">Cover</label>
        <input type="file" id="fileCoverId" name="fileCover" accept="image/jpeg, image/jpg" />
        <br>
        <label for="idSelCategory">Category</label>
        <select id="idSelCategory" name="selCategory">
            <?php
            $categories = $categoryDao->getAllCategories();
            /* @var $category Category */
            foreach ($categories as $category) {
                echo '<option value="' . $category->getId() . '">' . $category->getName() . '</value>';
            }
            ?>
        </select>
        <br>
        <input type="submit" name="btnSubmit" value="Submit Data" />
    </fieldset>
</form>

<table id="tableId" class="display">
    <thead>
        <tr>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publish Year</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $books = $bookDao->getAllBooks();
        /* @var $book Book */
        foreach ($books as $book) {
            echo '<tr>';
            echo '<td>';
            if (!empty($book->getCover())) {
                echo '<img src="' . $book->getCover() . '" alt="cover" style="max-width:120px" /> <br>';
                echo $book->getIsbn();
            } else {
                echo $book->getIsbn();
            }
            echo '</td>';
            echo '<td>' . $book->getTitle() . '</td>';
            echo '<td>' . $book->getAuthor() . '</td>';
            echo '<td>' . $book->getPublish_year() . '</td>';
            echo '<td>' . $book->getCategory()->getName() . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>