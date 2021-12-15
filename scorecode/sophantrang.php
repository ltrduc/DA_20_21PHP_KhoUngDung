<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<div class="container">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$i?>"><?=$i?></a></li>
        <?php } ?>
    </ul>
</div>