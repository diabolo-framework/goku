<?php
use X\Service\XAction\Component\WebView\Html;
/** @var $projects \X\Model\Project[] */
$vars = get_defined_vars();
$projects = $vars['projects'];
?>
<h2> Projects </h2>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ( $projects as $project ) : ?>
    <tr>
      <td><?php echo Html::HTMLEncode($project->name); ?> </td>
      <td><?php echo Html::HTMLEncode($project->description); ?> </td>
      <td>
        <a href="index.php?module=web&action=project/detail&id=<?php echo $project->id; ?>" 
           class="btn btn-default btn-xs" 
        >Detail</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>