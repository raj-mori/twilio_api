 
<?php $cr = $limit + 1; ?>

<?php foreach ($patient as $each_cost): ?>
    <tr>
        <td><?php print $cr; ?></td>

        <td>
            <?php print $each_cost['name']; ?>
        </td>
        <td><?php print $each_cost['age']; ?></td>
        <td><?php print $each_cost['gender']; ?></td>
        <td><?php print $each_cost['address']; ?></td>

        <td><?php print $each_cost['phno']; ?></td>
        <td><?php print $each_cost['email']; ?></td>
        <td><?php print $each_cost['no_of_call']; ?> </td>
        <td><?php print $each_cost['no_of_messages']; ?> </td>
        <td id='1_<?php print $each_cost['id']; ?>'><?php print $each_cost['message_body'] ?>
            <span onclick="edit_message('<?php print $each_cost['id']; ?>');" >
                <i class="glyphicon glyphicon-edit pointer "  title="Edit Message"></i>
            </span></td>
        <td id='2_<?php print $each_cost['id']; ?>' style="display: none"> <textarea  onblur="edit_focus_message('<?php print $each_cost['id']; ?>');" id="edit_focus_message_<?php print $each_cost['id']; ?>" class="form-control"  type="text"><?php print $each_cost['message_body'] ?></textarea></td>


        <td><span  type="button" class="label label-warning pointer"  title="Click To Send Message" onclick="sendMessage('<?php print $each_cost['id']; ?>');">Send Message</span>
            &nbsp;&nbsp;&nbsp;
            <i class="glyphicon glyphicon-earphone"></i>   <span title="Click To Make a Call" type="button" class="label label-warning pointer "  onclick="makeCall('<?php print $each_cost['id']; ?>');">&nbsp;Make a Call</span>
            &nbsp;&nbsp;&nbsp;
            <span title="Click To See Conversion History" type="button" class="label label-info pointer "  onclick="conversion_history('<?php print $each_cost['id']; ?>');">&nbsp;Conversion History</span>

        </td>
        <td>
            <a  onclick="return previewModalContent('<?php print $each_cost['id']; ?>')"><i class="glyphicon glyphicon-edit pointer" title="Edit"></i></a>&nbsp;&nbsp;
            <a href="javascript:void(0);"  onclick="return DeleteCost('schedule_patient/<?php print $each_cost['id']; ?>')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>
        </td>

    </tr>
    <?php $cr++; ?>    
<?php endforeach; ?>