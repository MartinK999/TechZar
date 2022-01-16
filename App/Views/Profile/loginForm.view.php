<?php /** @var Array $data */ ?>
<script src="public/skriptLogin.js"></script>
<html lang="sk">

<div class="container login">
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <?php if ($data['error'] != "") { ?>
                    <div class="alert alert-danger alert-dismissible" style="text-align: center">

                        <?= $data['error'] ?>
                    </div>
                <?php } ?>
                <div class="card bg-dark text-white" style="border-radius: 15px;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Prihlásenie</h2>
                            <p class="text-white-50 mb-5">Prosím vložte svoje prihlasovacie meno a heslo!</p>

                            <form method="post" action="?c=profile&a=login">

                            <div class="form-outline form-white mb-4">
                                <input type="login" id="login" class="form-control" name="login" required>
                                <label class="form-label" for="login">Prihlasovacie meno</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="password" class="form-control" name="password"  required>
                                <label class="form-label" for="password">Heslo</label>
                            </div>

                            <button id="submit" class="btn btn-outline-light btn-lg px-5" type="submit">Prihlasiť</button>

                            </form>
                        </div>

                        <div>
                            <p class="mb-0">Nemáte ešte vytvorený účet? <a href="?c=Auth&a=registrationForm" class="text-white-50 fw-bold">Zaregistrovať</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>