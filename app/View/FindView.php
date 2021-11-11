<?php

use App\Model\User;

?>
<div>
    <form method="post">
        <label for="search">Search</label>
        <select name="tag" id="tag">
            <?php
            foreach ($tags as $tag) {
                echo "<option value= '{$tag['id']}'> {$tag['tag']}</option>";
            }
            ?>
        </select>
        <button name="do_search" id="do_search" type="submit">Search</button>
    </form>
</div>

<main>
    <?php
    $search = $_POST['tag'];
    if (($rows) == NULL) {
        $errors = 'Dont have posts this name'; ?>
        <div style="color: red;"><?= $errors ?></div>
        <?php    } else {
        foreach ($rows as $row) {
            $author = (int)$row['author_id'];
            $value = 'users_id';
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
    <?php } ?>
    <div>
        <table>
            <tr>
                <th>TAG</th>
            </tr>
            <?php
            foreach ($postsTags as $postTag) {
            ?>
                <tr>
                    <td><?php echo $postTag['tag']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</main>