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
                        </div>
                        <hr>
                        <img src="images/boston_albumcover.png"
                             alt="..." width="250px" height="250px">

                        <h3>Dein Änderungen</h3>

                        <h4>Gib hier den neuen Reviewtext ein:</h4>
                        <br>
                        <form action="/review/doUpdate" method="post">
                            <div class="form-group">
                                <label for="content" class="form-label">content</label>
                                <textarea class="form-control" id="content" name="content" rows="4"></textarea>
                            </div>

                            <h4>Gib hier das neue Rating x/10 ein:</h4>
                            <br>
                            <div class="form-group">
                                <label for="rating">rating</label>
                                <input id="rating" name="rating" type="text" class="form-control">
                            </div>
                            <input type="hidden" id="review_id" name="review_id" value="<?= $review->id; ?>">
                            <br>
                            <button type="submit" class="btn btn-primary" name="doUpdate_review">Review bearbeiten</button>
                        </form>



                        <label for="customRange3" class="form-label">User Rating</label>
                        <input type="range" class="form-range" min="0" max="10" step="1" id="customRange3">

                        <a id="sharebutton" class="btn" href="" role="button">Share</a>

                        <p class="tags">Tags: Rock</p>

                    </div>
                </div>

                <div class="col-md-3">
                    <input class="form-control" list="datalistOptions"
                           placeholder="Type to search...">

                    <div class="list-group">
                        <h5>Genre</h5>
                        <a href="#" class="list-group-item list-group-item-action">
                            EDM
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">Pop</a>
                        <a href="#" class="list-group-item list-group-item-action">Hip Hop</a>
                        <a href="#" class="list-group-item list-group-item-action">Rock</a>

                        <h5>Jahr</h5>
                        <a href="#" class="list-group-item list-group-item-action">
                            2021
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">2020</a>
                        <a href="#" class="list-group-item list-group-item-action">2002</a>
                        <a href="#" class="list-group-item list-group-item-action">1981</a>
                    </div>

                </div>
            </div>
            <h2>Kommentare (1)</h2>
            <div class="row">
                <div class="col-md-8">
                    <h5>musikhörer55</h5>
                    <p class="card-text"><small class="text-muted">12/03/2021 - 09:31</small>
                    </p>
                    <p>Lorem Ipsum und so</p>

                    <p><small class="text-muted">Comment</small></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here"
                                  id="floatingTextarea"></textarea>
                    </div>
                    <button id="submitbtn" type="submit" class="btn">Kommentieren</button>
                </div>

            </div>


        </div>

    </div>

</main>

</div>