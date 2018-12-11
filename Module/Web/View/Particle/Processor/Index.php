<?php
use X\Service\XAction\Component\WebView\Html;
$vars = get_defined_vars();
$project = $vars['project'];
$processors = $vars['processors'];
?>
<h2>
  <?php echo Html::HTMLEncode($project->name); ?>
  &nbsp;&nbsp;
  <small>
    <small>
      <button 
         class="btn btn-danger btn-xs"
         data-toggle="goku-dialog-confirm"
         data-message="是否停止处理该项目的事件？"
         data-yes-url="index.php?module=web&action=project/unlisten&id=<?php echo $project->id; ?>"
      >unlisten</button>
    </small>
  </small>
</h2>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Event</th>
      <th>Description</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ( $processors as $processor ) : ?>
    <tr>
      <td><?php echo Html::HTMLEncode($processor->name); ?> </td>
      <td><?php echo Html::HTMLEncode($processor->getEvent()->name); ?></td>
      <td><?php echo Html::HTMLEncode($processor->description); ?> </td>
      <td>
        <button
           class="btn btn-danger btn-xs"
           data-toggle="goku-dialog-confirm"
           data-message="是否删除该处理器？"
           data-yes-url="index.php?module=web&action=processor/delete&id=<?php echo $processor->id; ?>"
        >Delete</button>
        <?php if ( 0 == $processor->status ) : ?>
        <button 
           class="btn btn-danger btn-xs"
           data-toggle="goku-dialog-confirm"
           data-message="是否禁用该处理器？"
           data-yes-url="index.php?module=web&action=processor/disable&id=<?php echo $processor->id; ?>"
        >Disable</button>
        <?php else : ?>
        <a href="index.php?module=web&action=processor/enable&id=<?php echo $processor->id; ?>"
           class="btn btn-primary btn-xs"
        >Enable</a>
        <?php endif; ?>
        <a href="index.php?module=web&action=processor/edit&id=<?php echo $processor->id; ?>&project=<?php echo $project->id; ?>"
           class="btn btn-default btn-xs"
        >Edit</a>
        <a href="index.php?module=web&action=processor/detail&id=<?php echo $processor->id; ?>" 
           class="btn btn-default btn-xs"
        >Detail</a>
        <a href="index.php?module=web&action=processor/history&id=<?php echo $processor->id; ?>"
           class="btn btn-default btn-xs"
        >History</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="index.php?module=web&action=processor/edit&project=<?php echo $project->id; ?>"
   class="btn btn-default btn-xs"
>Add Processor</a>