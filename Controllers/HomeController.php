<?php
    namespace Controllers;
    class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH.'navbar.php');
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."index.php");
            require_once(VIEWS_PATH."footer.php");
        }
    }
?>
