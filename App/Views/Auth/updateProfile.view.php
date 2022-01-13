<?php /** @var Array $data */ ?>
<div class="row">
    <?php foreach ($data['users'] as $user){ if ($user->getLogin() == $data['login']){?>
        <div class="col">
            <div class="container">
                <form method="post" enctype="multipart/form-data" action="?c=auth&a=makeUpdateProfile">
                    <div>
                        <div class="form-group">
                            <label for="fullname">Meno :</label>
                            <input type = "text" name="fullname" class="form-control" id="fullname" value="<?= $user->getFullname()?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type = "text" name="email" class="form-control"  id="email" value="<?= $user->getEmail()?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Heslo :</label>
                            <input type = "text" name="password" class="form-control" id="password" value="<?= $user->getPassword()?>" required>
                        </div>

                        <div id="submit-info">
                            Formulár obsahuje chyby a nie je možné ho odoslať.
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary"  id="submit">Upraviť</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php } } ?>
</div>