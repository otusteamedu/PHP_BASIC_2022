
<nav class="d-flex justify-content-between">
    <p><em><small> Сформировано: <?=date_create()->format('d.m.Y, H:i');?> </small></em></p>
    <?php if (isGranted("ROLE_ADMIN")) { ?>
        <p><a href="/info.php">info</a></p>
    <?php } ?>
</nav>
