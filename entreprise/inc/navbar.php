<nav id="sidebar" class="sidebar">
    <a class="sidebar-brand" href="dashboard.php">
		<?php
         echo $_SESSION['nomUser'];
		?>
    </a>
    <div class="sidebar-content">
        <div class="sidebar-user">
			<!--
            <img src="img/avatars/avatar.jpg" class="img-fluid rounded-circle mb-2" alt="Linda Miller" />

            <div class="fw-bold">Linda Miller</div>
            <small>Front-end Developer</small>
            -->
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="dashboard.php">
                    <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Tableau de bord</span>
                </a>
            </li>
            <li class="sidebar-item active">
                <a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-users"></i> <span class="align-middle">Utilisateurs</span>
                </a>
                <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
                    <li class="sidebar-item active"><a class="sidebar-link" href="telepro.php">Telepro</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="commercial.php">Commercial</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="rendez-vous.php">
                    <i class="align-middle me-2 fas fa-fw fa-tasks"></i> <span class="align-middle">RDVs</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-calendar-alt"></i> <span class="align-middle">Agenda</span>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="planning.php">Planning</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="plan-route.php">Plan de route</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="historique.php">Historique des trajets</a></li>
                    <!--
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-chat.html">Chat <span
                                class="sidebar-badge badge rounded-pill bg-primary">New</span></a></li>

                    <li class="sidebar-item"><a class="sidebar-link" href="#">Blank Page</a></li>
                    -->
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="contact.php">
                    <i class="align-middle me-2 fas fa-fw fa-check-square"></i> <span class="align-middle">Contacts</span>
                </a>
            </li>
            <!--
            <li class="sidebar-item">
                <a data-bs-target="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-sign-in-alt"></i> <span class="align-middle">Auth</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-sign-in.html">Sign
                            In</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-sign-up.html">Sign
                            Up</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-reset-password.html">Reset Password</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-404.html">404
                            Page</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-500.html">500
                            Page</a></li>
                </ul>
            </li>

            <li class="sidebar-header">
                Elements
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#ui" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-flask"></i> <span class="align-middle">User Interface</span>
                </a>
                <ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Alerts</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Buttons</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Cards</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-general.html">General</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-grid.html">Grid</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-modals.html">Modals</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-offcanvas.html">Offcanvas</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-notifications.html">Notifications</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-tabs.html">Tabs</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-typography.html">Typography</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#charts" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-chart-pie"></i> <span class="align-middle">Charts</span>
                    <span class="sidebar-badge badge rounded-pill bg-primary">New</span>
                </a>
                <ul id="charts" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="charts-chartjs.html">Chart.js</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="charts-apexcharts.html">ApexCharts</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#forms" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-check-square"></i> <span class="align-middle">Forms</span>
                </a>
                <ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-layouts.html">Layouts</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-basic-elements.html">Basic Elements</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-advanced-elements.html">Advanced Elements</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-floating-labels.html">Floating Labels</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-input-groups.html">Input Groups</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-editors.html">Editors</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-validation.html">Validation</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-wizard.html">Wizard</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#tables" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-table"></i> <span class="align-middle">Tables</span>
                </a>
                <ul id="tables" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="tables-bootstrap.html">Bootstrap</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="tables-datatables.html">DataTables</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#icons" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-heart"></i> <span class="align-middle">Icons</span>
                </a>
                <ul id="icons" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="icons-feather.html">Feather</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="icons-ion.html">Ion
                            Icons</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="icons-font-awesome.html">Font Awesome</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="calendar.html">
                    <i class="align-middle me-2 far fa-fw fa-calendar-alt"></i> <span class="align-middle">Calendar</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#maps" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-map-marker-alt"></i> <span class="align-middle">Maps</span>
                </a>
                <ul id="maps" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="maps-google.html">Google Maps</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="maps-vector.html">Vector Maps</a></li>
                </ul>
            </li>

            <li class="sidebar-header">
                Extras
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#documentation" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-book"></i> <span class="align-middle">Documentation</span>
                </a>
                <ul id="documentation" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="docs-getting-started.html">Getting Started</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="docs-plugins.html">Plugins</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="docs-changelog.html">Changelog</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#layouts" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-desktop"></i> <span class="align-middle">Layouts</span>
                </a>
                <ul id="layouts" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="layouts-sidebar-left.html">Left Sidebar</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="layouts-sidebar-right.html">Right Sidebar</a></li>
                </ul>
            </li>
            -->
        </ul>
    </div>
</nav>