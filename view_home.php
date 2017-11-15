<?php

if ($_SESSION['approved_user'] && isset($_SESSION['user_name'])) {
    echo 'Welcome, ' . $_SESSION['user_name'];
} else {
    echo 'Welcome, Guest';
}
