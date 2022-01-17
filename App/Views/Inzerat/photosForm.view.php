<?php /** @var Array $data */ ?>
<?php $sum = 0 ?>

<div class="row" >
    <div class="col">
        <div class="container">
            <form method="post" enctype="multipart/form-data" action="?c=inzerat&a=uploadPhoto">
                <div>

                    <div class="form-group">
                        <?php foreach ($data['inzeraty'] as $inzerat) {
                            $sum++ ?>
                        <?php } ?>

                        <?php for ($i = $sum - 1; $i >= 0; $i--) {
                            if ($inzerat->getUserId() == $_SESSION['id']) { ?>
                                <input type="hidden" name="inzeratId" value="<?= $inzerat->getId() ?>">
                            <?php break;}
                        } ?>




                        <div class="mb-3">
                            <label for="formFile" class="form-label">Obrázok 1:</label>
                            <input name="file1" class="form-control" id="formFile" type="file">
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Obrázok 2:</label>
                            <input name="file2" class="form-control" id="formFile" type="file">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Obrázok 3:</label>
                            <input name="file3" class="form-control" id="formFile" type="file">
                        </div>



                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" id="submit">Odoslať</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>