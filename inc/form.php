<!-- Include post request -->
<?php require_once 'post.php'; ?>
<!-- Filter form -->
<form action="" method="post">
      <label>Rating</label>
      <select name="rating">
         <option value="highest" <?php if (isset($rating) && $rating=="highest") echo "selected";?>> Highest First</option>
         <option value="lowest" <?php if (isset($rating) && $rating=="lowest") echo "selected";?>>Lowest First</option>
      </select>
      <label>Minimum rating</label>
      <select name="minimum_rating">
         <option value="1" <?php if (isset($minimum_rating) && $minimum_rating=="1") echo "selected";?>>1</option>
         <option value="2" <?php if (isset($minimum_rating) && $minimum_rating=="2") echo "selected";?>>2</option>
         <option value="3" <?php if (isset($minimum_rating) && $minimum_rating=="3") echo "selected";?>>3</option>
         <option value="4" <?php if (isset($minimum_rating) && $minimum_rating=="4") echo "selected";?>>4</option>
         <option value="5" <?php if (isset($minimum_rating) && $minimum_rating=="5") echo "selected";?>>5</option>
      </select>
      <label>Date</label>
      <select name="date">
         <option value="oldest" <?php if (isset($date) && $date=="oldest") echo "selected";?>>Oldest First</option>
         <option value="newest" <?php if (isset($date) && $date=="newest") echo "selected";?>> Newest First</option>
      </select>
      <label>Prioritize by text</label>
      <select name="text">
         <option value="yes" <?php if (isset($text) && $text=="yes") echo "selected";?>>Yes</option>
         <option value="no" <?php if (isset($text) && $text=="no") echo "selected";?>>No</option>
      </select>
      <input name="search" type="submit" value="Filter"/>
</form>