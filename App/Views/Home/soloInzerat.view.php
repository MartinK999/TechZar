<?php /** @var Array $data */ ?>
<div class="container solo">
    <?php foreach ($data['inzeraty'] as $inzerat) {
        if ($inzerat->getId() == $data['inzeratId']) { ?>
        <div class="row allProducts">

            <div class="col" >

                <div class="container inzeraty">

                            <mark><?= $inzerat->getTitle() ?></mark>


                </div>
                <div class="container solofoto">
                    <img  src="<?= \App\Config\Configuration::UPLOAD_DIR . $inzerat->getImage() ?>" class="rounded" alt="produkt" >

                </div>
                <div class="row textsolo">
                    <p class="text"><?= $inzerat->getText() ?></p>
                </div>

            </div>


        </div>


        <div class="row cena">
            <p class="cena"><strong><?= $inzerat->getPrice() ?>€</strong></p>
        </div>
    <?php } } ?>
</div>
