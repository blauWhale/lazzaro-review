<main class="main">

    <section class="jumbotron text-center">
        <div class="container">
            <img src="/images/lazzaroLogo.png" class="img-fluid" alt="Logo">
        </div>
    </section>

    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $track->trackname; ?></h5>
                            <p class="card-text"><small class="text-muted">Erschienen: <?= $track->release_year; ?>
                                    <span class="genre"><?= $track->genre; ?></span></small>
                            </p>
                            <p><small class="text-muted">Comment</small></p>
                            <?php if (isset($_SESSION["user"]) && $_SESSION["user"]->moderator) { ?>
                                <form action="/review/doDelete" method="post">
                                    <button type="submit" class="btn btn-primary" name="delete_review">Review löschen
                                    </button>
                                    <input type="hidden" id="review_id" name="review_id" value="<?= $review->id; ?>">
                                </form>
                                <br>
                                <form action="/review/update" method="post">
                                    <button type="submit" class="btn btn-primary" name="update_review">Review
                                        bearbeiten
                                    </button>
                                    <input type="hidden" id="review_id" name="review_id" value="<?= $review->id; ?>">
                                </form>
                            <?php } ?>
                        </div>
                        <hr>
                        <img src="<?= $track->image_path; ?>"
                             alt="..." width="250px" height="250px">
                        <p class="card-text"><?= $review->content; ?></p>


                        <p class"Rating"> Lazzaro Rating: <?= $review->rating; ?>/10</p>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="col-md-3">
                        <form action="/" method="get" onsubmit="return validateSearch()" name="searchValidator">
                            <input class="form-control"  list="datalistOptions" name="searchContent"
                                   placeholder="Type to search...">
                        </form>
                    </div>

                    <div class="list-group">
                        <h5>Genre</h5>
                        <a href="default/genreFilter" class="list-group-item list-group-item-action" name="genreFilter">
                            EDM
                        </a>
                        <a href="default/genreFilter" class="list-group-item list-group-item-action" name="genreFilter">Pop</a>
                        <a href="default/genreFilter" class="list-group-item list-group-item-action" name="genreFilter">Hip
                            Hop</a>
                        <a href="default/genreFilter" class="list-group-item list-group-item-action" name="genreFilter">Rock</a>

                        <h5>Jahr</h5>
                        <a href="default/yearFilter" class="list-group-item list-group-item-action" name="yearFilter">
                            2021
                        </a>
                        <a href="default/yearFilter" class="list-group-item list-group-item-action" name="yearFilter">2020</a>
                        <a href="default/yearFilter" class="list-group-item list-group-item-action" name="yearFilter">2002</a>
                        <a href="default/yearFilter" class="list-group-item list-group-item-action" name="yearFilter">1981</a>
                    </div>

                </div>
            </div>
            <h2>Kommentare (<?= $i = count($comments['comment']) ?>)</h2>

            <?php foreach ($comments['comment'] as $comment): ?>
                <div class="row">
                    <div class="col-md-8">
                        <h5><?= $comments['user'][$comment['user_id']]['username']; ?></h5>
                        <p class="card-text"><small class="text-muted"><?= $comment['date']; ?></small>
                        </p>
                        <p><?= $comment['content']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="row">
                <div class="col-md-8">
                    <form action="/review/comment" method="post" name="commentValidator" onsubmit="return validateComments()">
                        <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here"
                                  id="floatingTextarea" name="comment_content"></textarea>
                        </div>
                        <input type="hidden" id="review_id" name="review_id" value="<?= $review->id; ?>">
                        <?php if (isset($_SESSION["user"])) { ?>
                            <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION["user"]->id; ?>">
                        <?php } ?>
                        <button name="doComment" id="commment" type="submit" class="btn">Kommentieren</button>
                    </form>
                </div>

            </div>


        </div>

    </div>

</main>

</div>