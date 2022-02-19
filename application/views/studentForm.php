<form action="" method="post" id="studentRegester" name="savestudent">

    <div class="mb-3">
        <label class="mb-2 text-muted" for="name">Student ID</label>
        <input id="stdid" type="stdid" class="form-control" name="stdid" value="" autofocus>
        <div class="stdidError invalid-feedback">

        </div>
    </div>

    <div class="mb-3">
        <label class="mb-2 text-muted" for="name">Name</label>
        <input id="name" type="name" class="form-control" name="name" value="">
        <div class="nameError invalid-feedback">

        </div>
    </div>

    <div class="mb-3">
        <label class="mb-2 text-muted" for="email">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="">
        <div class="emailError invalid-feedback">

        </div>
    </div>

    <div class="mb-3">
        <label class="mb-2 text-muted" for="phone">Phone</label>
        <input id="phone" type="text" class="form-control" name="phone" value="">
        <div class="phoneError invalid-feedback">

        </div>
    </div>

    <div class="mb-3">
        <label class="mb-2 text-muted" for="birthday">Date of Birth</label>
        <input id="birthday" type="date" class="form-control" name="birthday" value="">
        <div class="birthdayError invalid-feedback">

        </div>
    </div>

    <div class="mb-3">
        <label class="mb-2 text-muted" for="address">Address</label>
        <input id="address" type="address" class="form-control" name="address" value="">
        <div class="addressError invalid-feedback">

        </div>
    </div>

    <div class="form-group">
        <label class="mb-2 text-muted" for="subject">Subject</label>
        <select name="subject" type="text" id="subject" class="form-control">
            <option value=""></option>
            <?php if (!empty($subject)) {
                foreach ($subject as $row) {
            ?>
                    <?php $data['row'] = $row; ?>
                    <option value="<?php echo $row['subject']; ?>">
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
            <option value=""></option>
            <?php if (!empty($campus)) {
                foreach ($campus as $row) {
            ?>
                    <?php $data['row'] = $row; ?>
                    <option value="<?php echo $row['campus']; ?>">
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