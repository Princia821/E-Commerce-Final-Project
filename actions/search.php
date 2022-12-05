<?php

if (isset($_GET['search'])){
    $term = $_GET['searchTerm'];
    if(!empty($term)){
        header("location: ../views/search-Results.php?searchTerm=$term");
    }
}
?>
              