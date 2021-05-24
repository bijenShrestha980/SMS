<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                $del = mysqli_query($conn, "select * from students where userid='" . $row['userid'] . "'");
                $drow = mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                    <h5>
                        <center>Are you sure to delete <strong><?php echo ucwords($drow['name']); ?></strong> from the list? This method cannot be undone.</center>
                    </h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                <a href="delete_student.php?id=<?php echo $row['userid']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
            </div>

        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                $edit = mysqli_query($conn, "select * from students where userid='" . $row['userid'] . "'");
                $erow = mysqli_fetch_array($edit);
                ?>
                <div class="container-fluid">
                    <form method="POST" action="admin_edit_student.php?id=<?php echo $erow['userid']; ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label style="float: left;">Roll no:</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="roll_no" class="form-control" value="<?php echo $erow['roll_no']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label style="float: left;">Class:</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="class" class="form-control" value="<?php echo $erow['class']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label style="float: left;">Name:</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="name" class="form-control" value="<?php echo $erow['name']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label style="float: left;">Guardians Name:</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="guardians_name" class="form-control" value="<?php echo $erow['guardians_name']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label style="float: left;">Mobile:</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="mobile" class="form-control" value="<?php echo $erow['mobile']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label style="float: left;">Email:</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="email" class="form-control" value="<?php echo $erow['email']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label style="float: left;">Password:</label>
                                <div style="height:10px;"></div>
                                <input type="password" name="password" class="form-control" value="<?php echo $erow['password']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label style="float: left;">Remarks:</label>
                                <div style="height:10px;"></div>
                                <textarea rows="3" cols="40" placeholder="Optional" name="remark" value="<?php echo $erow['remark'] ?>" class="form-control"></textarea>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->