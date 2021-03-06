<header>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
                <span class="sr-only">Toggle navigation</span>
                <i class="icon-cog"></i>
                </button>
                <a class="navbar-brand" href="<?php echo url_for('homepage') ?>"><img alt="Arriendas.cl" src="/images/newDesign/logo.svg" height="44" width="123"></a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <<!-- li class="dropdown">          
                        <a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-cog"></i>
                            Settings
                            <b class="caret"></b>
                        </a>
                        
                        <ul class="dropdown-menu">
                            <li><a href="./account.html">Account Settings</a></li>
                            <li><a href="javascript:;">Privacy Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:;">Help</a></li>
                        </ul>
                            
                    </li> -->

                    <li class="dropdown">        
                        <a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> 
                            <?php echo $sf_user->getAttribute('fullname') ?>
                            <b class="caret"></b>
                        </a>
                        
                        <ul class="dropdown-menu">
                            <!-- <li><a href="javascript:;">My Profile</a></li>
                            <li><a href="javascript:;">My Groups</a></li>
                            <li class="divider"></li> -->
                            <li><a href="<?php echo url_for('logout') ?>">Logout</a></li>
                        </ul>
                        
                    </li>
                </ul>
    
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control input-sm search-query" placeholder="Search">
                    </div>
                </form>
            </div>
        </div>
    </nav>
        
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                
                <a href="javascript:;" class="subnav-toggle" data-toggle="collapse" data-target=".subnav-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <i class="icon-reorder"></i>
                  
                </a>

                <div class="collapse subnav-collapse">
                    <ul class="mainnav">
                    
                        <li class="active" id="uno">
                            <a href="<?php echo url_for('homepage') ?>">
                                <i class="icon-th"></i>
                                <span>Arrendatario</span>
                            </a>                        
                        </li>

                        <li class="" id="dos">
                            <a href="<?php echo url_for('notification') ?>">
                                <i class="icon-th"></i>
                                <span>Dueño</span>
                            </a>                        
                        </li>

                        <!-- <li class="dropdown">                   
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-copy"></i>
                                <span>Sample Pages</span>
                                <b class="caret"></b>
                            </a>        
                        
                            <ul class="dropdown-menu">
                                <li><a href="./pricing.html">Pricing Plans</a></li>
                                <li><a href="./faq.html">FAQ's</a></li>
                                <li><a href="./gallery.html">Gallery</a></li>
                                <li><a href="./reports.html">Reports</a></li>
                                <li><a href="./account.html">User Account</a></li>
                            </ul>               
                        </li>
                        
                        <li class="dropdown">                   
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-external-link"></i>
                                <span>Extra Pages</span>
                                <b class="caret"></b>
                            </a>    
                        
                            <ul class="dropdown-menu">
                                <li><a href="./login.html">Login</a></li>
                                <li><a href="./signup.html">Signup</a></li>
                                <li><a href="./error.html">Error</a></li>
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">More options</a>
                                    <ul class="dropdown-menu">
                                      <li><a tabindex="-1" href="#">Second level</a></li>

                                      <li><a href="#">Second level</a></li>
                                      <li><a href="#">Second level</a></li>
                                    </ul>
                                </li>
                            </ul>                   
                        </li> -->
                    </ul>
                </div> 
            </div>
        </div>
    </div>
</header>




