<main>
    <div>
        <center>
            <h1>Welcome to our website!</h1>
        </center>
    </div>
    <?php

    if (isset($_SESSION['logged_user'])) : ?>
        <?php

        $result = $_SESSION['logged_user'];
        echo "Hello, ";
        echo $result['name'] . ",";
        echo $result['email'] . "<br>";
        ?>
        <a href="/posts/create">Create Posts</a><br>
        <a href="/form/logout">Logout</a>
    <?php else : ?>
        <a href="/form/login">Login</a><br>
        <a href="/form/doRegister">Registration</a>
    <?php endif; ?>

    <?php
    foreach ($rows as $row) { ?>
        <div class="body">
            <div class="body__message message">
                <h5 class="message__title"><?php echo $row['title'] ?></h5>
                <p class="message__text"><?php
                                            if (mb_strlen($row['content']) < 150) {

                                                echo $row['content'];
                                            } else {
                                                $str = substr($row['content'], 0, 150);
                                                echo $str . "...";
                                            } ?> </p>
                <a class="message__link" href="app/View/PostsView.php?id=<?php echo $row['id']; ?>">Read More</a>
            </div>
        </div>
    <?php } ?>
</main>