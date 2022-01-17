<?php /** @var Array $data */ ?>
<?php $p = 0 ?>
<div class="container solo">
    <?php foreach ($data['inzeraty'] as $inzerat ) {
        foreach ($data['users'] as $user) {
        if ($inzerat->getId() == $data['inzeratId'] && $inzerat->getUserId() == $user->getId()) { ?>
        <div class="row allProducts">
            <div class="col" >
                <div class="container title solo">
                            <mark><?= $inzerat->getTitle() ?></mark>
                </div>
                <!-- https://stackoverflow.com/questions/67117035/bootstrap-5-carousel-not-sliding -->

                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($data['photos'] as $photos) { ?>

                            <?php for ($i = 0; $i < 10; $i++) {
                                if ($inzerat->getId() == $photos->getInzeratId()) { ?>
                                    <?php if ($p == 0) {
                                        $p++ ?>
                                        <div class="carousel-item active">
                                            <img class="img solo" src="<?= \App\Config\Configuration::UPLOAD_DIR . $photos->getImage() ?>" class="rounded"  class="d-block " alt="Bez obrazku">
                                        </div>

                                    <?php $photoName = $photos->getImage(); } ?>
                                    <?php if ($p > 0 && $photoName != $photos->getImage()) {
                                        $p++ ?>
                                        <div class="carousel-item ">
                                            <img class="img solo" src="<?= \App\Config\Configuration::UPLOAD_DIR . $photos->getImage() ?>" class="rounded"  class="d-block " alt="Bez obrazku">
                                        </div>

                                    <?php } ?>



                                    <?php break; } } ?>
                        <?php } ?>
                        <?php if ($p == 0) {
                            ?>

                            <img class="img solo"
                                 src="public/images_hlavnaStranka/no_photo.png "
                                 class="rounded" >

                        <?php } ?>
                        <?php $p = 0 ?>


                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>







                <div class="row textsolo">
                    <p class="text date">Inzerát pridaný: <?= $inzerat->getDate() ?></p>

                    <p class="text"><?= $inzerat->getText() ?></p>
                </div>
                <div class="row cena " style="float: end">
                    <p class="cenaaa"><strong><?= $inzerat->getPrice() ?>€</strong></p>
                </div>

            </div>

            <div class="row contacts"  style="float: start">
                <div class="col">
                <p class="soloInfo" style="text-decoration: underline;">Kontakty:</p>
                <p class="mobil">Tel. číslo: <strong><?= $inzerat->getPhoneNumber() ?></strong></p>
                <p class="email">Email: <strong><?= $user->getEmail() ?></strong></p>
                    <p class="address">Adresa: <strong><?= $inzerat->getAddress() ?></strong></p>
                </div>
                <div class="col">
                <p class="soloInfo" style="text-decoration: underline;">Inzerát podal:</p>

                    <form method="post" action="?c=review&a=review">
                        <span>Prezívka: </span>
                        <input type="hidden" name="userId"  value="<?= $inzerat->getUserId() ?>">
                        <input type="hidden" name="userLogin"  value="<?= $user->getLogin() ?>">
                        <button class="btn btn-primary "
                                style="background: none; color:#ffffff; border-color: white"
                                type="submit">

                            <mark><?= $user->getLogin() ?></mark>
                        </button>
                    </form></p>




                <p class="name">Meno: <strong><?= $user->getFullname() ?></strong></p>

                </div>

            </div>




        </div>



    <?php } } }?>
</div>
