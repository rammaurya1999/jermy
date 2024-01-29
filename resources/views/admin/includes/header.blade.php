<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="shortcut icon" href="{{ asset('public/admin/img/icons/icon-48x48.png') }}" />

    <link rel="canonical" href="{{ Route('admin.dashboard') }}" />

    <title>Admin Jeremy</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <link href="{{ asset('public/admin/img/icons/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/admin/css/light.css') }}">
    <!-- Remove this after purchasing -->
    <script src="{{ asset('public/admin/js/jquery-3.7.1.js') }}"></script>
    <style>
        body {
            opacity: 0;
        }
    </style>
    <!-- END SETTINGS -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-120946860-10', {
            'anonymize_ip': true
        });
    </script>
</head>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class='sidebar-brand' href='{{ Route('admin.dashboard') }}'>
                    <span class="sidebar-brand-text align-middle">
                        Admin
                        {{-- <sup><small class="badge bg-primary text-uppercase"></small></sup> --}}
                    </span>
                    <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24"
                        fill="none" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="square"
                        stroke-linejoin="miter" color="#FFFFFF" style="margin-left: -3px">
                        <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                        <path d="M20 12L12 16L4 12"></path>
                        <path d="M20 16L12 20L4 16"></path>
                    </svg>
                </a>
                <ul class="sidebar-nav">
                    {{-- <li class="sidebar-item active">
                        <a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboards</span>
                        </a>
                        <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item active"><a class='sidebar-link' href='index.html'>Analytics</a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="sidebar-item">
                        <a class='sidebar-link' href='{{ Route('admin.dashboard') }}'>
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">
                                Dashboard</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a data-bs-target="#customer" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">
                                Customers</span>
                        </a>
                        <ul id="customer" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='{{ Route('admin.manage-customer') }}'>Manage
                                    Customers</a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- <li class="sidebar-item">
                        <a href="#serviceProvider" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Service
                                Providers</span>
                        </a>
                        <ul id="serviceProvider" class="sidebar-dropdown list-unstyled collapse "
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='{{ Route('admin.add-services_cat') }}'>Add
                                    Service Category</a>
                            </li>
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='{{ Route('admin.manage_service_cat') }}'>Manage Service
                                    Category</a>
                            </li>
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='{{ Route('admin.add-services') }}'>Add
                                    Services</a></li>
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='{{ Route('admin.manage-service') }}'>Manage
                                    Services </a></li>
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='{{ Route('admin.manage-service-provider') }}'>Manage
                                    Service Provider </a></li>

                        </ul>
                    </li> --}}

                    <li class="sidebar-item">
                        <a data-bs-target="#staff" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manage
                                Staff</span>
                        </a>
                        <ul id="staff" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='{{ Route('admin.manage-staff') }}'>Manage
                                    Staff </a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class='sidebar-link' href='{{ Route('admin.manage-customer') }}'>
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle"> Customers
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class='sidebar-link' href='{{ Route('admin.manage-service') }}'>
                            <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Services
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class='sidebar-link' href='{{ Route('admin.manage-service-provider') }}'>
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Service
                                Provider</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class='sidebar-link' href='{{ Route('admin.manage_service_cat') }}'>
                            <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Service
                                Category</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a class='sidebar-link' href='{{ Route('admin.send-notification') }}'>
                            <i class="align-middle" data-feather="send"></i> <span class="align-middle">Send
                                Notification</span>
                        </a>
                    </li> --}}
                    <li class="sidebar-item">
                        <a class='sidebar-link' href='{{ Route('admin.notification-list') }}'>
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">
                                Notification List</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class='sidebar-link' href='{{ Route('admin.inquiry-list') }}'>
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">
                                Inquires</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a data-bs-target="#icons" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="coffee"></i> <span
                                class="align-middle">Icons</span>
                            <span class="sidebar-badge badge bg-light">1.500+</span>
                        </a>
                        <ul id="icons" class="sidebar-dropdown list-unstyled collapse "
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class='sidebar-link' href='icons-feather.html'>Feather</a>
                            </li>
                            <li class="sidebar-item"><a class='sidebar-link' href='icons-font-awesome.html'>Font
                                    Awesome <span class="sidebar-badge badge bg-primary">Pro</span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#forms" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="check-circle"></i> <span
                                class="align-middle">Forms</span>
                        </a>
                        <ul id="forms" class="sidebar-dropdown list-unstyled collapse "
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class='sidebar-link' href='forms-basic-inputs.html'>Basic
                                    Inputs</a></li>
                            <li class="sidebar-item"><a class='sidebar-link' href='forms-layouts.html'>Form Layouts
                                    <span class="sidebar-badge badge bg-primary">Pro</span></a></li>
                            <li class="sidebar-item"><a class='sidebar-link' href='forms-input-groups.html'>Input
                                    Groups <span class="sidebar-badge badge bg-primary">Pro</span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class='sidebar-link' href='tables-bootstrap.html'>
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">Tables</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Plugins & Addons
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#form-plugins" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Form
                                Plugins</span>
                        </a>
                        <ul id="form-plugins" class="sidebar-dropdown list-unstyled collapse "
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='forms-advanced-inputs.html'>Advanced Inputs <span
                                        class="sidebar-badge badge bg-primary">Pro</span></a></li>
                            <li class="sidebar-item"><a class='sidebar-link' href='forms-editors.html'>Editors <span
                                        class="sidebar-badge badge bg-primary">Pro</span></a></li>
                            <li class="sidebar-item"><a class='sidebar-link' href='forms-validation.html'>Validation
                                    <span class="sidebar-badge badge bg-primary">Pro</span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#datatables" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="list"></i> <span
                                class="align-middle">DataTables</span>
                        </a>
                        <ul id="datatables" class="sidebar-dropdown list-unstyled collapse "
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='tables-datatables-responsive.html'>Responsive Table <span
                                        class="sidebar-badge badge bg-primary">Pro</span></a></li>
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='tables-datatables-buttons.html'>Table with Buttons <span
                                        class="sidebar-badge badge bg-primary">Pro</span></a></li>
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='tables-datatables-column-search.html'>Column Search <span
                                        class="sidebar-badge badge bg-primary">Pro</span></a></li>
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='tables-datatables-fixed-header.html'>Fixed Header <span
                                        class="sidebar-badge badge bg-primary">Pro</span></a></li>
                            <li class="sidebar-item"><a class='sidebar-link'
                                    href='tables-datatables-multi.html'>Multi Selection <span
                                        class="sidebar-badge badge bg-primary">Pro</span></a></li>
                            <li class="sidebar-item"><a class='sidebar-link' href='tables-datatables-ajax.html'>Ajax
                                    Sourced Data <span class="sidebar-badge badge bg-primary">Pro</span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#charts" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span
                                class="align-middle">Charts</span>
                        </a>
                        <ul id="charts" class="sidebar-dropdown list-unstyled collapse "
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class='sidebar-link' href='charts-chartjs.html'>Chart.js</a>
                            </li>
                            <li class="sidebar-item"><a class='sidebar-link' href='charts-apexcharts.html'>ApexCharts
                                    <span class="sidebar-badge badge bg-primary">Pro</span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class='sidebar-link' href='notifications.html'>
                            <i class="align-middle" data-feather="bell"></i> <span
                                class="align-middle">Notifications</span>
                            <span class="sidebar-badge badge bg-primary">Pro</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#maps" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
                        </a>
                        <ul id="maps" class="sidebar-dropdown list-unstyled collapse "
                            data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class='sidebar-link' href='maps-google.html'>Google Maps</a>
                            </li>
                            <li class="sidebar-item"><a class='sidebar-link' href='maps-vector.html'>Vector Maps
                                    <span class="sidebar-badge badge bg-primary">Pro</span></a></li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#multi" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="corner-right-down"></i> <span
                                class="align-middle">Multi Level</span>
                        </a>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a data-bs-target="#multi-2" data-bs-toggle="collapse"
                                    class="sidebar-link collapsed">Two Levels</a>
                                <ul id="multi-2" class="sidebar-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="#">Item 1</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="#">Item 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a data-bs-target="#multi-3" data-bs-toggle="collapse"
                                    class="sidebar-link collapsed">Three Levels</a>
                                <ul id="multi-3" class="sidebar-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a data-bs-target="#multi-3-1" data-bs-toggle="collapse"
                                            class="sidebar-link collapsed">Item 1</a>
                                        <ul id="multi-3-1" class="sidebar-dropdown list-unstyled collapse">
                                            <li class="sidebar-item">
                                                <a class="sidebar-link" href="#">Item 1</a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a class="sidebar-link" href="#">Item 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="#">Item 2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
                {{-- <div class="sidebar-cta">
                    <div class="sidebar-cta-content">
                        <strong class="d-inline-block mb-2">Weekly Sales Report</strong>
                        <div class="mb-3 text-sm">
                            Your weekly sales report is ready for download!
                        </div>

                        <div class="d-grid">
                            <a href="https://adminkit.io/" class="btn btn-outline-primary"
                                target="_blank">Download</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
                {{-- 
                <form class="d-none d-sm-inline-block">
                    <div class="input-group input-group-navbar">
                        <input type="text" class="form-control" placeholder="Search…" aria-label="Search">
                        <button class="btn" type="button">
                            <i class="align-middle" data-feather="search"></i>
                        </button>
                    </div>
                </form> --}}

                {{-- <ul class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item px-2 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="megaDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mega Menu
                        </a>
                        <div class="dropdown-menu dropdown-menu-start dropdown-mega" aria-labelledby="megaDropdown">
                            <div class="d-md-flex align-items-start justify-content-start">
                                <div class="dropdown-mega-list">
                                    <div class="dropdown-header">UI Elements</div>
                                    <a class="dropdown-item" href="#">Alerts</a>
                                    <a class="dropdown-item" href="#">Buttons</a>
                                    <a class="dropdown-item" href="#">Cards</a>
                                    <a class="dropdown-item" href="#">Carousel</a>
                                    <a class="dropdown-item" href="#">General</a>
                                    <a class="dropdown-item" href="#">Grid</a>
                                    <a class="dropdown-item" href="#">Modals</a>
                                    <a class="dropdown-item" href="#">Tabs</a>
                                    <a class="dropdown-item" href="#">Typography</a>
                                </div>
                                <div class="dropdown-mega-list">
                                    <div class="dropdown-header">Forms</div>
                                    <a class="dropdown-item" href="#">Layouts</a>
                                    <a class="dropdown-item" href="#">Basic Inputs</a>
                                    <a class="dropdown-item" href="#">Input Groups</a>
                                    <a class="dropdown-item" href="#">Advanced Inputs</a>
                                    <a class="dropdown-item" href="#">Editors</a>
                                    <a class="dropdown-item" href="#">Validation</a>
                                    <a class="dropdown-item" href="#">Wizard</a>
                                </div>
                                <div class="dropdown-mega-list">
                                    <div class="dropdown-header">Tables</div>
                                    <a class="dropdown-item" href="#">Basic Tables</a>
                                    <a class="dropdown-item" href="#">Responsive Table</a>
                                    <a class="dropdown-item" href="#">Table with Buttons</a>
                                    <a class="dropdown-item" href="#">Column Search</a>
                                    <a class="dropdown-item" href="#">Muulti Selection</a>
                                    <a class="dropdown-item" href="#">Ajax Sourced Data</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Resources
                        </a>
                        <div class="dropdown-menu" aria-labelledby="resourcesDropdown">
                            <a class="dropdown-item" href="https://adminkit.io/" target="_blank"><i
                                    class="align-middle me-1" data-feather="home"></i>
                                Homepage</a>
                            <a class="dropdown-item" href="https://adminkit.io/docs/" target="_blank"><i
                                    class="align-middle me-1" data-feather="book-open"></i>
                                Documentation</a>
                            <a class="dropdown-item" href="https://adminkit.io/docs/getting-started/changelog/"
                                target="_blank"><i class="align-middle me-1" data-feather="edit"></i> Changelog</a>
                        </div>
                    </li>
                </ul> --}}

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown"
                                data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="bell"></i>
                                    <span class="indicator">4</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                                aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    4 New Notifications
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-danger" data-feather="alert-circle"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Update completed</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the
                                                    update.</div>
                                                <div class="text-muted small mt-1">30m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-warning" data-feather="bell"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Lorem ipsum</div>
                                                <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate
                                                    hendrerit et.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-primary" data-feather="home"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Login from 192.186.1.8</div>
                                                <div class="text-muted small mt-1">5h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-success" data-feather="user-plus"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">New connection</div>
                                                <div class="text-muted small mt-1">Christina accepted your request.
                                                </div>
                                                <div class="text-muted small mt-1">14h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown"
                                data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="message-square"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                                aria-labelledby="messagesDropdown">
                                <div class="dropdown-menu-header">
                                    <div class="position-relative">
                                        4 New Messages
                                    </div>
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-5.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Vanessa Tucker</div>
                                                <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis
                                                    arcu tortor.</div>
                                                <div class="text-muted small mt-1">15m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-2.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="William Harris">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">William Harris</div>
                                                <div class="text-muted small mt-1">Curabitur ligula sapien euismod
                                                    vitae.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-4.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Christina Mason">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Christina Mason</div>
                                                <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.
                                                </div>
                                                <div class="text-muted small mt-1">4h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-3.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Sharon Lessman</div>
                                                <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed,
                                                    posuere ac, mattis non.</div>
                                                <div class="text-muted small mt-1">5h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all messages</a>
                                </div>
                            </div>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="maximize"></i>
                                </div>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-flag dropdown-toggle" href="#" id="languageDropdown"
                                data-bs-toggle="dropdown">
                                <img src="img/flags/us.png" alt="English" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown"
                                onchange="langs();">

                                <a class="dropdown-item" href="javascript:void(0);">
                                    <img src="img/flags/us.png" alt="English" width="20"
                                        class="align-middle me-1" />
                                    <span class="align-middle"></span>

                                </a>
                            </div>
                        </li> --}}
                        @php
                            $adminData = App\Models\Admin::find(Session::get('admin_id'));
                        @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                @if ($adminData->img == null)
                                    <img src="{{ asset('public/admin/img/avatars/profile.svg') }}"
                                        class="avatar img-fluid rounded" alt="profile" />
                                @else
                                    <img src="{{ asset('public/upload/admin/' . $adminData->img) }}"
                                        class="avatar img-fluid rounded" alt="profile" />
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class='dropdown-item' href='{{ Route('admin.profile') }}'><i
                                        class="align-middle me-1" data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="{{ Route('admin.changePassword') }}"><i
                                        class="align-middle me-1" data-feather="pie-chart"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ Route('admin.logout') }}">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
