<?php /** @var Array $data */ ?>
<div class="container login">
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <?php if ($data['error'] != "") { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-dismiss="alert" ></button>
                        <?= $data['error'] ?>
                    </div>
                <?php } ?>
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Prihlásenie</h2>
                            <p class="text-white-50 mb-5">Prosím vložte svoj Email a heslo!</p>

                            <form method="post" action="?c=auth&a=login">

                            <div class="form-outline form-white mb-4">
                                <input type="login" id="typeLoginX" class="form-control" name="login" oninvalid="setCustomValidity('Prosím zadajte Prihlasovacie meno')" required>
                                <label class="form-label" for="typeLoginX">Prihlasovacie meno</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="typePasswordX" class="form-control" name="password" oninvalid="setCustomValidity('Prosím zadajte heslo')" required>
                                <label class="form-label" for="typePasswordX">Heslo</label>
                            </div>

                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Prihlasiť</button>

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