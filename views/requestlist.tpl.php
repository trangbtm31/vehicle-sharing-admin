<?php require "header.php"; ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Modal -->
                <div id="cancelrequest" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Cancel Request Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Bạn muốn hủy yêu cầu này ?</h4>
                            </div>
                            <input id="requestid" type="number" value="" name="requestid" hidden>
                            <div class="modal-footer">
                                <button type="button" onclick="cancelRequest()" class="btn btn-default" data-dismiss="modal">
                                    Có
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"> Hủy</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="success" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Success Modal content-->
                        <div class="modal-content alert alert-success">
                            <div class="modal-header">
                                <a href="#" style="color:#FFF;" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <div style="text-align: center;">
                                    <h2><strong>Đã hủy yêu cầu thành công !</strong></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Danh sách Request</h4>
                            <p class="category">Danh sách các yêu cầu đi chung được người dùng đăng kí lên hệ thống </p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th>Id</th>
                                    <th>Tên người dùng </th>
                                    <th>Thời gian xuất phát </th>
                                    <th>Loại phương tiện</th>
                                    <th>Trạng thái</th>
                                    <th>Thời điểm tạo request</th>
                                </thead>
                                <tbody>
                                <?php foreach($allRequest as $request): ?>
                                <tr>
                                    <td><?php echo $request->getRequestId(); ?></td>
                                    <td><?php echo $request->getUsername(); ?></td>
                                    <td><?php echo $request->getTimeStart(); ?></td>
                                    <td><?php echo $request->getVehicleType(); ?></td>
                                    <td style="font-weight: bold;"><?php echo $request->getStatus(); ?></td>
                                    <td><?php echo $request->getCreatedDate(); ?></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title">Danh sách các yêu cầu đang được xử lý</h4>
                            <p class="category">Danh sách các reuqest đang được xử lý ( Đang gửi request đến người khác, đang chờ confirm request,...) </p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>Id</th>
                                <th>Tên người dùng </th>
                                <th>Thời gian xuất phát </th>
                                <th>Loại phương tiện</th>
                                <th>Trạng thái</th>
                                </thead>
                                <tbody>
                                <?php foreach($pendingRequestList as $request): ?>
                                    <tr id="<?php echo $request->getRequestId(); ?>">
                                        <td><?php echo $request->getRequestId(); ?></td>
                                        <td><?php echo $request->getUsername(); ?></td>
                                        <td><?php echo $request->getTimeStart(); ?></td>
                                        <td><?php echo $request->getVehicleType(); ?></td>
                                        <td style="font-weight: bold;"><?php echo $request->getStatus(); ?></td>
                                        <td>
                                            <button onclick="setRequestId(<?=$request->getRequestId(); ?>)" type="button"
                                                    data-toggle="modal" data-target="#cancelrequest" rel="tooltip"
                                                    title="Hủy yêu cầu" class="btn btn-danger btn-simple btn-xs">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#requestlist').addClass('active');
    </script>
<?php require "footer.php"?>