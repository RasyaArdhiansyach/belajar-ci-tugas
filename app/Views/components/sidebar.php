<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Home Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="keranjang">
                <i class="bi bi-cart-check"></i>
                <span>Keranjang</span>
            </a>
        </li><!-- End Keranjang Nav --> 

        <?php if (session()->get('role') == 'admin') : ?>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'produk') ? '' : 'collapsed' ?>" href="<?= base_url('produk') ?>">
                <i class="bi bi-receipt"></i>
                <span>Produk</span>
            </a>
        </li><!-- End Produk Nav -->

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'discount') ? '' : 'collapsed' ?>" href="<?= base_url('discount') ?>">
                <i class="bi bi-percent"></i>
                <span>Diskon</span>
            </a>
        </li><!-- End Diskon Nav -->

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'pembelian') ? '' : 'collapsed' ?>" href="<?= base_url('pembelian') ?>">
                <i class="bi bi-cart-check"></i>
                <span>Pembelian</span>
            </a><!-- End Pembelian Nav -->
        </li>
        <?php endif; ?>

        <?php
        
        ?>

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'history') ? "" : "collapsed" ?>" href="history">
                <i class="bi bi-person"></i>
                <span>History</span>
            </a>
        </li><!-- End History Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="contact">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Produk Nav -->
    </ul>

</aside><!-- End Sidebar-->