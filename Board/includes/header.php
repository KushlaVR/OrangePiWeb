<?php

/**
 * header short summary.
 *
 * header description.
 *
 * @version 1.0
 * @author Віталік
 */
?>



<h3>Привіт</h3>
<img src="./img/my.jpg" class="img-circle" alt="Bird" width="300" height="300" />
<h3>Я розробник</h3>
<br />
<h4>
    <?php
    if ($username == ""){
        echo '<a href="./login.php" class="btn btn-lg btn-light">Авторизуватись</a>';
    } else
    {
        echo '<a href="./login.php?user=exit" class="btn btn-lg btn-light">Вийти</a>';
    }
    ?>
</h4>
