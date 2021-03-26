<div class="row">
    <form action="/review/doCreate" onsubmit="return validateReviewCreator()" method="post" class="col-6" name="reviewCreator">
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="trackOption">
            <option selected>Choose an existing Track</option>
            <?php foreach ($tracks as $track):?>
                <option value="<?= $track->id ?>"><?= $track->trackname; ?></option>

            <?php endforeach; ?>
        </select>
        <br>
        <h2>Dein Review</h2>

        <div class="form-group">
            <label for="rating">rating</label>
            <input id="rating" name="rating" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label for="content" class="form-label">content</label>
            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
        </div>

        <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION["user"]->id; ?>">

        <br>
        <button type="submit" name="createReview" class="btn btn-primary">Review erstellen</button>
    </form>
        <br>
    <form action="/review/doCreateTrack" method="post" class="col-6" name="trackCreator" onsubmit="return validateTrackCreator()">
        <h2>Füge einen neuen Track hinzu: </h2>
        <div class="form-group">
            <label for="username">Trackname</label>
            <input id="trackname" name="trackname" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="producer_name">producer_name</label>
            <input id="producer_name" name="producer_name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="artist_name">artist_name</label>
            <input id="artist_name" name="artist_name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="genre">genre</label>
            <input id="genre" name="genre" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="release_year">release_year</label>
            <input id="release_year" name="release_year" type="date" class="form-control">
        </div><br>
        <button type="submit" name="createTrack" class="btn btn-primary">Track anlegen</button>
    </form>

</div>
