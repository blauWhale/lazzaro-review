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
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $track->trackname; ?></h5>
                            <p class="card-text"><small class="text-muted">Erschienen: <?= $track->release_year; ?>  <span class="genre"><?= $track->genre; ?></span></small></p>
                            <p><small class="text-muted">Comment</small> </p>
                        </div>
                        <img src="https://i.pinimg.com/originals/a4/0d/a5/a40da5f4387ea79b17cbfd7b0f5e74f4.png"
                             class="card-img-bottom" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= $review->content; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $track->trackname; ?></h5>
                            <p class="card-text"><small class="text-muted">Erschienen: <?= $track->release_year; ?>  <span class="genre"><?= $track->genre; ?></span></small></p>
                            <p><small class="text-muted">Comment</small> </p>
                        </div>
                        <img src="https://i.pinimg.com/originals/a4/0d/a5/a40da5f4387ea79b17cbfd7b0f5e74f4.png"
                             class="card-img-bottom" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= $review->content; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
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
            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $track->trackname; ?></h5>
                            <p class="card-text"><small class="text-muted">Erschienen: <?= $track->release_year; ?>  <span class="genre"><?= $track->genre; ?></span></small></p>
                        </div>
                        <img src="https://i.pinimg.com/originals/a4/0d/a5/a40da5f4387ea79b17cbfd7b0f5e74f4.png" class="card-img-bottom" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= $review->content; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $track->trackname; ?></h5>
                            <p class="card-text"><small class="text-muted">Erschienen: <?= $track->release_year; ?>  <span class="genre"><?= $track->genre; ?></span></small></p>
                        </div>
                        <img src="https://i.pinimg.com/originals/a4/0d/a5/a40da5f4387ea79b17cbfd7b0f5e74f4.png" class="card-img-bottom" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= $review->content; ?></p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $track->trackname; ?></h5>
                            <p class="card-text"><small class="text-muted">Erschienen: <?= $track->release_year; ?>  <span class="genre"><?= $track->genre; ?></span></small></p>
                        </div>
                        <img src="https://i.pinimg.com/originals/a4/0d/a5/a40da5f4387ea79b17cbfd7b0f5e74f4.png" class="card-img-bottom" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= $review->content; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $track->trackname; ?></h5>
                            <p class="card-text"><small class="text-muted">Erschienen: <?= $track->release_year; ?>  <span class="genre"><?= $track->genre; ?></span></small></p>
                        </div>
                        <img src="https://i.pinimg.com/originals/a4/0d/a5/a40da5f4387ea79b17cbfd7b0f5e74f4.png" class="card-img-bottom" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= $review->content; ?></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

</main>