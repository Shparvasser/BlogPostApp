<?php

use App\Model\User;

?>
<main>
    <?php
    $value = 'users_id';
    foreach ($rows as $row) {
        $author = (int)$row['author_id'];
        $users = User::getById($author, $value);
    ?>
        <div class="body">
            <div class="body__message message">
                <h2 class="message__title"><?php echo $row['title'] ?></h2>
                <p class="message__text"><?php echo $row['content'] ?></p>
                <?php foreach ($users as $user) { ?>
                    <div> <?php echo $user['name']; ?></div>
                    <div> <?php echo $user['surname']; ?></div>
                <?php } ?>
                <div><?php echo $row['date'] ?></div>
            </div>
        </div>
    <?php } ?>

</main>