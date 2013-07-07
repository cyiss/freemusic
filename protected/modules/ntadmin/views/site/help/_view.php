<?php
/* @var $this HelpController */
/* @var $data Help */
?>

<!-- <div class="view"> -->
		<tr>
			<td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></td>
			<td><?php echo CHtml::encode($data->title); ?></td>
			<td><?php echo CHtml::encode($data->content); ?></td>
			<td>
				<?php if ( CHtml::encode($data->is_valid) ) { ?>
					表示
			 	<?php } else { ?>
			 		非表示
			 	<?php } ?>
			</td>
			<td><?php echo CHtml::encode($data->sort_index); ?></td>
			<td><?php echo CHtml::encode($data->last_update); ?></td>
		</tr>
<!-- </div> -->