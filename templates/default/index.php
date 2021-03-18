<main class="main">

    <section class="jumbotron text-center">
        <div class="container">
            <img src="/images/lazzaroLogo.png" class="img-fluid" alt="Logo">
        </div>
    </section>

    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8" id="page-title">
                    <h4>Reviews</h4>
                </div>
                <div class="col-md-3">
                    <input class="form-control" list="datalistOptions"
                           placeholder="Type to search...">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                <?php foreach ($reviews['review'] as $review):

                    $detailLink = "/review?id=" . $review['id'] ;
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <a href="<?= $detailLink ?>">
                                <h5 class="card-title">
                                    <?= $reviews['track'][$review['track_id']]['trackname']; ?>
                                </h5>
                                </a>
                                <p class="card-text"><small
                                            class="text-muted">Erschienen: <?= $reviews['track'][$review['track_id']]['release'] ?>
                                        <span class="genre"><?= $reviews['track'][$review['track_id']]['genre'] ?></span></small>
                                </p>
                            </div>
                            <a href="<?= $detailLink ?>">

                            <img src="https://i.pinimg.com/originals/a4/0d/a5/a40da5f4387ea79b17cbfd7b0f5e74f4.png"
                                 class="card-img-bottom" alt="...">
                            </a>
                            <div class="card-body">
                                <p class="card-text"><?= $review['content']; ?></p>
                            </div>
                        </div>

                <?php endforeach; ?>
                </div>
                <div class="col-md-3" >
                    <div class="list-group">
                        <h5>Genre</h5>
                        <?php foreach ($reviews['review'] as $review): ?>
                            <?php ?>
                            <a href="#" class="list-group-item list-group-item-action">
                                <?= $reviews['track'][$review['track_id']]['genre'] ?>
                            </a>
                        <?php ?>
                        <?php endforeach; ?>
                        <br>

                        <h5>Jahr</h5>
                        <?php foreach ($reviews['review'] as $review): ?>
                        <a href="#" class="list-group-item list-group-item-action">
                            <?= $reviews['track'][$review['track_id']]['release'] ?>
                        </a>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>


        </div>

</main>