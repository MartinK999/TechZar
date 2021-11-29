<?php /** @var [] $data */ ?>
<div class="row">
    <div class="col">
        <div class="container">
        <form method="post" enctype="multipart/form-data" action="?c=home&a=upload">
            <div>
                <div class="form-group">
                    <label for="category">Kategória :</label>
                    <select class="form-select mt-3" name="category" id="category">
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

                <div class="form-group">
                    <label for="title">Nadpis :</label>
                    <input type = "text" name="title" class="form-control" rows="5" id="title">

                </div>
                <div class="form-group">
                    <label for="text">Text :</label>
                    <input type = "text" name="text" class="form-control input-lg" rows="5"  id="text">

                </div>
                <div class="form-group">
                    <label for="address">Adresa :</label>
                    <input type = "text" name="address" class="form-control" rows="5"  id="address">

                </div>
                <div class="form-group">
                    <label for="phone_number">Telefónne číslo :</label>
                    <input type = "text" name="phone_number" class="form-control" rows="5"  id="phone_number">

                </div>
                <div class="form-group">
                    <label for="price">Cena :</label>
                    <input type = "text" name="price" class="form-control" rows="5"  id="price">

                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Obrázok :</label>
                    <input name="file" class="form-control" id="formFile" type="file">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Odoslať</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>