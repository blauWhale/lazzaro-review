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
                    <form action="/" method="get" onsubmit="return validateSearch()" name="searchValidator">
                            <input class="form-control"  list="datalistOptions" name="searchContent"
                                   placeholder="Type to search...">
                    </form>
                </div>
            </div>
            <div class="row">
                <div id="cardspace" class="col-md-8 d-flex flex-wrap align-items-start justify-content-start">
                <?php foreach ($reviews['review'] as $review):

                    $detailLink = "/review?id=" . $review['id'] ;
                    ?>
                        <div class="card p-2">
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

                            <img src="<?= $reviews['track'][$review['track_id']]['image_path'];?>"
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
        </div>
</main>