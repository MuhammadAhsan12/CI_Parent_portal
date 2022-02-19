<tr id="row-<?php echo $row['id'] ?>">
    <td class="modelId"><?php echo $row['id'] ?></td>
    <td class="modeStdid"><?php echo $row['stdid'] ?></td>
    <td class="modelName"><?php echo $row['name'] ?></td>
    <td class="modelEmail"><?php echo $row['email'] ?></td>
    <td class="phoneEmail"><?php echo $row['phone'] ?></td>
    <td class="dobEmail"><?php echo $row['dob'] ?></td>
    <td class="addressEmail"><?php echo $row['address'] ?></td>
    <td class="modelSubject"><?php echo $row['subject'] ?></td>
    <td class="modelCampus"><?php echo $row['campus'] ?></td>
    <td class="modelId"><?php echo $row['created_at'] ?></td>
    <td><a href="javascript:void(0);" onclick="editForm(<?php echo $row['id'] ?>)" class="btn btn-primary">Edit</a></td>
    <td><a href="javascript:void(0);" onClick="confirm_delete(<?php echo $row['id'] ?>)" class="btn btn-danger">Delete</a></td>
</tr>


