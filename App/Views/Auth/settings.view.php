<?php /** @var Array $data $data */ ?>

<div class="row">
    <?php foreach ($data['users'] as $user) {
        if ($user->getLogin() == $_SESSION['name']) { ?>
    <div class="col">
        <div class="container">

                <div>
                    <div class="form-group">
                        <label for="login">Prihlasovacie meno: <?= $user->getLogin() ?></label>


                    </div>

                    <div class="form-group">
                        <label for="fullname">Meno: <?= $user->getFullname() ?></label>

                    </div>
                    <div class="form-group">
                        <label for="email">Email: <?= $user->getEmail() ?></label>

                    </div>
                    <form method="post" action="?c=auth&a=updateProfile">
                        <input type="hidden" name="login" value="<?= $user->getLogin() ?>">
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-primary"><strong> Upraviť profil </strong></button>

                        </div>

                    </form>
                    <form method="post" action="?c=auth&a=deleteProfile">
                        <input type="hidden" name="login" value="<?= $user->getLogin() ?>">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="submit" class="btn-close" data-dismiss="alert" ></button>
                            <strong>Vymazať účet!</strong>
                        </div>
                    </form>


                </div>

        </div>


    </div>
    <?php } } ?>
</div>
