<?= $this->extend('IDGdashboard\Views\Templates\default\layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12">

        <?= $crud_container ?>

    </div>
</div>

<?= $this->endSection() ?>