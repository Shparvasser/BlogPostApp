<?php

use App\Model\DbConnect;

$savedTitle = $_POST['title'];
$savedMessage = $_POST['content'];
?>

<section class="section__form">
    <div class="form__register">
        <form method="post">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?php echo (isset($savedTitle)) ? $savedTitle : ''; ?>">
            <div style=color:red;><?php echo $errors['title']; ?></div>
            <label for="tag">Tag</label>
            <select name="tag" id="tag">
                <?php
                $dbc = DbConnect::getInstance();
                $results = $dbc->findAll("SELECT * FROM `tags`");
                foreach ($results as $value) {
                    echo "<option value= '{$value['id']}'> {$value['tag']}</option>";
                }
                ?>
            </select>
            <label for="content">Message</label>
            <textarea name="content" id="content"><?php echo (isset($savedMessage)) ? $savedMessage : ''; ?></textarea>
            <div style=color:red;><?php echo $errors['content']; ?></div>
            <button type="submit" name="do_posts">Add Post</button>
        </form>
    </div>
</section>