<?php

/**
 * Description of Book
 *
 * @author Robby
 */
class Book {

    private $isbn;
    private $title;
    private $author;
    private $publisher;
    private $publish_year;
    private $cover;
    private $category;

    public function __construct() {
        $this->category = new Category();
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPublisher() {
        return $this->publisher;
    }

    public function getPublish_year() {
        return $this->publish_year;
    }

    public function getCover() {
        return $this->cover;
    }

    /**
     *
     * @return Category
     */
    public function getCategory() {
        return $this->category;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setPublisher($publisher) {
        $this->publisher = $publisher;
    }

    public function setPublish_year($publish_year) {
        $this->publish_year = $publish_year;
    }

    public function setCover($cover) {
        $this->cover = $cover;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function __set($name, $value) {
        if (!isset($this->category)) {
            $this->category = new Category();
        }
        if (isset($value)) {
            switch ($name) {
                case 'id':
                    $this->category->setId($value);
                    break;
                case 'name':
                    $this->category->setName($value);
                    break;
                default:
                    break;
            }
        }
    }

}
