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
        <form method="post" action="?c=auth&a=deleteAcc">
        <div class="mb-3" style="text-align: center">
            <button type="submit" class="btn btn-danger" name="delete">Zmazať účet!</button>
        </div>
        </form>
    </div>
    <?php } } ?>
</div>
