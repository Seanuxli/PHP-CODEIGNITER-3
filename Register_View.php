<!DOCTYPE html>
<html lang="en">
<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/Register.css'); ?>">
    <script src="<?php echo base_url('assets/js/Register_View.js'); ?>"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <title>SLAPSHOP REGISTER</title>

</head>
<body>
    <div class="container">
        <div class="row main">
            <div class="main-login main-center">
                <h5>Horns Up Metalheads!!</h5>

                <?php if(validation_errors()): ?>
                    <div class="alert alert-danger">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <?php echo form_open('Reg_Log_Control/Register_User'); ?>

                <div class="form-group">
                    <label for="Full_Name" class="cols-sm-2 control-label">Full Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="Full_Name" id="Full_Name" placeholder="Enter your Full Name" value="<?= set_value('Full_Name'); ?>" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Phone_Number" class="cols-sm-2 control-label">Phone Number</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="tel" class="form-control" name="Phone_Number" id="Phone_Number" placeholder="+639XXXXXXXXX" pattern="^(09\d{9}|\+639\d{9})$" maxlength="13" value="<?= set_value('Phone_Number'); ?>" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Email_Address" class="cols-sm-2 control-label">Email Address</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" name="Email_Address" id="Email_Address" placeholder="Enter your Email" value="<?= set_value('Email_Address'); ?>" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Address" class="cols-sm-2 control-label">Address</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <textarea class="form-control" name="Address" id="Address" placeholder="Enter your Address" rows="3" required><?= set_value('Address'); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Birth_Date" class="cols-sm-2 control-label">Birth Date</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" name="Birth_Date" id="Birth_Date" 
                                   value="<?= set_value('Birth_Date'); ?>" placeholder="Select your birth date" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        flatpickr("#Birth_Date", {
            dateFormat: "Y-m-d",
            maxDate: "today",
            defaultDate: "<?= set_value('Birth_Date'); ?>",
            altInput: true,
            altFormat: "F j, Y"
        });

        <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: '🎉 Success!',
            html: '<strong><?= $this->session->flashdata("success"); ?></strong>',
            confirmButtonText: 'OK',
            customClass: { popup: 'swal-wide' }
        });
        <?php elseif ($this->session->flashdata('error')): ?>
        Swal.fire({
            icon: 'error',
            title: '⚠️ Error!',
            html: '<strong><?= $this->session->flashdata("error"); ?></strong>',
            confirmButtonText: 'OK',
            customClass: { popup: 'swal-wide' }
        });
        <?php elseif ($this->session->flashdata('verified_email')): ?>
        Swal.fire({
            icon: 'info',
            title: '📧 Already Verified',
            html: '<strong><?= $this->session->flashdata("verified_email"); ?></strong>',
            confirmButtonText: 'OK',
            customClass: { popup: 'swal-wide' }
        });
        <?php endif; ?>
    </script>
</body>
</html>
