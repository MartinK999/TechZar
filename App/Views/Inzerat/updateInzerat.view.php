<?php /** @var Array $data */ ?>
<script src="public/skriptUpdate.js"></script>
<?php if ($data['error'] != "") { ?>
    <div class="alert alert-danger alert-dismissible" style="text-align: center">

        <?= $data['error'] ?>
    </div>
<?php } ?>
<div class="row">
    <?php foreach ($data['inzeraty'] as $inzerat){ if ($inzerat->getId() == $data['id']){?>
    <div class="col">
        <div class="container">
            <form method="post" enctype="multipart/form-data" action="?c=inzerat&a=update">
                <div>
                    <div class="form-group">
                        <label for="category">Kategória :</label>
                        <select class="form-select mt-3" name="category" id="category" value="<?= $inzerat->getCategory()?>">
                            <option value="Grafické karty">Grafické karty</option>
                            <option value="Procesory">Procesory</option>
                            <option value="Základné dosky">Základné dosky</option>
                            <option value="Pamäte RAM">Pamäte RAM</option>
                            <option value="Zdroje">Zdroje</option>
                            <option value="Hard disky">Hard disky</option>
                            <option value="PC chladenie">PC chladenie</option>
                            <option value="PC skrine">PC skrine</option>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?= $inzerat->getId() ?>">

                    <div class="form-group">
                        <label for="title">Nadpis :</label>
                        <input type = "text" name="title" class="form-control"  id="title" value="<?= $inzerat->getTitle()?>" required>

                    </div>
                    <div class="form-group">
                        <label for="text">Text :</label>
                        <textarea class="form-control"  id="text" rows="3" name="text"><?= $inzerat->getText()?></textarea>


                    </div>
                    <div class="form-group">
                        <label for="address">Adresa :</label>
                        <input type = "text" name="address" class="form-control"  id="address" value="<?= $inzerat->getAddress()?>" required>

                    </div>
                    <div class="form-group">
                        <label for="phone_number">Telefónne číslo :</label>
                        <input type = "text" name="phone_number" class="form-control"   id="mobil" value="<?= $inzerat->getPhoneNumber()?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="price">Cena :</label>
                        <input type = "text" name="price" class="form-control" id="price" value="<?= $inzerat->getPrice()?>" required>

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