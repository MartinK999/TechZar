<?php /** @var Array $data */ ?>
<div class="container solo">
    <?php foreach ($data['inzeraty'] as $inzerat ) {
        foreach ($data['users'] as $user) {
        if ($inzerat->getId() == $data['inzeratId'] && $inzerat->getLoginFK() == $user->getLogin()) { ?>
        <div class="row allProducts">

            <div class="col" >

                <div class="container title solo">

                            <mark><?= $inzerat->getTitle() ?></mark>


                </div>
                <div class="row solofoto">
                    <img class="img solo" src="<?= \App\Config\Configuration::UPLOAD_DIR . $inzerat->getImage() ?>" class="rounded" alt="Bez obrazku" >

                </div>
                <div class="row textsolo">
                    <p class="text"><?= $inzerat->getText() ?></p>
                </div>

            </div>

            <div class="row contacts" >
                <div class="col">
                <p class="soloInfo" style="text-decoration: underline;">Kontakty:</p>
                <p class="mobil">Tel. číslo: <strong><?= $inzerat->getPhoneNumber() ?></strong></p>
                <p class="email">Email: <strong><?= $user->getEmail() ?></strong></p>
                    <p class="address">Adresa: <strong><?= $inzerat->getAddress() ?></strong></p>
                </div>
                <div class="col">
                <p class="soloInfo" style="text-decoration: underline;">Inzerát podal:</p>

                    <form method="post" action="?c=home&a=review">
                        <span>Prezívka: </span>
                        <input type="hidden" name="userLogin"  value="<?= $inzerat->getLoginFk() ?>">
                        <button class="btn btn-primary "
                                style="background: none; color:#ffffff; border-color: white"
                                type="submit">

                            <mark><?= $inzerat->getLoginFk() ?></mark>
                        </button>
                    </form></p>




                <p class="name">Meno: <strong><?= $user->getFullname() ?></strong></p>

                </div>

            </div>




        </div>

            <div class="row cena">
                <p class="cenaa"><strong><?= $inzerat->getPrice() ?>€</strong></p>
            </div>


    <?php } } }?>
</div>
