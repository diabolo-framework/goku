<?php
use X\Service\XAction\Component\WebView\Html;
$vars = get_defined_vars();
$event = $vars['event'];
$processor = $vars['processor'];
?>
<h2>Processor : <?php echo Html::HTMLEncode($processor->name); ?></h2>
<p> -- <?php echo Html::HTMLEncode($event->name); ?></p>
<br>

<p><strong>ID :</strong> <?php echo $processor->identifier; ?></p>
<p><strong>HTTP METHOD :</strong> <?php echo $processor->http_method; ?></p>
<p><strong>HTTP URL :</strong> <?php echo $processor->http_url; ?></p>
<p><?php echo Html::HTMLEncode($processor->description); ?></p>

<a href="index.php?module=web&action=processor/edit&project=<?php echo $processor->project_id?>&id=<?php echo $processor->id?>"
   class="btn btn-default btn-xs"
>Edit</a>