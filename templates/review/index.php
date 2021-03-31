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
                    <div class="card" id="cardspace">
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
                        <br>
                        <form action="/" method="get" onsubmit="return validateSearch()" name="searchbar">
                            <input id="searchbar-review" class="form-control"  list="datalistOptions" name="searchContent"
                                   placeholder="Nach Inhalten suchen...">
                        </form>
                    </div>
                    <br>

                    <div class="list-group">
                        <h5>Genre</h5>
                        <?php

                        $oldFilters = "";
                        foreach($_GET as $field=> $value){
                            if($field === "searchGenre")
                                continue;

                            $oldFilters .=$field."=".$value."&";
                        }

                        foreach ($genres as $genre):
                            ?>
                            <a href="/?<?= $oldFilters ?>searchGenre=<?= $genre ?>" class="list-group-item list-group-item-action" name="genreFilter">
                                <?= $genre ?>
                            </a>
                            <?php ?>
                        <?php endforeach; ?>
                        <br>

                        <h5>Jahr</h5>
                        <?php
                        $oldFilters = "";
                        foreach($_GET as $field=> $value){
                            if($field === "searchYear")
                                continue;

                            $oldFilters .=$field."=".$value."&";
                        }
                        foreach ($years as $year): ?>
                            <a href="/?<?= $oldFilters ?>searchYear=<?= $year ?>" class="list-group-item list-group-item-action" name="yearFilter">
                                <?= $year ?>
                            </a>
                        <?php endforeach; ?>
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
                    <?php if (isset($_SESSION["user"])) { ?>
                    <form action="/review/comment" method="post" name="commentValidator" onsubmit="return validateComments()">
                        <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here"
                                  id="floatingTextarea" name="comment_content"></textarea>
                        </div>
                        <input type="hidden" id="review_id" name="review_id" value="<?= $review->id; ?>">

                            <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION["user"]->id; ?>">

                        <button name="doComment" id="commment" type="submit" class="btn">Kommentieren</button>
                    </form>
                    <?php } else {  ?>
                        <p>Melde dich <a href="/user/login"><strong>hier</strong></a> an um zu kommentieren! Noch kein Mitglied? Registriere dich <a href="/user/create"><strong>hier</strong></a></p>
                    <?php } ?>
                </div>

            </div>


        </div>

    </div>

</main>

</div>