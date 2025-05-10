<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metalheads Shop | Band Merch & Accessories</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/Homepage.css'); ?>">
</head>
<body>

    <header>SLAPSHOP PHILIPPINES</header>

    <nav>
        <a href="#">Home</a>
        <a href="Homepage_Control/Apparel_Page">Apparel</a>
        <a href="#">Accessories</a>
        <a href="#">Bands</a>
        <a href="#">Music</a>
        <a href="#">Pre Order</a>
    </nav>

    <div class="banner">Welcome to SLAPSHOP Store!</div>

    <section class="products">

        <div class="product">
            <img src="<?php echo base_url('assets/images/Deicide_Front_Shirt.jpg'); ?>" alt="Band T-Shirt">
            <p>₱1,200.00</p>
            <p>Deicide | DEICIDE Band T-Shirt</p>
        </div>
    
        <div class="product">
            <img src="<?php echo base_url('assets/images/Archspire_Biomech_Shirt.jpg'); ?>" alt="Band T-Shirt">
            <p>₱1,200.00</p>
            <p>Archspire | BIOMECH Band T-Shirt</p>
        </div>
    
        <div class="product">
            <img src="<?php echo base_url('assets/images/Cannibal_Corpse_Shirt.jpg'); ?>" alt="Band T-Shirt">
            <p>₱1,200.00</p>
            <p>Cannibal Corpse | Chaos Horrific Band T-Shirt</p>
        </div>

        <div class="product">
            <img src="<?php echo base_url('assets/images/Cryptopsy_Whisper_Supremacy_Shirt.jpg'); ?>" alt="Band T-Shirt">
            <p>₱1,200.00</p>
            <p>Cryptopsy | Whisper Supremacy Band T-Shirt</p>
        </div>

        <div class="product">
            <img src="<?php echo base_url('assets/images/Possessed_Total_Possessed_Shirt.jpg'); ?>" alt="Band T-Shirt">
            <p>₱1,200.00</p>
            <p>Possessed | Total Possessed Band T-Shirt</p>
        </div>
    
    </section>

    <section class="products">

        <div class="product">
        <img src="<?php echo base_url('assets/images/Deicide_Front.jpg'); ?>" alt="Band Hoodie">
            <p>₱2,000.00</p>
            <p>Deicide | DEICIDE Band Hoodie</p>
        </div>

        <div class="product">
            <img src="<?php echo base_url('assets/images/Deicide_Front.jpg'); ?>" alt="Band Hoodie">
            <p>₱2,000.00</p>
            <p>Deicide | DEICIDE Band Hoodie</p>
        </div>
        
        <div class="product">
            <img src="<?php echo base_url('assets/images/Deicide_Front.jpg'); ?>" alt="Band Hoodie">
            <p>₱2,000.00</p>
            <p>Deicide | DEICIDE Band Hoodie</p>
        </div>

        <div class="product">
            <img src="<?php echo base_url('assets/images/Deicide_Front.jpg'); ?>" alt="Band Hoodie">
            <p>₱2,000.00</p>
            <p>Deicide | DEICIDE Band Hoodie</p>
        </div>

        <div class="product">
            <img src="<?php echo base_url('assets/images/Deicide_Front.jpg'); ?>" alt="Band Hoodie">
            <p>₱2,000.00</p>
            <p>Deicide | DEICIDE Band Hoodie</p>
        </div>

    </section>

    <section class = "products">

        <div class="product">
        <img src="<?php echo base_url('assets/images/Deicide_Patch.jpg'); ?>" alt="Band Patch">
            <p>Embroidered Band Patch</p>
            <p>₱10.00</p>
        </div>

        <div class="product">
            <img src="<?php echo base_url('assets/images/Deicide_Patch.jpg'); ?>" alt="Band Patch">
            <p>Embroidered Band Patch</p>
            <p>₱10.00</p>
        </div>
        
        <div class="product">
            <img src="<?php echo base_url('assets/images/Deicide_Patch.jpg'); ?>" alt="Band Patch">
            <p>Embroidered Band Patch</p>
            <p>₱10.00</p>
        </div>

        <div class="product">
            <img src="<?php echo base_url('assets/images/Deicide_Patch.jpg'); ?>" alt="Band Patch">
            <p>Embroidered Band Patch</p>
            <p>₱10.00</p>
        </div>

        <div class="product">
            <img src="<?php echo base_url('assets/images/Deicide_Patch.jpg'); ?>" alt="Band Patch">
            <p>Embroidered Band Patch</p>
            <p>₱10.00</p>
        </div>

    </section>
    
    <footer>&copy; 2025 Metalheads Shop | Stay Heavy 🤘</footer>

    <?php if ($this->session->flashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $this->session->flashdata('error') ?>'
        });
    </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?= $this->session->flashdata('success') ?>'
        });
    </script>
    <?php endif; ?>

</body>
</html>