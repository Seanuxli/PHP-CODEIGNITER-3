<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="<?= base_url('assets/css/Statistics_Page.css'); ?>">

<div class="container-fluid mt-4 stats-page">
    <h2 class="mb-4">📊 Stats Overview</h2>
<title> STATISTICS </title> 

    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card stats-card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-dollar-sign"></i> Total Sales</h5>
                    <p class="card-text h4">₱0</p>
                    <small>This Month</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card stats-card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Orders</h5>
                    <p class="card-text h4">0</p>
                    <small>Completed Orders</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card stats-card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-users"></i> Customers</h5>
                    <p class="card-text h4">0</p>
                    <small>Total Registered</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card stats-card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-box-open"></i> Low Stock</h5>
                    <p class="card-text h4">0</p>
                    <small>Products</small>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Sales Trend</h5>
        </div>
        <div class="card-body">
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="<?= base_url('assets/js/Statistics.js'); ?>"></script>
