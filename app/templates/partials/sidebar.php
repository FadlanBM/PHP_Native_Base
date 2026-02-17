<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User profile -->
                    <div class="user-profile text-center position-relative pt-4 mt-1">
                        <!-- User profile image -->
                        <div class="profile-img m-auto"> <img src="../assets/images/users/1.jpg" alt="user" class="w-100 rounded-circle" /> </div>
                        <!-- User profile text-->
                        <div class="profile-text py-1"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo isset($user_name) ? $user_name : 'Markarn Doe'; ?> <span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                                <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                <div class="dropdown-divider"></div> <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User profile text-->
                </li>
                <!-- User Profile-->
                
                <?php
                // Define menu structure if not provided
                if (!isset($sidebar_menu)) {
                    $sidebar_menu = [
                        [
                            'type' => 'header',
                            'label' => 'Platform'   
                        ],
                        [
                            'label' => 'Dashboard',
                            'icon' => 'home', // feather icon
                            'badge' => ['class' => 'badge-success', 'text' => '5'],
                            'submenu' => [
                                ['label' => 'Modern Dashboard', 'url' => 'dashboard', 'icon' => 'mdi mdi-adjust'],
                                ['label' => 'Awesome Dashboard', 'url' => 'index2.html', 'icon' => 'mdi mdi-adjust'],
                                ['label' => 'Classy Dashboard', 'url' => 'index3.html', 'icon' => 'mdi mdi-adjust'],
                                ['label' => 'Analytical Dashboard', 'url' => 'index4.html', 'icon' => 'mdi mdi-adjust'],
                                ['label' => 'Minimal Dashboard', 'url' => 'index5.html', 'icon' => 'mdi mdi-adjust'],
                            ]
                        ],
                        [
                            'label' => 'Sidebar Type',
                            'icon' => 'sidebar',
                            'submenu' => [
                                ['label' => 'Minisidebar', 'url' => 'sidebar-type-minisidebar.html', 'icon' => 'mdi mdi-view-quilt'],
                                ['label' => 'Icon Sidebar', 'url' => 'sidebar-type-iconsidebar.html', 'icon' => 'mdi mdi-view-parallel'],
                                ['label' => 'Overlay Sidebar', 'url' => 'sidebar-type-overlaysidebar.html', 'icon' => 'mdi mdi-view-day'],
                                ['label' => 'Full Sidebar', 'url' => 'sidebar-type-fullsidebar.html', 'icon' => 'mdi mdi-view-array'],
                                ['label' => 'Horizontal Sidebar', 'url' => 'sidebar-type-horizontalsidebar.html', 'icon' => 'mdi mdi-view-module'],
                            ]
                        ],
                        [
                            'label' => 'Page Layouts',
                            'icon' => 'clipboard',
                            'submenu' => [
                                ['label' => 'Inner Fixed Left Sidebar', 'url' => 'layout-inner-fixed-left-sidebar.html', 'icon' => 'mdi mdi-format-align-left'],
                                ['label' => 'Inner Fixed Right Sidebar', 'url' => 'layout-inner-fixed-right-sidebar.html', 'icon' => 'mdi mdi-format-align-right'],
                                ['label' => 'Inner Left Sidebar', 'url' => 'layout-inner-left-sidebar.html', 'icon' => 'mdi mdi-format-float-left'],
                                ['label' => 'Inner Right Sidebar', 'url' => 'layout-inner-right-sidebar.html', 'icon' => 'mdi mdi-format-float-right'],
                                ['label' => 'Fixed Header', 'url' => 'page-layout-fixed-header.html', 'icon' => 'mdi mdi-view-quilt'],
                                ['label' => 'Fixed Sidebar', 'url' => 'page-layout-fixed-sidebar.html', 'icon' => 'mdi mdi-view-parallel'],
                                ['label' => 'Fixed Header & Sidebar', 'url' => 'page-layout-fixed-header-sidebar.html', 'icon' => 'mdi mdi-view-column'],
                                ['label' => 'Box Layout', 'url' => 'page-layout-boxed-layout.html', 'icon' => 'mdi mdi-view-carousel'],
                            ]
                        ],
                        ['type' => 'divider'],
                        [
                            'type' => 'header',
                            'label' => 'Apps'
                        ],
                        ['label' => 'Chat Apps', 'url' => 'app-chats.html', 'icon' => 'message-circle'],
                        ['label' => 'Calender', 'url' => 'app-calendar.html', 'icon' => 'calendar'],
                        ['label' => 'Taskboard', 'url' => 'app-taskboard.html', 'icon' => 'layout'],
                        ['label' => 'Notes', 'url' => 'app-notes.html', 'icon' => 'book'],
                        ['label' => 'Todo', 'url' => 'app-todo.html', 'icon' => 'check-circle'],
                        ['label' => 'Invoice', 'url' => 'app-invoice.html', 'icon' => 'file-text'],
                        ['label' => 'Contact', 'url' => 'app-contacts.html', 'icon' => 'phone'],
                        [
                            'label' => 'Inbox',
                            'icon' => 'mail',
                            'submenu' => [
                                ['label' => 'Email', 'url' => 'inbox-email.html', 'icon' => 'mdi mdi-email'],
                                ['label' => 'Email Detail', 'url' => 'inbox-email-detail.html', 'icon' => 'mdi mdi-email-alert'],
                                ['label' => 'Email Compose', 'url' => 'inbox-email-compose.html', 'icon' => 'mdi mdi-email-secure'],
                            ]
                        ],
                        [
                            'label' => 'Ticket',
                            'icon' => 'bookmark',
                            'submenu' => [
                                ['label' => 'Ticket List', 'url' => 'ticket-list.html', 'icon' => 'mdi mdi-book-multiple'],
                                ['label' => 'Ticket Detail', 'url' => 'ticket-detail.html', 'icon' => 'mdi mdi-book-plus'],
                            ]
                        ],
                        ['type' => 'divider'],
                        [
                            'type' => 'header',
                            'label' => 'UI'
                        ],
                        [
                            'label' => 'Ui Elements',
                            'icon' => 'cpu',
                            'submenu' => [
                                ['label' => 'Buttons', 'url' => 'ui-buttons.html', 'icon' => 'mdi mdi-toggle-switch'],
                                ['label' => 'Modals', 'url' => 'ui-modals.html', 'icon' => 'mdi mdi-tablet'],
                                ['label' => 'Tab', 'url' => 'ui-tab.html', 'icon' => 'mdi mdi-sort-variant'],
                                ['label' => 'Tooltip & Popover', 'url' => 'ui-tooltip-popover.html', 'icon' => 'mdi mdi-image-filter-vintage'],
                                ['label' => 'Notification', 'url' => 'ui-notification.html', 'icon' => 'mdi mdi-message-bulleted'],
                                ['label' => 'Progressbar', 'url' => 'ui-progressbar.html', 'icon' => 'mdi mdi-poll'],
                                ['label' => 'Typography', 'url' => 'ui-typography.html', 'icon' => 'mdi mdi-format-line-spacing'],
                                ['label' => 'Bootstrap Ui', 'url' => 'ui-bootstrap.html', 'icon' => 'mdi mdi-bootstrap'],
                                ['label' => 'Breadcrumb', 'url' => 'ui-breadcrumb.html', 'icon' => 'mdi mdi-equal'],
                                ['label' => 'List Media', 'url' => 'ui-list-media.html', 'icon' => 'mdi mdi-file-video'],
                                ['label' => 'Grid', 'url' => 'ui-grid.html', 'icon' => 'mdi mdi-view-module'],
                                ['label' => 'Carousel', 'url' => 'ui-carousel.html', 'icon' => 'mdi mdi-view-carousel'],
                                ['label' => 'Scrollspy', 'url' => 'ui-scrollspy.html', 'icon' => 'mdi mdi-application'],
                                ['label' => 'Toasts', 'url' => 'ui-toasts.html', 'icon' => 'mdi mdi-credit-card-scan'],
                                ['label' => 'Spinner', 'url' => 'ui-spinner.html', 'icon' => 'mdi mdi-apple-safari'],
                            ]
                        ],
                        [
                            'label' => 'Cards',
                            'icon' => 'copy',
                            'submenu' => [
                                ['label' => 'Basic Cards', 'url' => 'ui-cards.html', 'icon' => 'mdi mdi-layers'],
                                ['label' => 'Custom Cards', 'url' => 'ui-card-customs.html', 'icon' => 'mdi mdi-credit-card-scan'],
                                ['label' => 'Weather Cards', 'url' => 'ui-card-weather.html', 'icon' => 'mdi mdi-weather-fog'],
                                ['label' => 'Draggable Cards', 'url' => 'ui-card-draggable.html', 'icon' => 'mdi mdi-bandcamp'],
                            ]
                        ],
                        [
                            'label' => 'Components',
                            'icon' => 'hard-drive',
                            'submenu' => [
                                ['label' => 'Sweet Alert', 'url' => 'component-sweetalert.html', 'icon' => 'mdi mdi-layers'],
                                ['label' => 'Nestable', 'url' => 'component-nestable.html', 'icon' => 'mdi mdi-credit-card-scan'],
                                ['label' => 'Noui slider', 'url' => 'component-noui-slider.html', 'icon' => 'mdi mdi-weather-fog'],
                                ['label' => 'Rating', 'url' => 'component-rating.html', 'icon' => 'mdi mdi-bandcamp'],
                                ['label' => 'Toastr', 'url' => 'component-toastr.html', 'icon' => 'mdi mdi-poll'],
                            ]
                        ],
                        [
                            'label' => 'Widgets',
                            'icon' => 'grid',
                            'submenu' => [
                                ['label' => 'Apps Widgets', 'url' => 'widgets-apps.html', 'icon' => 'mdi mdi-comment-processing-outline'],
                                ['label' => 'Data Widgets', 'url' => 'widgets-data.html', 'icon' => 'mdi mdi-calendar'],
                                ['label' => 'Charts Widgets', 'url' => 'widgets-charts.html', 'icon' => 'mdi mdi-bulletin-board'],
                            ]
                        ],
                        ['type' => 'divider'],
                        [
                            'type' => 'header',
                            'label' => 'Forms'
                        ],
                        [
                            'label' => 'Form Elements',
                            'icon' => 'layers',
                            'submenu' => [
                                ['label' => 'Forms Input', 'url' => 'form-inputs.html', 'icon' => 'mdi mdi-priority-low'],
                                ['label' => 'Input Groups', 'url' => 'form-input-groups.html', 'icon' => 'mdi mdi-rounded-corner'],
                                ['label' => 'Input Grid', 'url' => 'form-input-grid.html', 'icon' => 'mdi mdi-select-all'],
                                ['label' => 'Checkboxes & Radios', 'url' => 'form-checkbox-radio.html', 'icon' => 'mdi mdi-shape-plus'],
                                ['label' => 'Bootstrap Touchspin', 'url' => 'form-bootstrap-touchspin.html', 'icon' => 'mdi mdi-switch'],
                                ['label' => 'Bootstrap Switch', 'url' => 'form-bootstrap-switch.html', 'icon' => 'mdi mdi-toggle-switch-off'],
                                ['label' => 'Select2', 'url' => 'form-select2.html', 'icon' => 'mdi mdi-relative-scale'],
                                ['label' => 'Dual Listbox', 'url' => 'form-dual-listbox.html', 'icon' => 'mdi mdi-tab-unselected'],
                            ]
                        ],
                        [
                            'label' => 'Form Layouts',
                            'icon' => 'file-text',
                            'submenu' => [
                                // Placeholder for rest of content
                            ]
                        ],
                        ['type' => 'divider'],
                        [
                            'type' => 'header',
                            'label' => 'Extra'
                        ],
                        ['label' => 'Documentation', 'url' => '../../../Documentation/document.html', 'icon' => 'edit-3'],
                        ['label' => 'Log Out', 'url' => 'authentication-login1.html', 'icon' => 'log-out'],
                    ];
                }

                $current_page = basename($_SERVER['PHP_SELF']);

                foreach ($sidebar_menu as $item) {
                    if (isset($item['type']) && $item['type'] === 'header') {
                        echo '<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">' . $item['label'] . '</span></li>';
                    } elseif (isset($item['type']) && $item['type'] === 'divider') {
                        echo '<li class="nav-devider"></li>';
                    } else {
                        $hasSubmenu = isset($item['submenu']) && is_array($item['submenu']);
                        $itemClass = $hasSubmenu ? 'has-arrow' : '';
                        $url = isset($item['url']) ? $item['url'] : 'javascript:void(0)';
                        
                        // Check Active State
                        $isActive = false;
                        if ($hasSubmenu) {
                            foreach ($item['submenu'] as $sub) {
                                $subUrl = isset($sub['url']) ? $sub['url'] : '';
                                if (basename($subUrl) === $current_page) {
                                    $isActive = true;
                                    break;
                                }
                            }
                        } else {
                            if (basename($url) === $current_page) {
                                $isActive = true;
                            }
                        }

                        $activeLiClass = $isActive ? 'selected' : '';
                        $activeLinkClass = $isActive ? 'active' : '';
                        $expanded = $isActive ? 'true' : 'false';
                        // Assuming Bootstrap 4 'show' class for open collapse
                        $collapseClass = $isActive ? 'show' : '';

                        echo '<li class="sidebar-item ' . $activeLiClass . '">';
                        echo '<a class="sidebar-link ' . $itemClass . ' ' . $activeLinkClass . ' waves-effect waves-dark" href="' . $url . '" aria-expanded="' . $expanded . '">';
                        echo '<i data-feather="' . $item['icon'] . '" class="feather-icon"></i>';
                        echo '<span class="hide-menu">' . $item['label'];
                        if (isset($item['badge'])) {
                            echo ' <span class="badge badge-pill ' . $item['badge']['class'] . '">' . $item['badge']['text'] . '</span>';
                        }
                        echo '</span></a>';
                        
                        if ($hasSubmenu) {
                            echo '<ul aria-expanded="' . $expanded . '" class="collapse first-level ' . $collapseClass . '">';
                            foreach ($item['submenu'] as $sub) {
                                $subUrl = isset($sub['url']) ? $sub['url'] : 'javascript:void(0)';
                                $subIcon = isset($sub['icon']) ? '<i class="' . $sub['icon'] . '"></i>' : '';
                                $subActive = (basename($subUrl) === $current_page) ? 'active' : '';
                                echo '<li class="sidebar-item ' . $subActive . '"><a href="' . $subUrl . '" class="sidebar-link ' . $subActive . '">' . $subIcon . '<span class="hide-menu"> ' . $sub['label'] . ' </span></a></li>';
                            }
                            echo '</ul>';
                        }
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
