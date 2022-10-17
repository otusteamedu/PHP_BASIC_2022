 <?php
    $dtiNow = new DateTimeImmutable('now');
    $dateNow = $dtiNow->format('d.m.Y');
    $hoursNow = $dtiNow->format('H');
    $minutesNow = $dtiNow->format('i');
?>
<p><em> Сформировано: <?=$dateNow;?>, <?=hours_rus($hoursNow);?> <?=minutes_rus($minutesNow);?>. </em></p>
<p><em> PHP_VERSION: <?=$_SERVER['PHP_VERSION'];?> </em></p>
