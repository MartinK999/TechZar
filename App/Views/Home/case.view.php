<?php /** @var Array $data */ ?>
<?php $p = 0 ?>

<div class="container allProducts">
    <?php foreach ($data['inzerat'] as $inzerat) {
        if ($inzerat->getCategory() == "PC skrine") { ?>
            <div class="row allProducts">

                <div class="col-sm-10">

                    <div class="container inzeraty">
                        <p>
                        <form method="post" action="?c=home&a=soloInzerat">
                            <input type="hidden" name="inzeratId" value="<?= $inzerat->getId() ?>">
                            <button class="btn btn-primary  text-uppercase fw-bold"
                                    style="background: none; color:#64496d; border-color: white" class="floated"
                                    type="submit">

                                <mark class="style"><?= $inzerat->getTitle() ?></mark>
                            </button>
                        </form></p>
                        <?php foreach ($data['photos'] as $photos) { ?>


                            <?php for ($i = 0; $i < 10; $i++) {
                                if ($inzerat->getId() == $photos->getInzeratId()) { ?>
                                    <?php if ($p == 0) {
                                        $p++ ?>
                                        <img class="img-fluid grafiky"
                                             src="<?= \App\Config\Configuration::UPLOAD_DIR . $photos->getImage() ?>"
                                             class="rounded" alt="Bez obrazku">
                                    <?php } ?>
                                    <?php break; } } ?>
                        <?php } ?>
                        <?php $p = 0 ?>
                        <p class="text"><?= $inzerat->getText() ?></p>
                    </div>


                </div>
                <div class="col-sm-2">
                    <p class="cena"><strong><?= $inzerat->getPrice() ?>€</strong></p>
                </div>

            </div>
        <?php }
    } ?>
</div>