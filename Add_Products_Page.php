<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/Add_Product_Page.css'); ?>">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-5">
    <div class="add-product-container">
        <h2 class="text-center mb-4">List New Product</h2>
        <form action="<?= base_url('Admin_Control/Add_Product'); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="NAME">Product Label:</label>
                <input type="text" name="NAME" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="DESCRIPTION">Description:</label>
                <textarea name="DESCRIPTION" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="CATEGORY">Product Category:</label>
                <select name="CATEGORY" class="form-control">
                    <option value="SHIRT">SHIRT</option>
                    <option value="HOODIE">HOODIE</option>
                    <option value="PATCHES">PATCHES</option>
                </select>
            </div>

            <div class="form-group">
                <label for="SKU">STOCK KEEPING UNIT:</label>
                <select name="SKU" class="form-control">
                    <option value="SHIRT-BLK-L">SHIRT-BLACK-LARGE</option>
                    <option value="SHIRT-BLK-M">SHIRT-BLACK-MEDIUM</option>
                    <option value="SHIRT-BLK-S">SHIRT-BLACK-SMALL</option>
                    <option value="SHIRT-WHT-L">SHIRT-WHITE-LARGE</option>
                    <option value="HOODIE-DL-L">HOODIE-DARK LAVENDER-LARGE</option>
                    <option value="HOODIE-BLK-L">HOODIE-BLACK-LARGE</option>
                    <option value="HOODIE-BLK-M">HOODIE-BLACK-MEDIUM</option>
                    <option value="HOODIE-BLK-S">HOODIE-BLACK-SMALL</option>
                </select>
            </div>


            <div class="form-group">
                <label for="STOCK_QUANT">Stock Quantity:</label>
                <input type="number" name="STOCK_QUANT" class="form-control" min="0">
            </div>

            <div class="form-group">
                <label for="PRICE">Price:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                    </div>
                    <input type="number" name="PRICE" class="form-control" step="0.01" required>
                </div>
            </div>

            <div class="form-group">
                <label for="IMAGE">Product Image:</label>
                <input type="file" name="IMAGE" id="IMAGE" class="form-control">
            </div>

            <div class="form-group">
                <label for="STATUS">Status:</label>
                <select name="STATUS" class="form-control">
                    <option value="Unreleased">Unreleased</option>
                    <option value="In-Stock">In Stock</option>
                    <option value="Out-Stock">Out Of Stock</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Add Product</button>
                <a href="<?= base_url('Admin_Control/Admin_Page'); ?>" class="btn btn-default">Back</a>
            </div>

        </form>
    </div>
</div>

<?php if ($this->session->flashdata('success')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?= $this->session->flashdata('success'); ?>',
        showConfirmButton: false,
        timer: 2000
    });
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '<?= $this->session->flashdata('error'); ?>'
    });
</script>
<?php endif; ?>

</body>
</html>
