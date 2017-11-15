<?php

/**
 * Description of BookDaoImpl
 *
 * @author Robby
 */
class BookDaoImpl {

    public function getAllBooks() {
        $link = PDOUtil::createPDOConnection();
        $query = "SELECT * FROM book b JOIN category c ON c.id = b.category_id";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Book');
        PDOUtil::closePDOConnection($link);
        return $result;
    }

    public function addNewBook(Book $book) {
        $link = PDOUtil::createPDOConnection();
        $query = "INSERT INTO book(isbn, title, author, publisher, publish_year, cover, category_id) VALUES(?,?,?,?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $book->getIsbn(), PDO::PARAM_STR);
        $stmt->bindValue(2, $book->getTitle(), PDO::PARAM_STR);
        $stmt->bindValue(3, $book->getAuthor(), PDO::PARAM_STR);
        $stmt->bindValue(4, $book->getPublisher(), PDO::PARAM_STR);
        $stmt->bindValue(5, $book->getPublish_year(), PDO::PARAM_STR);
        $stmt->bindValue(6, $book->getCover(), PDO::PARAM_STR);
        $stmt->bindValue(7, $book->getCategory()->getId(), PDO::PARAM_INT);
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }

}
