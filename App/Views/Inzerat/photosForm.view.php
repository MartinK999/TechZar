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




                        <?php

                        function kontrolaTypu($subor){
                            $pripony = array('jpg', 'jpeg', 'png');
                            $pripona = pathinfo($subor['name'],PATHINFO_EXTENSION);//najde poslednu bodku a zoberie vsetky znaky za nou

                            if(in_array($pripona,$pripony)){
                                return 1;
                            }else{
                                return 0;
                            }
                        }

                        function kontrolaVelkost($subor){
                            if($subor['size'] <= 512000){
                                return 1;
                            }else{
                                return 0;
                            }
                        }
                        ?>








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