<?php
    if(isset($_SESSION['messages'])){
        if(sizeof($_SESSION['messages']) > 0){
            echo '<ul class="messages errors">';
            foreach ($_SESSION['messages'] as $error) {
                echo '<li>'.$error.'</li>';
            }
            echo '</ul>';
        } else {
            echo '<ul class="messages success"><li>Registration successful</li></ul>';
        }
        unset($_SESSION['messages']);
    }
?>