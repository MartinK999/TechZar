<?php /** @var Array $data $data */ ?>

<div class="row">
    <?php foreach ($data['users'] as $user) {
        if ($user->getLogin() == $_SESSION['name']) { ?>
    <div class="col">
        <div class="container">

                <div>
                    <div class="form-group">
                        <label for="login">Prihlasovacie meno : <?= $user->getLogin() ?></label>


                    </div>

                    <div class="form-group">
                        <label for="fullname">Meno : <?= $user->getFullname() ?></label>

                    </div>
                    <div class="form-group">
                        <label for="email">Email : <?= $user->getEmail() ?></label>

                    </div>



                </div>

        </div>


    </div>
    <?php } } ?>
</div>
