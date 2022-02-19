<form action="" method="post" id="studentEdit" name="savestudent">
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

    <div class="mb-3">
        <label class="mb-2 text-muted" for="name">Student ID</label>
        <input id="stdid" type="stdid" class="form-control" name="stdid" value="<?php echo $row['stdid'] ?>" autofocus>
        <div class="stdidError invalid-feedback">

        </div>
    </div>

    <div class="mb-3">
        <label class="mb-2 text-muted" for="name">Name</label>
        <input id="name" type="name" class="form-control" name="name" value="<?php echo $row['name'] ?>" autofocus>
        <div class="nameError invalid-feedback">

        </div>
    </div>

    <div class="mb-3">
        <label class="mb-2 text-muted" for="email">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
        <div class="emailError invalid-feedback">

        </div>
    </div>

    <div class="mb-3">
        <label class="mb-2 text-muted" for="phone">Phone</label>
        <input id="phone" type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>">
        <div class="phoneError invalid-feedback">

        </div>
    </div>

    <div class="mb-3">
        <label class="mb-2 text-muted" for="birthday">Date of Birth</label>
        <input id="birthday" type="date" class="form-control" name="birthday" value="<?php echo $row['dob'] ?>">
        <div class="birthdayError invalid-feedback">

        </div>
    </div>

    <div class="mb-3">
        <label class="mb-2 text-muted" for="address">Address</label>
        <input id="address" type="address" class="form-control" name="address" value="<?php echo $row['address'] ?>">
        <div class="addressError invalid-feedback">

        </div>
    </div>

    <div class="form-group">
        <label class="mb-2 text-muted" for="subject">Subject</label>
        <select name="subject" type="text" id="subject" class="form-control">
            <!-- <option value="<?php echo $row['subject'];?>"></option> -->
            <?php if (!empty($subject)) {
                foreach ($subject as $row) {
            ?>
                    <?php $data['row'] = $row; ?>
                    <option value="<?php echo $row['subject'];?>">
                    <?php
                    echo $row['subject'];
                }
            } else { ?>
                    <tr>
                        <td>record Not Found</td>
                    </tr>
                <?php } ?>
                    </option>
        </select>
    </div>

    <br>
    <div class="form-group">
        <label class="mb-2 text-muted" for="campus">Campus</label>
        <select name="campus" type="text" id="campus" class="form-control">
            <!-- <option value="<?php echo $row['campus'];?>"></option> -->
            <?php if (!empty($campus)) {
                foreach ($campus as $row) {
            ?>
                    <?php $data['row'] = $row; ?>
                    <option value="<?php echo $row['campus'];?>">
                    <?php
                    echo $row['campus'];
                }
            } else { ?>
                    <tr>
                        <td>record Not Found</td>
                    </tr>
                <?php } ?>
                    </option>
        </select>
    </div>
    <br>

    <div class="d-flex align-items-center">
        <button type="submit" class="btn btn-primary ms-auto">
            Add Student
        </button>
    </div>
</form>