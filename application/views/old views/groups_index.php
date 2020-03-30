<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('group_confirm_delete.php');
?>

          
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php// echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo anchor('Groups/create', '<i class="fa fa-plus"></i> '. 'Create Group ', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><?php echo lang('groups_name');?></th>
                                                <th><?php echo lang('groups_description');?></th>
                                                <th><?php echo lang('groups_color');?></th>
                                                <th><?php echo lang('groups_action');?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php foreach ($groups as $values):?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($values->name, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($values->description, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><i class="fa fa-stop" style="color:<?php echo $values->bgcolor; ?>"></i></td>
                                                 <td><a class="btn btn-xs btn-info" href="<?php echo site_url('Groups/edit/'.$values->id);?>">Edit</a>
                                                <form method="POST" action="<?php echo base_url('Groups/delete/'.$values->id);?>" accept-charset="UTF-8" style="display:inline" >
                                                    <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Group" data-message="Are you sure you want to delete this group ?">
                                                        <i class="glyphicon glyphicon-trash"></i> Delete
                                                    </button>
                                                </form>
                                                </td>
                                            </tr>
<?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            
