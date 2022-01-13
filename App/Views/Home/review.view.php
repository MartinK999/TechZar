<?php /** @var Array $data */ ?>
<div class="container allProducts">
    <?php $pridane = false  ?>

    <br>
    <h4><strong>Recenzie na používateľa: </strong><?php echo $data['userLogin'] ?></h4>
    <?php foreach ($data['reviews'] as $review ) {
    if($review->getUserWriter() == $_SESSION['name'])
    { $pridane = true; }}?>


    <?php if($pridane == false){?>
            <form method="post" action="?c=home&a=reviewForm">
                <input type="hidden" name="userLogin" value="<?= $data['userLogin']?>">
                <button class="btn btn-secondary " type="submit">
                    <p class="review button">Napíš recenziu</p>
                </button>
            </form> <?php } ?>
   <?php foreach ($data['reviews'] as $review) {
        if ($review->getUserLogin() == $data['userLogin']) { ?>
        <div class="row allProducts review" >
                <div class="container inzeraty">
                    <p class="text-userWriter"><strong><?= $review->getUserWriter() ?></strong></p>
                    <p class="text date"><?= $review->getDate() ?></p>

                    <!-- https://bbbootstrap.com/snippets/animated-rating-stars-18298447 -->
                    <div class="col-md-12">
                        <div class="stars">
                            <?php if ($review->getRating() == 5) { ?>
                                <label class="starR star-1" for="star-1"></label>
                            <?php } if ($review->getRating() >= 4) { ?>
                                <label class="starR star-2" for="star-2"></label>
                            <?php } if ($review->getRating() >= 3) { ?>
                                <label class="starR star-3" for="star-3"></label>
                            <?php } if ($review->getRating() >= 2) { ?>
                                <label class="starR star-4" for="star-4"></label>
                            <?php } if ($review->getRating() >= 1) { ?>
                                <label class="starR star-5" for="star-5"></label>
                            <?php }?>
                        </div>
                    </div>
                    <p class="text review" ><?= $review->getText() ?></p>
                    <?php if ($review->getUserWriter() == $_SESSION['name']) { ?>

                            <form method="post" action="?c=home&a=deleteReview">
                                <input type="hidden" name="id" value="<?= $review->getId() ?>">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="submit" class="btn-close" data-dismiss="alert" ></button>
                                    <strong>Vymazať recenziu!</strong>
                                </div>
                            </form>

                    <?php } ?>
                    <hr class="solid" />
                </div>

        </div>
    <?php } } ?>
</div>
