<?php 
if(isset($_REQUEST['search']))
{
    $text = $_POST['text'];
    $rating = $_POST['rating'];
    $date = $_POST['date'];
    $minimum_rating = $_POST['minimum_rating'];

    //Filter by minimum reviews after submitted
    $reviews = filterReviews($reviews, $minimum_rating);

    // Sort by text, rating and date with usort
    usort($reviews, function ($review1, $review2) {
        $text = $_POST['text'];
        $rating = $_POST['rating'];
        $date = $_POST['date'];

        //check if reviewText is equal
        if($review1['reviewText'] == $review2['reviewText']) {
            if ($review2['rating'] == $review1['rating']) {
                if($date == 'oldest') {return  $review1['reviewCreatedOnDate'] <=> $review2['reviewCreatedOnDate'];} else {return  $review2['reviewCreatedOnDate'] <=> $review1['reviewCreatedOnDate'];}
            }
            if($rating == 'highest') { return $review2['rating']  <=> $review1['rating']; } else {  return $review1['rating']  <=> $review2['rating']; } 
        }
        // sort by text
        else if($review1['reviewText'] == ''){
            if($text == 'yes') { return 1; } else {return -1; }
        }
        // sort by text
        else if( $review2['reviewText'] == ''){
            if($text == 'yes') { return -1; } else {return 1; }
        }
        //  sort by rating and date
        if ($review2['rating'] == $review1['rating']) {
            if($date == 'oldest') {return  $review1['reviewCreatedOnDate'] <=> $review2['reviewCreatedOnDate'];} else {return  $review2['reviewCreatedOnDate'] <=> $review1['reviewCreatedOnDate'];}
        }
        if($rating == 'highest') { return $review2['rating']  <=> $review1['rating']; } else {  return $review1['rating']  <=> $review2['rating']; }
    });
}

?>