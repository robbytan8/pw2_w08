<?php
include_once './dao/BookDaoImpl.php';
include_once './dao/CategoryDaoImpl.php';
include_once './dao/UserDaoImpl.php';
include_once './entity/Book.php';
include_once './entity/Category.php';
include_once './entity/Role.php';
include_once './entity/User.php';
include_once './db_function/db_function.php';
include_once './util/PDOUtil.php';
include_once './util/utility.php';
session_start();
if (!isset($_SESSION['approved_user'])) {
    $_SESSION['approved_user'] = FALSE;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Object Oriented PHP</title>
        <link rel="stylesheet" type="text/css" href="css/datatables.css">
        <link rel="stylesheet" type="text/css" href="css/web_style.css">
        <script type="text/javascript" src="js/functional_js.js"></script>
        <script type="text/javascript" src="js/datatables.js"></script>
    </head>
    <body>
        <!--Tag for header-->
        <header>
            <h1>Pemrograman Web 2</h1>
        </header>
        <?php
        if ($_SESSION['approved_user']) {
            ?>
            <!--Tag for navigation-->
            <nav>
                <ul>
                    <li><a href="?navito=home">Home</a></li>
                    <li><a href="?navito=category">Category</a></li>
                    <li><a href="?navito=book">Book</a></li>
                    <li><a href="?navito=logout">Logout</a></li>
                </ul>
            </nav>
            <!--Tag for content-->
            <main>
                <?php
                $nav = filter_input(INPUT_GET, "navito");
                switch ($nav) {
                    case 'home':
                        include_once './view_home.php';
                        break;
                    case 'category':
                        include_once './view_category.php';
                        break;
                    case 'ucategory':
                        include_once './view_category_update.php';
                        break;
                    case 'book':
                        include_once './view_book.php';
                        break;
                    case 'logout':
                        $_SESSION['approved_user'] = FALSE;
                        $_SESSION['user_name'] = '';
                        $_SESSION['role'] = '';
                        session_unset();
                        header('location:index.php');
                        break;
                    default:
                        include_once './view_home.php';
                        break;
                }
                ?>
            </main>
            <?php
        } else {
            include_once './view_login.php';
        }
        ?>
        <!--Tag for footer-->
        <footer>
            Created by Robby Tan
        </footer>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#tableId').DataTable();
            });
        </script>
    </body>
</html>
