<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('_partials/header') ?>

<body>
    <div class="container-scroller">
        <?php $this->load->view('_partials/navbar') ?>
        

        <?php $this->load->view('_partials/sidebar') ?>
        <?php $this->load->view($content); ?>
        <?php $this->load->view('_partials/footer') ?>
        </main>
    </div>

    <?php $this->load->view('_partials/modal') ?>

    <?php $this->load->view('_partials/js') ?>

    <?php $this->load->view('_partials/ajax') ?>

</body>

</html>