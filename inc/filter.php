<?php
// Filter reviews minimum rating 1 or higher
function filterReviews($reviews, $rating=''){
    $reviews = array_filter($reviews,function($review) use($rating){
        return $review['rating'] >= $rating;
    });
    return $reviews;
}
?>