<div class="paginator">
    <?php
    $size = getBooksCount();
    $prevPage = $page - 1;
    $nextPage = $page + 1;
    if($size > MAX_RECORDS_ON_PAGE){
        if($prevPage > 0)
            echo "<a href='/index.php?page={$prevPage}'> <<< </a>";
        $pages = (int)ceil($size / MAX_RECORDS_ON_PAGE);
        for($i = 1; $i <= $pages; $i++){
            if($i == $page){
                echo " $i ";
            }else{
                echo "<a href='/index.php?page={$i}'>{$i} </a>";
            }
        }
        if($page * MAX_RECORDS_ON_PAGE < $size)
            echo "<a href='/index.php?page={$nextPage}'> >>> </a>";
    }

    ?>
</div>
