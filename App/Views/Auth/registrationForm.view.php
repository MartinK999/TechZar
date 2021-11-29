<?php /** @var Array $data */ ?>

<div class="container register">
<section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row  justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Vytvoriť účet</h2>

                            <form method="post" action="?c=auth&a=register">

                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="fullname"/>
                                    <label class="form-label" for="form3Example1cg">Tvoje meno</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="login" id="form3Example2cg" class="form-control form-control-lg" name="login" />
                                    <label class="form-label" for="form3Example2cg">Tvoje Prihlasovacie meno</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email"/>
                                    <label class="form-label" for="form3Example3cg">Tvoj Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password"/>
                                    <label class="form-label" for="form3Example4cg">Heslo</label>
                                </div>


                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Registrovať</button>
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