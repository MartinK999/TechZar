<?php /** @var Array $data */?>
<script src="public/skriptRegister.js"></script>

<div class="container register">
<section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row  justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <?php if ($data['error'] != "") { ?>
                        <div class="alert alert-danger alert-dismissible" style="text-align: center">

                            <?= $data['error'] ?>
                        </div>
                    <?php } ?>
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Vytvoriť účet</h2>

                            <form method="post" action="?c=profile&a=register">

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="meno">Tvoje meno</label>
                                    <input type="text" id="meno" class="form-control form-control-lg" name="fullname" required>

                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="login">Tvoje prihlasovacie meno</label>
                                    <input type="login" id="login" class="form-control form-control-lg" name="login" required>

                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="mail">Tvoj Email</label>
                                    <input type="email"  id="mail" class="form-control form-control-lg" name="email" required>

                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Heslo</label>
                                    <input type="password" id="password" class="form-control form-control-lg" name="password" required>

                                </div>


                                <div id="submit-info">
                                    Registrácia obsahuje chyby a nie je možné ju spracovať.

                                </div>
                                <div class="d-flex justify-content-center" >

                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" id="submit">Registrovať</button>
                                </div>


                                <p class="text-center text-muted mt-5 mb-0">Už máš vytvorený účet? <a href="?c=Auth&a=loginForm" class="fw-bold text-body"><u>Tu sa prihlás</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>