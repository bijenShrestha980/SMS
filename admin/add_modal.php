<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Add New</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="add_student.php">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="update_s_no" class="form-control">
                                <label>Roll no:</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="roll_no" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Class:</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="class" class="form-control">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Name:</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Guardians Name:</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="guardians_name" class="form-control">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Mobile:</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="mobile" class="form-control">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Email:</label>
                                <div style="height:10px;"></div>
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Password:</label>
                                <div style="height:10px;"></div>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Remarks:</label>
                                <div style="height:10px;"></div>
                                <textarea rows="3" cols="40" placeholder="Optional" name="remark" class="form-control"></textarea>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</a>
            </div>
            </form>
        </div>
    </div>
</div>