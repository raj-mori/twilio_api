 
<?php $cr = $limit + 1; ?>
<?php foreach ($call as $each_cost): ?>
				<tr>
				    <td><?php print $cr; ?></td>

				    <td>
					<?php
					$newdate = date('m/d/Y', strtotime($each_cost['date']));
					print $newdate;
					?>
				    </td>
				    <td><?php print $each_cost['phno']; ?></td>
				    <td><?php print $each_cost['call_content']; ?></td>

				    <td>
					<a href="javascript:void(0);" onclick="return DeleteCost('schedule_call/<?php print $each_cost['id']; ?>')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>
				    </td><td><span id="warningbtn_<?php print $each_cost['id']; ?>" type="button" class="label label-warning pointer"  onclick="pushTosalesForce('<?php print $each_cost['id']; ?>');">Make a Call</span>
	                               </td>

				</tr>
				<?php $cr++; ?>    
    <?php endforeach; ?>