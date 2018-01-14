<?php require "header.php"; ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <form action="" method="post">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Bạn muốn khóa người dùng này ?</h4>
                                </div>
                                <input id="lockuserid" type="number" value="" name="userid" hidden>
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


                <!-- Unlock Modal -->
                <div id="unlockuser" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <form action="" method="post">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Bạn muốn mở khóa tài khoản người dùng này ? ?</h4>
                                </div>
                                <input id="unlockuserid" type="number" value="" name="userid" hidden>
                                <div class="modal-footer">
                                    <button type="button" onclick="unlockUser()" class="btn btn-default" data-dismiss="modal">
                                        Có
                                    </button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> Hủy</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <!-- Success modal  -->
                <div id="success" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Success Modal content-->
                        <div class="modal-content alert alert-success">
                            <div class="modal-header">
                                <a href="#" style="color:#FFF;" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <div style="text-align: center;">
                                    <h2><strong>Thành công !</strong></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="red">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#deletedtripuser" data-toggle="tab">
                                                Danh sách người dùng hủy chuyến đi nhiều nhất
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#lockedlist" data-toggle="tab">
                                                Danh sách các user bị khóa
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="tab-content">
                                <div class="tab-pane active" id="deletedtripuser">
                                    <table class="table">
                                        <thead class="text-danger">
                                        <th>Số điện thoại </th>
                                        <th>Tên </th>
                                        <th>Email</th>
                                        <th>Địa chỉ </th>
                                        <th>Ngày sinh </th>
                                        <th>Giới tính </th>
                                        <th>Số lần hủy chuyến</th>
                                        <th>Ngày đăng kí </th>
                                        </thead>
                                        <tbody>
                                        <?php foreach($cancelJourneyUserList as $user): ?>
                                            <tr id="lo-<?= $user->getUserId() ?>" >
                                                <td><?php echo $user->getPhoneNumber(); ?></td>
                                                <td><?php echo $user->getFullname(); ?></td>
                                                <td><?php echo $user->getEmail() ? $user->getEmail() : '<i>'._UPDATING.'</i>'; ?></td>
                                                <td><?php echo $user->getAddress() ? $user->getAddress() : '<i>'._UPDATING.'</i>'; ?></td>
                                                <td><?php echo $user->getBirthday()? $user->getBirthday() : '<i>'._UPDATING.'</i>'; ?></td>
                                                <td><?php echo $user->getGender() == 0 ? "Nam" : "Nữ"; ?></td>
                                                <td><strong><?php $x = $user->getJourneyDeleteTimes();
                                                        if($x  >= 3 && $x < 5){
                                                            echo "<span class='text-warning' >".$x ."</span>";
                                                        }elseif($x >= 5){
                                                            echo "<span class='text-danger' >".$x ."</span>";
                                                        }else{
                                                            echo $x;
                                                        }; ?>
                                                    </strong></td>
                                                <td><?php echo $user->getCreated(); ?></td>
                                                <td>
                                                    <?php if($x >= 5) {?>
                                                        <button onclick="setUserId(<?= $user->getUserId() ?>)" type="button"
                                                                data-toggle="modal" data-target="#myModal" rel="tooltip"
                                                                title="Khóa tài khoản" class="btn btn-primary btn-simple btn-xs">
                                                            <i class="material-icons text-danger">lock_outline</i>
                                                        </button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="lockedlist">
                                    <table class="table">
                                        <thead class="text-danger">
                                        <th>Số điện thoại </th>
                                        <th>Tên </th>
                                        <th>Email</th>
                                        <th>Địa chỉ </th>
                                        <th>Ngày sinh </th>
                                        <th>Giới tính </th>
                                        <th>Ngày đăng kí </th>
                                        </thead>
                                        <tbody>
                                        <?php foreach($reportedUserList as $user): ?>
                                            <tr id="unlo-<?= $user->getUserId();?>">
                                                <td><?php echo $user->getPhoneNumber(); ?></td>
                                                <td><?php echo $user->getFullname(); ?></td>
                                                <td><?php echo $user->getEmail() ? $user->getEmail() : '<i>'._UPDATING.'</i>'; ?></td>
                                                <td><?php echo $user->getAddress() ? $user->getAddress() : '<i>'._UPDATING.'</i>'; ?></td>
                                                <td><?php echo $user->getBirthday()? $user->getBirthday() : '<i>'._UPDATING.'</i>'; ?></td>
                                                <td><?php echo $user->getGender() == 0 ? "Nam" : "Nữ"; ?></td>
                                                <td><?php echo $user->getCreated(); ?></td>
                                                <td>
                                                    <button onclick="setUserIdToUnlockModal(<?= $user->getUserId() ?>)" type="button"
                                                            data-toggle="modal" data-target="#unlockuser" rel="tooltip"
                                                            title="Mở tài khoản" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons text-info">lock_open</i>
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


                <div class="col-lg-12 col-md-12">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="blue">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#allusers" data-toggle="tab">
                                                Danh sách tất cả user
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="tab-content">
                                <div class="tab-pane active" id="allusers">
                                    <table class="table">
                                        <thead class="text-info">
                                        <th>Số điện thoại </th>
                                        <th>Tên </th>
                                        <th>Email</th>
                                        <th>Địa chỉ </th>
                                        <th>Ngày sinh </th>
                                        <th>Giới tính </th>
                                        <th>Ngày đăng kí </th>
                                        </thead>
                                        <tbody>
                                        <?php foreach($userList as $user): ?>
                                            <tr>

                                                <td><?php echo $user->getPhoneNumber(); ?></td>
                                                <td><?php echo $user->getFullname(); ?></td>
                                                <td><?php echo $user->getEmail() ? $user->getEmail() : '<i>'._UPDATING.'</i>'; ?></td>
                                                <td><?php echo $user->getAddress() ? $user->getAddress() : '<i>'._UPDATING.'</i>'; ?></td>
                                                <td><?php echo $user->getBirthday()? $user->getBirthday() : '<i>'._UPDATING.'</i>'; ?></td>
                                                <td><?php echo $user->getGender() == 0 ? "Nam" : "Nữ"; ?></td>
                                                <td><?php echo $user->getCreated(); ?></td>
                                                <td>
                                                    <button onclick="" type="button"
                                                            data-toggle="modal" data-target="#unlockuser" rel="tooltip"
                                                            title="Mở tài khoản" class="btn btn-primary btn-simple btn-xs">
                                                        <i class="material-icons text-info">mail_outline</i>
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
        </div>
    </div>
    <script>
        $('#userlist').addClass('active');
    </script>
<?php require "footer.php"?>