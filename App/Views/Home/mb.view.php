<?php /** @var Array $data */ ?>
<div class="container allProducts">
    <?php foreach ($data['inzerat'] as $inzerat) { if ($inzerat->getCategory() == "Základné dosky") { ?>
        <div class="row allProducts">

            <div class="col-sm-10" >

                <div class="container inzeraty">
                    <p>
                    <form method="post" action="?c=home&a=soloInzerat">
                        <input type="hidden" name="inzeratId" value="<?= $inzerat->getId() ?>">
                        <button class="btn btn-primary  text-uppercase fw-bold"
                                style="background: none; color:#64496d; border-color: white" class="floated"
                                type="submit">

                            <mark><?= $inzerat->getTitle() ?></mark>
                        </button>
                    </form></p>
                    <img class="img-fluid grafiky" src="<?= \App\Config\Configuration::UPLOAD_DIR . $inzerat->getImage() ?>" class="rounded" alt="Bez obrazku" >
                    <p class="text"><?= $inzerat->getText() ?></p>
                </div>


            </div>
            <div class="col-sm-2">
                <p class="cena"><strong><?= $inzerat->getPrice() ?>€</strong></p>
            </div>

        </div>
    <?php } } ?>
</div>
