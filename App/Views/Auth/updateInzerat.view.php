<?php /** @var Array $data */ ?>
<script src="public/skriptUpdate.js"></script>
<div class="row">
    <?php foreach ($data['inzeraty'] as $inzerat){ if ($inzerat->getId() == $data['id']){?>
    <div class="col">
        <div class="container">
            <form method="post" enctype="multipart/form-data" action="?c=auth&a=update">
                <div>
                    <div class="form-group">
                        <label for="category">Kategória :</label>
                        <select class="form-select mt-3" name="category" id="category" value="<?= $inzerat->getCategory()?>">
                            <option>Grafické karty</option>
                            <option>Procesory</option>
                            <option>Základné dosky</option>
                            <option>Pamäte RAM</option>
                            <option>Zdroje</option>
                            <option>Hard disky</option>
                            <option>PC chladenie</option>
                            <option>PC skrine</option>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?= $inzerat->getId() ?>">

                    <div class="form-group">
                        <label for="title">Nadpis :</label>
                        <input type = "text" name="title" class="form-control" rows="5" id="title" value="<?= $inzerat->getTitle()?>">

                    </div>
                    <div class="form-group">
                        <label for="text">Text :</label>
                        <textarea class="form-control" type = "text" id="text" rows="3" name="text"><?= $inzerat->getText()?></textarea>


                    </div>
                    <div class="form-group">
                        <label for="address">Adresa :</label>
                        <input type = "text" name="address" class="form-control" rows="5"  id="address" value="<?= $inzerat->getAddress()?>">

                    </div>
                    <div class="form-group">
                        <label for="phone_number">Telefónne číslo :</label>
                        <input type = "text" name="phone_number" class="form-control" rows="5"  id="mobil" value="<?= $inzerat->getPhoneNumber()?>">

                    </div>
                    <div class="form-group">
                        <label for="price">Cena :</label>
                        <input type = "text" name="price" class="form-control" rows="5"  id="price" value="<?= $inzerat->getPrice()?>">

                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Obrázok :</label>
                        <input name="file" class="form-control" id="formFile" type="file">
                    </div>

                    <div id="submit-info">
                        Formulár obsahuje chyby a nie je možné ho odoslať.

                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"  id="submit">Upraviť</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php } } ?>
</div>