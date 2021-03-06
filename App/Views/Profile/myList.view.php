<?php /** @var Array $data */ ?>
<?php $pocetInzeratov = 0 ?>
<?php $p = 0 ?>

<?php if ($data['error'] != "") { ?>
    <div class="alert alert-danger alert-dismissible" style="text-align: center">

        <?= $data['error'] ?>
    </div>
<?php } ?>

<div class="container allProducts">
    <?php foreach ($data['inzeraty'] as $inzerat) {
        if ($inzerat->getUserId() == $_SESSION['id']) { ?>
            <div class="row allProducts">

                <div class="col-sm-10">

                    <div class="container inzeraty" style="border-bottom: 10px">
                        <p>
                        <form method="post" action="?c=inzerat&a=soloInzerat">
                            <input type="hidden" name="inzeratId" value="<?= $inzerat->getId() ?>">
                            <button class="btn btn-primary  text-uppercase fw-bold"
                                    style="background: none; color:#64496d; border-color: white" class="floated"
                                    type="submit">

                                <mark><?= $inzerat->getTitle() ?></mark>
                            </button>
                            <p class="text date"><?= $inzerat->getDate() ?></p>
                        </form>
                        </p>

                        <?php foreach ($data['photos'] as $photos) { ?>


                            <?php for ($i = 0; $i < 10; $i++) {
                                if ($inzerat->getId() == $photos->getInzeratId()) { ?>
                                    <?php if ($p == 0) {
                                        $p++ ?>

                                        <img class="img-fluid grafiky"
                                             src="<?= \App\Config\Configuration::UPLOAD_DIR . $photos->getImage() ?>"
                                             class="rounded" alt="Bez obrazku">

                                    <?php } ?>

                                    <?php break;} } ?>


                        <?php } ?>

                        <?php if ($p == 0) {
                            ?>

                            <img class="img-fluid grafiky"
                                 src="public/images_hlavnaStranka/no_photo.png "
                                 class="rounded" >

                        <?php } ?>
                        <?php $p = 0 ?>

                        <p class="text"><?= $inzerat->getText() ?></p>
                    </div>


                </div>
                <div class="col-sm-2">
                    <p class="cena"><strong><?= $inzerat->getPrice() ?>???</strong></p>
                    <form method="post" action="?c=inzerat&a=deleteInzerat">
                        <input type="hidden" name="id" value="<?= $inzerat->getId() ?>">


                        <div class="alert alert-danger alert-dismissible">
                            <button type="submit" class="btn-close" data-dismiss="alert"></button>
                            <strong>Vymaza?? inzer??t!</strong>
                        </div>
                    </form>

                    <form method="post" action="?c=inzerat&a=updateInzerat">
                        <input type="hidden" name="id" value="<?= $inzerat->getId() ?>">
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-primary"><strong> Upravi?? inzer??t. </strong></button>

                        </div>
                    </form>
                </div>


            </div>
            <?php $pocetInzeratov = $pocetInzeratov + 1; ?>
        <?php }
    } ?>
    <?php if ($pocetInzeratov == 0) { ?>
        <h2 class="oznam">Aktu??lne nem??te ??iadny inzer??t.</h2>
        <img class="empty" src="public/images_hlavnaStranka/empty-folder.png">
    <?php } ?>
</div>

