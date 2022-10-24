 <?php
    $dtiNow = new DateTimeImmutable('now');
    $dateNow = $dtiNow->format('d.m.Y');
    $hoursNow = $dtiNow->format('H');
    $minutesNow = $dtiNow->format('i');
?>
<p><em><small> Сформировано: <?=$dateNow;?>, <?=$hoursNow;?>:<?=$minutesNow;?> </small></em></p>
<p><em><small> PHP_VERSION: <?=$_SERVER['PHP_VERSION'];?> </small></em></p>
