<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <aside class="main-sidebar">
                <section class="sidebar">
<?php //if ($admin_prefs['user_panel'] == TRUE): ?>
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php //echo $user_login['firstname'].$user_login['lastname']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
                        </div>
                    </div>

<?php //endif; ?>
<?php //if ($admin_prefs['sidebar_form'] == TRUE): ?>
                    <!-- Search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

<?php //endif; ?>
                    <!-- Sidebar menu -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="#<?php echo site_url(''); ?>">
                                <i class="fa fa-home text-primary"></i> <span><?php echo lang('menu_access_website'); ?></span>
                            </a>
                        </li>
						<?php //if(check_access('dashboard','index')==TRUE){?>
                         <li class="<?=active_link_controller('dashboard')?>">
                            <a href="<?php echo site_url('admin/dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span><?php echo lang('menu_dashboard'); ?></span>
                            </a>
                        </li>
						<?php //} ?>


                         <?php //if(check_access('sys_monitor','index')==TRUE){?>
						 <li class="<?=active_link_controller('System_monitor')?>">
                            <a href="<?php echo site_url('admin/sys_monitor'); ?>">
                                <i class="fa fa-desktop"></i> <span><?php echo lang('menu_sys_monitor'); ?></span>
                            </a>
                        </li>
						 <?php //} ?>

                       <!--  <li class="header text-uppercase"><?php echo lang('menu_user_management'); ?></li> -->
                        
						<?php if(check_access('mail','index')==TRUE){?>
                        <li class="<?=active_link_controller('Mail')?>">
                            <a href="<?php echo site_url('admin/Mail'); ?>">
                                <i class="fa fa-envelope-o"></i> <span><?php echo lang('menu_user_mail'); ?></span>
                            </a>
                        </li>
						<?php } ?>
                         

                        <!-- Users Managmenent   -->

                        <li class="treeview  <?=active_link_controller('users')?><?=active_link_controller('groups')?><?=active_link_controller('permission')?>">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span><?php echo lang('menu_user_manager'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
							<?php if(check_access('users','index')==TRUE){?>
                            <ul class="treeview-menu">
                            <li class="<?=active_link_controller('users')?>">
                            <a href="<?php echo site_url('admin/users'); ?>">
                                <i class="fa fa-user"></i> <span><?php echo lang('menu_users'); ?></span>
                            </a>
                           </li>
                           </ul>
							<?php } ?>

                        <?php if(check_access('groups','index')==TRUE){?>
						<ul class="treeview-menu">
                        <li class="<?=active_link_controller('groups')?>">
                            <a href="<?php echo site_url('admin/groups'); ?>">
                                <i class="fa fa-users"></i> <span><?php echo lang('menu_user_groups'); ?></span>
                            </a>
                        </li>
                        </ul>
						<?php } ?>

                         <?php if(check_access('permission','index')==TRUE){?>
						 <ul class="treeview-menu">
                        <li class="<?=active_link_controller('permission')?>">
                            <a href="<?php echo site_url('admin/permission'); ?>">
                                <i class="fa fa-users"></i> <span><?php echo lang('menu_user_permission'); ?></span>
                            </a>
                        </li>
                        </ul>
						 <?php } ?>


                            </li>


                        
                        <!--    ///system settings   -->
                        
                        <li class="treeview  <?=active_link_controller('station_backup')?><?=active_link_controller('user_activity_tracer')?> <?=active_link_controller('station_log')?> <?=active_link_controller('station_config')?>  <?=active_link_controller('prefs')?>">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span><?php echo lang('menu_settings'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <?php if(check_access('prefs','interfaces')==TRUE){?>
							<ul class="treeview-menu">
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/prefs/interfaces/admin'); ?>"><i class="fa fa-genderless"></i><?php echo lang('menu_interfaces'); ?></a></li>
                            </ul>
							<?php } ?>
							
							<?php if(check_access('station_config','index')==TRUE){?>
                             <ul class="treeview-menu">
                                <li class="<?=active_link_function('station_config')?>"><a href="<?php echo site_url('admin/station_config'); ?>"><i class="fa fa-genderless"></i><?php echo lang('menu_sys_configuration'); ?></a></li>
                            </ul>
							<?php } ?>
							
							<?php if(check_access('user_activity_tracer','index')==TRUE){?>
                             <ul class="treeview-menu">
                                <li class="<?=active_link_controller('user_activity_tracer')?> <?=active_link_controller('station_log')?>"><a href="<?php echo site_url('admin/station_log'); ?>"><i class="fa fa-genderless"></i><?php echo lang('menu_sys_logs'); ?></a></li>
                            </ul>
							<?php } ?>
							
							<?php if(check_access('station_backup','index')==TRUE){?>
                             <ul class="treeview-menu">
                                <li class="<?=active_link_controller('station_backup')?>"><a href="<?php echo site_url('admin/station_backup'); ?>"><i class="fa fa-genderless"></i><?php echo lang('menu_station_backup'); ?></a></li>
                            </ul>
							<?php } ?>
                        </li>
                        <!-- ==============weather station -->

                        <li class="treeview   <?=active_link_controller('station_monitoring')?> <?=active_link_controller('station_visit')?> <?=active_link_controller('station_obstacle')?><?=active_link_controller('station_inventory')?> <?=active_link_controller('station_unit')?><?=active_link_controller('station_region')?> <?=active_link_controller('station_district')?><?=active_link_controller('station_type')?> <?=active_link_controller('station_information')?><?=active_link_controller('station_parameter')?><?=active_link_controller('station_conversion')?>">
                            <a href="#">
                                <i class="fa fa-tasks"></i>
                                <span><?php echo lang('menu_station'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
							<?php if(check_access('station_information','index')==TRUE){?>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_controller('station_information')?>"><a href="<?php echo site_url('admin/station_information'); ?>"><i class="fa fa-genderless"></i><?php echo lang('menu_station_management'); ?></a></li>
                            </ul>
							<?php } ?>
							
							<?php if(check_access('station_parameter','index')==TRUE){?>
                            <ul class="treeview-menu"> 
                                <li class="<?=active_link_controller('station_parameter')?>"><a href="<?php echo site_url('admin/station_parameter'); ?>"><i class="fa fa-genderless"></i><?php echo lang('menu_station_parameter'); ?></a></li>
                            </ul>
							<?php } ?>
							
							<?php if(check_access('station_type','index')==TRUE){?>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_controller('station_type')?>"><a href="<?php echo site_url('admin/station_type'); ?>"><i class="fa fa-genderless"></i><?php echo lang('menu_station_type'); ?></a></li>
                            </ul>
							<?php } ?>
							
							<?php if(check_access('station_district','index')==TRUE){?>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_controller('station_district')?>"><a href="<?php echo site_url('admin/station_district'); ?>"><i class="fa fa-genderless"></i><?php echo lang('menu_station_district'); ?></a></li>
                            </ul>
							<?php } ?>
							
							<?php if(check_access('station_region','index')==TRUE){?>
                             <ul class="treeview-menu">
                                <li class="<?=active_link_controller('station_region')?>"><a href="<?php echo site_url('admin/station_region'); ?>"><i class="fa fa-genderless"></i><?php echo lang('menu_station_region'); ?></a></li>
                            </ul>
							<?php } ?>
                              
                             <?php if(check_access('station_unit','index')==TRUE){?>
							 <ul class="treeview-menu">
                                <li class="<?=active_link_controller('station_unit')?>"><a href="<?php echo site_url('admin/station_unit'); ?>"><i class="fa fa-genderless"></i><?php echo lang('menu_station_unit'); ?></a></li>
                            </ul>
							 <?php } ?>
							 
							 <?php if(check_access('station_conversion','index')==TRUE){?>
                             <ul class="treeview-menu">
                                <li class="<?=active_link_controller('station_conversion')?>"><a href="<?php echo site_url('admin/station_conversion'); ?>"><i class="fa fa-genderless"></i><?php echo lang('menu_station_conversion'); ?></a></li>
                            </ul>
							 <?php } ?>
                            
                        </li>



						<?php if(check_access('station_qcontrol','index')==TRUE){?>
                        <li class="<?=active_link_controller('quality_control')?>">
                            <a href="<?php echo site_url('admin/station_qcontrol'); ?>">
                                <i class="fa fa-hourglass-half"></i> <span><?php echo lang('menu_quality_control'); ?></span>
                            </a>
                        </li>
						<?php } ?>
						
						<?php if(check_access('station_metadata','index')==TRUE){?>
                         <li class="<?=active_link_controller('Station_metadata')?>">
                            <a href="<?php echo site_url('admin/Station_metadata'); ?>">
                                <i class="icon ion-ios-cloud-upload"></i> <span><?php echo lang('menu_metadata'); ?></span>
                            </a>
                        </li>
						<?php } ?>
						
						<?php //if(check_access('','index')==TRUE){?>
                        <li class="<?=active_link_controller('benckmark')?>">
                            <a href="<?php echo site_url('admin/error'); ?>">
                                <i class="fa fa-database"></i> <span><?php echo lang('menu_benchmark'); ?></span>
                            </a>
                        </li>
						<?php //} ?>
						
						<?php if(check_access('station_report','index')==TRUE){?>
                         <li class="<?=active_link_controller('Station_report')?>">
                            <a href="<?php echo site_url('admin/station_report'); ?>">
                                <i class="icon ion-android-document"></i> <span><?php echo lang('menu_report'); ?></span>
                            </a>
                        </li>
						<?php } ?>

                        <?php //if(check_access('help','index')==TRUE){?>
						<li class="<?=active_link_controller('help')?>">
                            <a href="<?php echo site_url('admin/error'); ?>">
                                <i class="fa fa-cubes"></i> <span><?php echo lang('menu_help'); ?></span>
                            </a>
                        </li>
						<?php //} ?>
                    </ul>
                </section>
            </aside>
