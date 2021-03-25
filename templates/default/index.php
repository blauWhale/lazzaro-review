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
                    <form action="/default/search" method="post">
                            <input class="form-control" list="datalistOptions" name="search"
                                   placeholder="Type to search...">
                    </form>
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

                            <img src="images/boston_albumcover.png"
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
                        <form action="default/genreFilter" method="post">
                            <a href="default/genreFilter" class="list-group-item list-group-item-action" name="genreFilter">
                                <?= $reviews['track'][$review['track_id']]['genre'] ?>
                            </a>
                        </form>
                        <?php ?>
                        <?php endforeach; ?>
                        <br>

                        <h5>Jahr</h5>
                        <?php foreach ($reviews['review'] as $review): ?>
                        <form action="default/yearFilter" method="post">
                            <a href="default/yearFilter" class="list-group-item list-group-item-action" name="yearFilter">
                                <?= $reviews['track'][$review['track_id']]['release'] ?>
                            </a>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
</main>