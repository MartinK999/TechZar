<?php /** @var Array $data */ ?>
<div class="row justify-content-sm-center">
    <?php foreach ($data['users'] as $user){ if ($user->getLogin() == $data['login']){?>
        <div class="col-sm-6">
            <div class="container">
                <div class="row mb-3">
                    <h3><strong>Upraviť účet: </strong></h3>
                </div>
                <form method="post" enctype="multipart/form-data" action="?c=auth&a=makeUpdateProfile">
                    <div>
                        <div class="form-group">
                            <label for="login">Prezívka :</label>
                            <input type = "text" name="login" class="form-control" id="login" value="<?= $user->getLogin()?>" required>
                        </div>
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

                        <div class="mb-3 updateProfile">
                            <input type="hidden" name="id" value="<?= $user->getId() ?>">
                            <button type="submit" class="btn btn-primary"  id="submit" onclick="return confirm('Ste si istý že chcete upraviť váš účet?');">Upraviť</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php } } ?>
</div>