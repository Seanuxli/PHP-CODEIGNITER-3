<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/css/Admin_Dashboard.css'); ?>">

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="<?= base_url('assets/js/Admin_Dashboard.js'); ?>"></script>
</head>

<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url('Admin_Control/Admin_Page'); ?>">
                <img src="<?= base_url('assets/images/SLAPSHOP_LOGO.jpg'); ?>" alt="LOGO" style="max-height: 50px;">
            </a>
        </div>

        <ul class="nav navbar-right top-nav">
            <li>
            <a href="<?= base_url('Admin_Control/Stats'); ?>" data-placement="bottom" data-toggle="tooltip" title="Stats">
                <i class="fa fa-bar-chart-o"></i>
                </a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    Admin User <b class="fa fa-angle-down"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('Admin_Control/Profile'); ?>"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="<?= base_url('Admin_Control/Change_Password'); ?>"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="<?= base_url('Admin_Control/Logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
        <li>
            <a data-toggle="collapse" data-target="#submenu-1">
                <i class="fa fa-fw fa-check-circle"></i> RELEASED <i class="fa fa-fw fa-angle-down pull-right"></i>
            </a>
            <ul id="submenu-1" class="collapse">
                <li><a href="<?= base_url('Admin_Control/Released_Shirt'); ?>"><i class="fa fa-angle-double-right"></i> SHIRTS</a></li>
                <li><a href="<?= base_url('Admin_Control/Released_Hoodie'); ?>"><i class="fa fa-angle-double-right"></i> HOODIES</a></li>
                <li><a href="<?= base_url('Admin_Control/Released_Patch'); ?>"><i class="fa fa-angle-double-right"></i> PATCHES</a></li>
            </ul>
        </li>
            <li>
            <a data-toggle="collapse" data-target="#submenu-2">
                <i class="fa fa-fw fa-ban"></i> UNRELEASED <i class="fa fa-fw fa-angle-down pull-right"></i>
            </a>
            <ul id="submenu-2" class="collapse">
                <li><a href="<?= base_url('Admin_Control/Unreleased_Shirt'); ?>"><i class="fa fa-angle-double-right"></i> SHIRTS</a></li>
                <li><a href="<?= base_url('Admin_Control/Unreleased_Hoodie'); ?>"><i class="fa fa-angle-double-right"></i> HOODIES</a></li>
                <li><a href="<?= base_url('Admin_Control/Unreleased_Patches'); ?>"><i class="fa fa-angle-double-right"></i> PATCHES</a></li>
            </ul>
        </li>
                <li><a href="<?= base_url('Admin_Control/Accounts'); ?>"><i class="fa fa-fw fa-user-plus"></i> USER ACCOUNT</a></li>
                <li><a href="<?= base_url('Admin_Control/Reports'); ?>"><i class="fa fa-fw fa-paper-plane-o"></i> REPORTS</a></li>
                <li><a href="<?= base_url('Admin_Control/Products'); ?>"><i class="fa fa-fw fa-plus-circle"></i> ADD PRODUCT</a></li>
            </ul>
    </div>

    </nav>

    <div id="page-wrapper"> 
    <div class="container-fluid">

        <div class="row" id="main">
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Welcome Admin!</h1>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-3">
                <div class="card-counter primary">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="count-numbers"><?= $released_count ?></span>
                    <span class="count-name">Released Products</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter danger">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="count-numbers"><?= $unreleased_count ?></span>
                    <span class="count-name">Unreleased Products</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter success">
                    <i class="fa fa-user"></i>
                    <span class="count-numbers"><?= $admin_count ?></span>
                    <span class="count-name">Administrator</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter info">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers"><?= $user_count ?></span>
                    <span class="count-name">Users</span>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</body>
</html>
