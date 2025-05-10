<!DOCTYPE html>
<html lang="en">
<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/Verif_Form.css'); ?>">
    <title>EMAIL VERIFICATION</title>

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Enter Your Verification Code</h2>

    <?php echo form_open('Reg_Log_Control/Verif_User'); ?>
        <div class="form-group">
            <label for="Verification_Code" class="cols-sm-2 control-label">Verification Code</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-key fa-lg" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="form-control" name="Verification_Code" id="Verification_Code"
                        placeholder="Enter your 6-digit Code"
                        pattern="^\d{6}$"
                        maxlength="6"
                        required />
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
<?php if ($this->session->flashdata('success')): ?>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '<?= $this->session->flashdata("success"); ?>',
        confirmButtonText: 'OK'
    });
<?php elseif ($this->session->flashdata('error')): ?>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?= $this->session->flashdata("error"); ?>',
        confirmButtonText: 'OK'
    });
<?php elseif ($this->session->flashdata('verified_email')): ?>
    Swal.fire({
        icon: 'info',
        title: 'Already Verified',
        text: '<?= $this->session->flashdata("verified_email"); ?>',
        confirmButtonText: 'OK'
    });
<?php endif; ?>
</script>

</body>
</html>