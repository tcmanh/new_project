<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="<?= base_url() ?>" />
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Veterinary</title>
    <link href="<?php echo base_url('resources/images/favicon.png'); ?>" rel="shortcut icon" type="image/x-icon" />

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?= base_url() ?>resources/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="<?= base_url() ?>resources/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="<?= base_url() ?>resources/css/style.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>resources/css/sb-admin.css" rel="stylesheet">
    <link href="<?= base_url() ?>resources/vendor/toastr-master/build/toastr.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>resources/vendor/select2/select2.min.css" rel="stylesheet">


    <script src="<?= base_url() ?>resources/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>resources/vendor/angularjs/angularjs.min.js"></script>
    <script src="<?= base_url() ?>resources/vendor/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>resources/vendor/toastr-master/build/toastr.min.js"></script>
    <script src="<?= base_url() ?>resources/vendor/select2/select2.min.js"></script>


    <script>
        var base_url = <?= '"' . base_url() . '"'; ?>
    </script>
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="sidebar-nav navbar-nav">
                <?php foreach ($menu as $parent => $parent_params) : ?>
                    <?php if (empty($page_auth[$parent_params['url']]) || $this->ion_auth->in_group($page_auth[$parent_params['url']])) : ?>
                        <?php if (empty($parent_params['children'])) : ?>
                            <?php $active = ($current_uri == $parent);  ?>
                            <li class='<?php if ($active) echo 'active'; ?> nav-item'>
                                <a href='<?php echo $parent_params['url']; ?>' class="nav-link">
                                    <i class='<?php echo $parent_params['icon']; ?>'></i> <?php echo $parent_params['name']; ?>
                                </a>
                            </li>
                        <?php else : ?>
                            <?php $parent_active = ($current_uri == $parent || $ctrler == $parent); ?>
                            <li class='treeview <?php if ($parent_active) echo 'active'; ?> nav-item'>
                                <a class="nav-link nav-link-collapse   <?php if (!$parent_active) echo 'collapsed'; ?>" data-toggle="collapse" href="#collapseComponents<?php echo $parent ?>" aria-expanded="<?php echo $parent_active == 1 ? 'true' : 'false' ?>">
                                    <i class='<?php echo $parent_params['icon']; ?>'></i>
                                    <span><?php echo $parent_params['name']; ?></span>
                                </a>
                                <ul class='treeview-menu sidebar-second-level collapse <?php if ($parent_active) echo 'show'; ?>' id="collapseComponents<?php echo $parent ?>" aria-expanded="<?php echo $parent_active == 1 ? 'true' : 'false' ?>">
                                    <?php foreach ($parent_params['children'] as $name => $url) : ?>
                                        <?php if (empty($page_auth[$url]) || $this->ion_auth->in_group($page_auth[$url])) : ?>
                                            <?php $child_active = ($current_uri == $url); ?>
                                            <li <?php if ($child_active) echo 'class="active"'; ?>>
                                                <a href='<?php echo $url; ?>' class="child"><i class='fa fa-circle-o'></i> <?php echo $name ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>logout"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper py-3">

        <div class="container-fluid">