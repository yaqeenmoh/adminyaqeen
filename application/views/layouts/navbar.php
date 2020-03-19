<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a
                        class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a>
                </li>
                <li class="nav-item">
                    <a href="index.html" class="navbar-brand nav-link">
                        <img alt="branding logo" src="<?php echo general_app_assets('images/logo/robust-logo-light.png') ?>"
                             data-expand="<?php echo general_app_assets('images/logo/robust-logo-light.png') ?>"
                             data-collapse="<?php echo general_app_assets('images/logo/robust-logo-small.png') ?>"
                             class="brand-logo">
                    </a>
                </li>

                <li class="nav-item hidden-md-up float-xs-right">
                    <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container">
                        <i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navbar-container content container-fluid">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                <ul class="nav navbar-nav">
                    <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i
                                class="icon-menu5"></i></a></li>
                    <li class="nav-item nav-search"><a href="#"
                                                       class="nav-link nav-link-search fullscreen-search-btn"><i
                                class="ficon icon-search7"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-xs-right">

                    <li class="dropdown dropdown-language nav-item">
                        <div class="navbar-container content">
                            <div id="navbar-mobile10" class="collapse navbar-toggleable-sm">
                                <ul class="nav navbar-nav lng-nav">
                                    <li class="nav-item"><a href="<?php echo base_url(); ?>MultiLanguageSwitcher/index/english" class="nav-link <?php echo check_language() == 'english' ? 'active' : ''; ?> " data-lng="en"><i class="flag-icon flag-icon-gb"></i> <?php echo $this->lang->line('english_language'); ?></a></li>
                                    <li class="nav-item"><a href="<?php echo base_url(); ?>MultiLanguageSwitcher/index/arabic"  class="nav-link <?php echo check_language() == 'arabic' ? 'active' : ''; ?>" data-lng="ar"><i class="flag-icon flag-icon-jo"></i>  <?php echo $this->lang->line('arabic_language'); ?></a></li>
                                </ul>

                            </div>
                        </div>
                    </li>






                    <li class="dropdown dropdown-user nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                            <span class="avatar avatar-online">
                                <img src="<?php echo general_app_assets('images/portrait/small/avatar-s-1.png') ?>"	alt="avatar"><i></i></span>
                            <span class="user-name">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <i class="icon-head"></i> Edit Profile</a><a href="#" class="dropdown-item">                         
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div id="fullscreen-search" class="fullscreen-search">
    <form class="fullscreen-search-form">
        <input type="search" placeholder="Search..." class="fullscreen-search-input">
        <button type="submit" class="fullscreen-search-submit">Search</button>
    </form>

    <span class="fullscreen-search-close"></span>
</div>
<div class="fullscreen-search-overlay"></div>
