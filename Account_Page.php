<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCOUNTS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/Account_Page.css'); ?>">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h1>ACCOUNT DETAILS</h1>
            </div>

            <div class="card-body">
                <?php if ($this->session->flashdata()): ?>
                    <div class="alert alert-dismissible fade show mt-3 
                        <?php echo $this->session->flashdata('ban_success') ? 'alert-success' : 
                                      ($this->session->flashdata('ban_error') ? 'alert-danger' : 
                                      ($this->session->flashdata('unban_success') ? 'alert-success' : 
                                      ($this->session->flashdata('unban_error') ? 'alert-danger' : ''))); ?>">
                        <?php 
                            echo $this->session->flashdata('ban_success') ?: 
                                 $this->session->flashdata('ban_error') ?: 
                                 $this->session->flashdata('unban_success') ?: 
                                 $this->session->flashdata('unban_error'); 
                        ?>
                    </div>
                <?php endif; ?>

                <div class="search-box mb-4">
                    <form method="get" action="">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search by name, email, or ID...">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="submit">
                                    <span class="glyphicon glyphicon-search"></span> Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Profile</th>
                            <th>Full Name</th>
                            <th>Phone Number</th>
                            <th>Email Address</th>
                            <th>Address</th>
                            <th>Birth Date</th>
                            <th>Verification Code</th>
                            <th>Verified</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($items)) : ?>
                            <?php foreach ($items as $item) : ?>
                                <tr>
                                    <td><?php echo $item['ID']; ?></td>
                                    <td>
                                        <?php if (!empty($item['Profile_Image']) && file_exists(FCPATH . 'uploads/profile_images/' . $item['Profile_Image'])): ?>
                                            <img src="<?php echo base_url('uploads/profile_images/' . $item['Profile_Image']); ?>" alt="Profile Image" width="60" height="60" class="rounded-circle">
                                        <?php else: ?>
                                            <img src="<?php echo base_url('assets/img/default-user.png'); ?>" alt="No Image" width="60" height="60" class="rounded-circle">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $item['Full_Name']; ?></td>
                                    <td><?php echo $item['Phone_Number']; ?></td>
                                    <td><?php echo $item['Email_Address']; ?></td>
                                    <td><?php echo $item['Address']; ?></td>
                                    <td><?php echo $item['Birth_Date']; ?></td>
                                    <td><?php echo $item['Verification_Code']; ?></td>
                                    <td>
                                        <?php echo ($item['Verified']) ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-secondary">No</span>'; ?>
                                    </td>
                                    <td>
                                        <?php echo ($item['Banned'] == 1) 
                                            ? '<span class="badge badge-danger">Banned</span>' 
                                            : '<span class="badge badge-success">Active</span>'; ?>
                                    </td>
                                    <td>
                                    <div class="btn-group">

                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $item['ID']; ?>)">Delete</button>

                                            <form id="deleteForm-<?php echo $item['ID']; ?>" action="<?php echo base_url('Admin_Control/Delete_Account'); ?>" method="post" style="display: none;">
                                                <input type="hidden" name="ID" value="<?php echo $item['ID']; ?>">
                                            </form>

                                            <?php if ($item['Banned'] == 0): ?>
                                                <button type="button" class="btn btn-warning btn-sm" onclick="confirmBan(<?php echo $item['ID']; ?>)">Ban</button>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-success btn-sm" onclick="confirmUnban(<?php echo $item['ID']; ?>)">Unban</button>
                                            <?php endif; ?>

                                            <form action="<?php echo base_url('Admin_Control/Verify_Account'); ?>" method="post" style="display:inline;">
                                                <input type="hidden" name="ID" value="<?php echo $item['ID']; ?>">
                                                <button type="submit" class="btn btn-primary btn-sm">Verify</button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="11" class="text-center">No accounts found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.all.min.js"></script>

    <script>
        const BASE_URL = "<?php echo base_url(); ?>";
    </script>

    <?php if ($this->session->flashdata('success')): ?>
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Deleted!',
            text: '<?= $this->session->flashdata('success'); ?>',
            confirmButtonColor: '#3085d6'
        });
        </script>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= $this->session->flashdata('error'); ?>',
            confirmButtonColor: '#d33'
        });
        </script>
        <?php endif; ?>

    <script src="<?php echo base_url('assets/js/Account_Page_SWAL.js'); ?>"></script>
    
</body>
</html>