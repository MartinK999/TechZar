<?php /** @var Array $data $data */ ?>


<div class="row ">
    <?php foreach ($data['users'] as $user) {
    if ($user->getId() == $_SESSION['id']) { ?>
    <div class="col mt-110">

        <?php if ($data['error'] != "") { ?>
            <div class="alert alert-danger alert-dismissible" style="text-align: center">

                <?= $data['error'] ?>
            </div>
        <?php } ?>
        <div class="container ">
            <div class="row mb-3">
                <h3><strong>Môj účet: </strong></h3>
            </div>

            <div class="col-sm-6 col-6" style="float: left">
                <hr class="solid"/>
                <div class="form-group">
                    <label for="login">Prihlasovacie meno: </label>
                </div>
                <hr class="solid"/>

                <div class="form-group">
                    <label for="fullname">Meno: </label>
                </div>
                <hr class="solid"/>

                <div class="form-group">
                    <label for="email">Email: </label>
                </div>
                <hr class="solid"/>

            </div>
            <div class="col-sm-6 col-6" style="float: left">
                <hr class="solid"/>
                <div>
                    <label for="login"> <?= $user->getLogin() ?></label>
                </div>
                <hr class="solid"/>
                <div>
                    <label for="login"> <?= $user->getFullname() ?></label>
                </div>
                <hr class="solid"/>
                <div>
                    <label for="login"> <?= $user->getEmail() ?></label>
                </div>
                <hr class="solid"/>
            </div>
            <div class="col-lg-2 col-md-3 col-6" style="float: right">
                <form method="post" action="?c=profile&a=updateProfile">
                    <input type="hidden" name="login" value="<?= $user->getLogin() ?>">
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary"><strong> Upraviť účet </strong></button>
                    </div>
                </form>


            </div>
            <div class="col-lg-2 col-md-3 col-6" style="float: right">

            <form method="post" action="?c=profile&a=deleteProfile">
                <input type="hidden" name="id" value="<?= $user->getId() ?>">
                <div style="text-align: center">
                    <button type="submit" class="btn btn-danger" data-d-smiss="alert"  onclick="return confirm('Ste si istý že chcete vymazať váš účet?');"><strong>Vymazať účet!</strong>
                    </button>
                </div>
            </form>




            </div>
        </div>

    </div>
</div>
<?php }
} ?>


<!-- https://getbootstrap.com/docs/5.0/components/modal/#options -->

