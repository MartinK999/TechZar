<?php /** @var [] $data */ ?>
<div class="row">
    <div class="col">
        <div class="container">
        <form method="post" enctype="multipart/form-data" action="?c=home&a=upload">
            <div>
                <div class="form-group">
                    <label for="category">Kategória :</label>
                    <select  class="form-select mt-3" name="category" id="category"  required>
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
                    <input type = "text" name="title" class="form-control" id="title" required>

                </div>
                <div class="form-group">
                    <label for="text">Text :</label>


                    <textarea class="form-control" type = "text" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>

                </div>
                <div class="form-group">
                    <label for="address">Adresa :</label>
                    <input type = "text" name="address" class="form-control"  id="address" required>

                </div>
                <div class="form-group">
                    <label for="phone_number">Telefónne číslo :</label>
                    <input type = "text" name="phone_number"  class="form-control" id="mobil" required>

                </div>
                <div class="form-group">
                    <label for="price">Cena :</label>
                    <input type = "text" name="price" class="form-control" id="price" required>

                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Obrázok :</label>
                    <input name="file" class="form-control" id="formFile" type="file">
                </div>

                <div id="submit-info">
                    Formulár obsahuje chyby a nie je možné ho odoslať.

                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" id="submit">Odoslať</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>