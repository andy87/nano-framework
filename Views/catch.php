<?php

/**
 * @var Exception $e
 */

?>

<br>
<br>Message: <?= $e->getMessage() ?>
<br>Position: <?= $e->getFile() . ':' . $e->getLine() ?>
<br>Trace: <?= $e->getMessage() ?>
<pre>
    <?php print_r($e->getTrace()); ?>
</pre>