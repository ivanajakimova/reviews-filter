<?php
// Include reviews
$reviews = require_once './inc/jsonReviews.php';
// Include filter
require_once './inc/filter.php';

//Filter by minimum reviews
filterReviews($reviews);

// Sort by text, rating and date with usort
usort($reviews, function ($review1, $review2) {
    //check if reviewText is equal or empty
    if($review1['reviewText'] == $review2['reviewText']) {
        // check if rating is equal
        if ($review1['rating'] == $review2['rating']) {
            //if rating is equal sort by date asc
            return  $review1['reviewCreatedOnDate'] <=> $review2['reviewCreatedOnDate'];
        }
        // sort by rating
        return $review2['rating']  <=> $review1['rating'];
    }
    // sort by text (check if first review empty and continue)
    else if($review1['reviewText'] == ''){
        return 1;
    }
    // sort by text (check if second review is empty and return it )
    else if( $review2['reviewText'] == ''){
        return -1;
    }
    // sort by rating and date
    if ($review1['rating'] == $review2['rating']) {
        return  $review1['reviewCreatedOnDate'] <=> $review2['reviewCreatedOnDate'];
    }
    return $review2['rating'] <=> $review1['rating'];
});

?>
<!-- including header -->
<?php include_once './inc/header.php'; ?>
<!-- including filter form -->
<?php include_once './inc/form.php'; ?>

<!-- iterate in reviews and output in table -->
<table>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Review</th>
            <th scope="col">Rating</th>
            <th scope="col">Date</th>
            <th scope="col">Reviewer Name</th>
            <th scope="col">Created On</th>
        </tr>
        </thead>
        <?php foreach($reviews as $review): ?>
        <tbody>
            <tr>
                <td><?php echo $review['id']; ?></td>
                <td><?php echo $review['reviewText']; ?></td>
                <td><?php echo $review['rating']; ?></td>
                <td><?php echo date("F j, Y, g:i a", $review['reviewCreatedOnTime']) ?></td>
                <td><?php echo $review['reviewerName']; ?></td>
                <td><?php echo $review['reviewCreatedOn']; ?></td>
            </tr>
        
        </tbody>
        <?php endforeach; ?>
</table>
</body>
</html>