<div class="row">
	<form action="/review/doCreate" method="post" class="col-6">
        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Choose an existing Track</option>
            <?php $i=1;
            foreach ($reviews['review'] as $review):?>
            <option value="<?=$i?>"><?= $reviews['track'][$review['track_id']]['trackname']; ?></option>

            <?php $i++;
            endforeach; ?>
        </select>
        <h2>Or review a new song</h2>
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
		  <label for="release_year">artist_name</label>
	  	<input id="release_year" name="release_year" type="date" class="form-control">
		</div>

		<button type="submit" name="send" class="btn btn-primary">Absenden</button>
	</form>
</div>
