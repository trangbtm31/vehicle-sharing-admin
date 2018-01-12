<?php require "header.php"; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Lock User Modal content-->
                    <div class="modal-content">
                        <form action="" method="post">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Bạn muốn khóa người dùng này ?</h4>
                            </div>
                            <input id="userid" type="number" value="" name="userid" hidden>
                            <input id="journeyid" type="number" value="" name="userid" hidden>
                            <div class="modal-footer">
                                <button type="button" onclick="lockUser()" class="btn btn-default" data-dismiss="modal">
                                    Có
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"> Hủy</button>
                            </div>
                        </form>
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
                                <h2><strong>Đã khóa thành công !</strong></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Journey List -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">Danh sách chuyến đi bị báo nguy hiểm</h4>
                        <p class="category">Danh sách các chuyến đi không thành công </p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                            <th>Id</th>
                            <th>Tên người chở</th>
                            <th>Tên người đi chung</th>
                            <th>Tên đối tượng nguy hiểm</th>
                            <th>Vị trí xảy ra nguy hiểm</th>
                            <th>Thời gian được tạo</th>
                            </thead>
                            <tbody>
                            <?php foreach ($dangerJourneyList as $journey): ?>
                                <tr id="<?php echo $journey->getJourneyId(); ?>">
                                    <td><?php echo $journey->getJourneyId(); ?></td>
                                    <td><?php echo $journey->getDriverUsername(); ?></td>
                                    <td><?php echo $journey->getHikerUsername(); ?></td>
                                    <td class="text-danger"
                                        style="font-weight: bold;"><?php echo $journey->getDangerUsername(); ?>
                                        <button onclick="setUserId(<?= $journey->getDangerUserId() ?>, <?= $journey->getJourneyId(); ?>)" type="button"
                                                data-toggle="modal" data-target="#myModal" rel="tooltip"
                                                title="Khóa tài khoản" class="btn btn-primary btn-simple btn-xs">
                                            <i class="material-icons text-danger">lock_outline</i>
                                        </button>
                                    </td>
                                    <td><?php echo $journey->getDangerLocation(); ?></td>
                                    <td><?php echo $journey->getCreatedDate(); ?></td>
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
                        <h4 class="title">Danh sách tất cả các chuyến đi</h4>
                        <p class="category">Danh sách các chuyến đi được tạo ra khi đã có hai người đi chung </p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                            <th>Id</th>
                            <th>Tên người chở</th>
                            <th>Tên người đi chung</th>
                            <th>Trạng thái</th>
                            <th>Thời gian được tạo</th>
                            </thead>
                            <tbody>
                            <?php foreach ($journeyList as $journey): ?>
                                <tr>
                                    <td><?php echo $journey->getJourneyId(); ?></td>
                                    <td><?php echo $journey->getDriverUsername(); ?></td>
                                    <td><?php echo $journey->getHikerUsername(); ?></td>
                                    <td style="font-weight: bold;"><?php echo $journey->getStatus(); ?></td>
                                    <td><?php echo $journey->getCreatedDate(); ?></td>
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
    function setUserId($userId, $journeyId) {
        $('#userid').val($userId);
        $('#journeyid').val($journeyId);
    }

    function lockUser() {
        var userId = $('#userid').val();
        var journeyId = $('#journeyid').val();
        $.ajax({
            type: "POST",
            url: "assets/lockUser.php",
            data: {
                'user_id': userId,
				'journey_id' : journeyId
            },
            success: function (response) {
                var result = JSON.parse(response);
                if (result.is_success === 1) {
                    $('#success').modal();
					$('#'+result.journey_id).hide();
                } else {
					console.log(result.message);
				}
            }
        });
    }
    $('#journeylist').addClass('active');
</script>
<?php require "footer.php" ?>
