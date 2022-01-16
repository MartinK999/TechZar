<?php /** @var Array $data */ ?>
<script src="public/skriptReview.js"></script>

    <div class="col">
        <div class="container reviewForm">
            <form method="post" enctype="multipart/form-data" action="?c=review&a=uploadReview">
                <div>
                    <input type="hidden" name="userWriter" id="userWriter" value="<?= $_SESSION['id'] ?>">
                    <input type="hidden" name="userId" id="userId" value="<?= $data['userId'] ?>">

                    <div class="form-group">

                        <div class="container d-flex justify-content-center ">
                            <div class="row">
                                <label for="rating">Hodnotenie:</label>
                                <!-- https://bbbootstrap.com/snippets/animated-rating-stars-18298447 -->
                                <div class="col-md-12">
                                    <div class="stars">
                                            <input class="star star-5" id="star-5" value="5" type="radio" name="rating" checked/>
                                                <label class="star star-5" for="star-5"></label>
                                            <input class="star star-4" id="star-4" value="4" type="radio" name="rating" />
                                                <label class="star star-4" for="star-4"></label>
                                            <input class="star star-3" id="star-3" value="3" type="radio" name="rating" />
                                                <label class="star star-3" for="star-3"></label>
                                            <input class="star star-2" id="star-2" value="2" type="radio" name="rating" />
                                                <label class="star star-2" for="star-2"></label>
                                            <input class="star star-1" id="star-1" value="1" type="radio" name="rating" />
                                                <label class="star star-1" for="star-1"></label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <label for="text">Vaša recenzia:</label>
                        <textarea class="form-control" type ="text" id="text" rows="3" name="text" required></textarea>

                    </div>
                    <div class="mb-3 reviewForm">
                        <button type="submit" class="btn btn-success" id="submit">Odoslať</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
