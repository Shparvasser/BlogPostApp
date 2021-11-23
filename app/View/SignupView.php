<?php
$savedName = $_POST['name'];
$savedSurname = $_POST['surname'];
$savedEmail = $_POST['email'];
$savedPhone = $_POST['phone'];
?>
<main>
    <section class="section__form">
        <div class="form__register">
            <form method="post">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="<?php echo (isset($savedName)) ? $savedName : ''; ?>">
                    <div style="color: red;"><?= $validator->errors["name"]; ?></div>
                </div>
                <div>
                    <label for="surname">Surname:</label>
                    <input type="text" name="surname" id="surname" value="<?php echo (isset($savedSurname)) ? $savedSurname : ''; ?>">
                    <div style="color: red;"><?= $validator->errors["surname"]; ?></div>
                </div>
                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" value="<?php echo (isset($savedEmail)) ? $savedEmail : ''; ?>">
                    <div style="color: red;"><?= $validator->errors["email"]; ?></div>
                </div>
                <div>
                    <label for="phone">Phone:</label>
                    <input type="tel" name="phone" id="phone" value="<?php echo (isset($savedPhone)) ? $savedPhone : ''; ?>">
                    <div style="color: red;"><?= $validator->errors["phone"]; ?></div>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                    <div style="color: red;"><?= $validator->errors["password"]; ?></div>
                </div>
                <div>
                    <label for="password_2">Confirm Password:</label>
                    <input type="password" name="password_2" id="password_2">
                    <div style="color: red;"><?= $validator->errors["password"]; ?></div>
                </div>
                <button type="submit" name="do_register">Register</button>
            </form>
        </div>
    </section>
</main>