<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unreleased Hoodies</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/Unreleased_Products.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-5">
    <div class="unreleased container">
        <h2 class="text-center mb-4">UNRELEASED HOODIES</h2>
    </div>

    <?php if (!empty($unreleased_hoodies)) : ?>
        <?php foreach ($unreleased_hoodies as $hoodie) : ?>
            <div class="card mb-4 shadow-sm rounded-lg">
                <div class="row no-gutters align-items-center p-3">
                   
                    <div class="col-md-2 text-center">
                        <div style="width: 100%; height: 150px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                            <img 
                                src="<?= base_url('uploads/' . $hoodie->IMAGE); ?>" 
                                alt="Product Image" 
                                class="img-fluid zoomable-image" 
                                data-zoom-image="<?= base_url('uploads/' . $hoodie->IMAGE); ?>"
                            >
                        </div>
                    </div>

                    <div class="col-md-7 pl-4">
                        <h5 class="mb-1 font-weight-bold"><?= htmlspecialchars($hoodie->NAME); ?></h5>
                        <p class="mb-1 text-muted"><?= htmlspecialchars($hoodie->DESCRIPTION); ?></p>
                        <p class="mb-0 text-success font-weight-bold">₱<?= number_format($hoodie->PRICE, 2); ?></p>
                        <div class="sku-text">SKU: <?= !empty($hoodie->SKU) ? htmlspecialchars($hoodie->SKU) : 'Not Available'; ?></div>

                        <span class="badge badge-info mt-1"><?= htmlspecialchars($hoodie->CATEGORY); ?></span>
                        <span class="badge badge-secondary mt-1"><?= htmlspecialchars($hoodie->STATUS); ?></span>
                        <small class="text-muted d-block mt-1">PUBLISH: <?= htmlspecialchars($hoodie->CREATED_AT); ?></small>
                    </div>

                    <div class="col-md-3 text-right">
                        <form id="removeForm<?= $hoodie->ID; ?>" action="<?= base_url('Admin_Control/Remove_Product'); ?>" method="post" class="d-inline-block mb-1">
                            <input type="hidden" name="ID" value="<?= $hoodie->ID; ?>">
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmRemove(<?= $hoodie->ID; ?>)">Remove</button>
                        </form>

                        <form id="releaseForm<?= $hoodie->ID; ?>" action="<?= base_url('Admin_Control/Release_Product'); ?>" method="post" class="d-inline-block">
                            <input type="hidden" name="ID" value="<?= $hoodie->ID; ?>">
                            <button type="button" class="btn btn-success btn-sm" onclick="confirmRelease(<?= $hoodie->ID; ?>)">Launch</button>
                        </form>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="alert alert-info text-center">No unreleased products found.</div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>
<script src="<?= base_url('assets/js/Unreleased_Prods.js'); ?>"></script>

<script>
    function confirmRemove(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This will remove the product permanently.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, remove it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('removeForm' + id).submit();
            }
        });
    }

    function confirmRelease(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This will release the product.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, release it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('releaseForm' + id).submit();
            }
        });
    }
</script>

</body>
</html>
