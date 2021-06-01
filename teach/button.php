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
                            <div class="col-md-12">
                                <label style="float: left;">.Net</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="net" class="form-control" value="<?php echo $erow['net']; ?>">
                            </div>
                            <div class="col-md-12">
                                <label style="float: left;">WebTech</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="webtech" class="form-control" value="<?php echo $erow['webtech']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label style="float: left;">Probability & Statistics</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="statistics" class="form-control" value="<?php echo $erow['statistics']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label style="float: left;">Numetical Method</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="numerical" class="form-control" value="<?php echo $erow['numerical']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Post</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->