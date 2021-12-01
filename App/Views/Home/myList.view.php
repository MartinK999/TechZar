<?php /** @var Array $data */ ?>
<?php $pocetInzeratov=0?>

<div class="container allProducts">
    <?php foreach ($data['inzeraty'] as $inzerat) { if ($inzerat->getLoginFk() == $_SESSION['name'])
        { ?>
        <div class="row allProducts">

            <div class="col-sm-10" >

                <div class="container inzeraty" style="border-bottom: 10px">
                    <p>
                    <form method="post" action="?c=home&a=soloInzerat">
                        <input type="hidden" name="inzeratId" value="<?= $inzerat->getId() ?>">
                        <button class="btn btn-primary  text-uppercase fw-bold"
                                style="background: none; color:#64496d; border-color: white" class="floated"
                                type="submit">

                            <mark><?= $inzerat->getTitle() ?></mark>
                        </button>
                    </form>
                    </p>
                    <img class="img-fluid grafiky" src="<?= \App\Config\Configuration::UPLOAD_DIR . $inzerat->getImage() ?>" class="rounded" alt="Bez obrazku" >
                    <p class="text"><?= $inzerat->getText() ?></p>
                </div>


            </div>
            <div class="col-sm-2">
                <p class="cena"><strong><?= $inzerat->getPrice() ?>€</strong></p>
                <form method="post" action="?c=auth&a=deleteInzerat">
                    <input type="hidden" name="id" value="<?= $inzerat->getId() ?>">
                <div class="alert alert-danger alert-dismissible">
                    <button type="submit" class="btn-close" data-dismiss="alert" ></button>
                    <strong>Vymazať inzerát!</strong>
                </div>
                </form>

                <form method="post" action="?c=auth&a=updateInzerat">
                    <input type="hidden" name="id" value="<?= $inzerat->getId() ?>">
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary" ><strong> Upraviť inzerát. </strong></button>

                    </div>
                </form>
            </div>


        </div>
            <?php $pocetInzeratov = $pocetInzeratov+1; ?>
    <?php }
         } ?>
    <?php if ($pocetInzeratov == 0) { ?>
        <h2 class="oznam">Aktuálne nemáte žiadny inzerát.</h2>
        <img class="empty" src="public/images_hlavnaStranka/empty-folder.png">
    <?php } ?>
</div>

