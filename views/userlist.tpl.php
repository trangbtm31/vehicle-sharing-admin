<?php require "header.php"; ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Bạn muốn khóa người dùng này ?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Có </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"> Hủy</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="red">
                            <h4 class="title">Danh sách người dùng hủy chuyến đi nhiều nhất</h4>
                            <p class="category">Đây là danh sách các người dùng đã hủy chuyến đi nhiều nhất được sắp xếp từ trên xuống</p>
                        </div>
                        <div class="card-content table-responsive">
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
                                <tr>
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
                                            <a href="#" data-toggle="modal" data-target="#myModal"><i class="material-icons text-danger">lock_outline</i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-6">
                    <div class="card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">Danh sách người dùng được bình chọn cao nhất</h4>
                            <p class="category">Danh sách các người dùng được bình chọn cao nhất </p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>Số điện thoại </th>
                                <th>Tên </th>
                                <th>Email</th>
                                <th>Địa chỉ </th>
                                <th>Điểm bình chọn</th>
                                </thead>
                                <tbody>
                                <?php /*foreach($userList as $user): */?>
                                    <tr>
                                        <td><?php /*echo $user->getPhoneNumber(); */?></td>
                                        <td><?php /*echo $user->getFullname(); */?></td>
                                        <td><?php /*echo $user->getEmail() ? $user->getEmail() : '<i>'._UPDATING.'</i>'; */?></td>
                                        <td><?php /*echo $user->getAddress() ? $user->getAddress() : '<i>'._UPDATING.'</i>'; */?></td>
                                        <td>5</td>
                                    </tr>
                                <?php /*endforeach; */?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title">Danh sách người dùng được nhiều người yêu thích</h4>
                            <p class="category">Đây là các danh sách người dùng được yêu thích nhất</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <th>Số điện thoại </th>
                                <th>Tên </th>
                                <th>Email</th>
                                <th>Địa chỉ </th>
                                <th>Số lượng người yêu thích</th>
                                </thead>
                                <tbody>
                                <?php /*foreach($userList as $user): */?>
                                    <tr>
                                        <td><?php /*echo $user->getPhoneNumber(); */?></td>
                                        <td><?php /*echo $user->getFullname(); */?></td>
                                        <td><?php /*echo $user->getEmail() ? $user->getEmail() : '<i>'._UPDATING.'</i>'; */?></td>
                                        <td><?php /*echo $user->getAddress() ? $user->getAddress() : '<i>'._UPDATING.'</i>'; */?></td>
                                        <td><?php /*echo rand(1,10); */?></td>
                                    </tr>
                                <?php /*endforeach; */?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>-->
                <!--<div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Danh sách tất cả người dùng</h4>
                            <p class="category">Danh sách các người dùng đã đăng kí thành viên</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th>Số điện thoại </th>
                                    <th>Tên </th>
                                    <th>Email</th>
                                    <th>Địa chỉ </th>
                                    <th>Ngày sinh </th>
                                    <th>Giới tính </th>
                                    <th>Ngày đăng kí </th>
                                </thead>
                                <tbody>
                                <?php /*foreach($userList as $user): */?>
                                    <tr>

                                        <td><?php /*echo $user->getPhoneNumber(); */?></td>
                                        <td><?php /*echo $user->getFullname(); */?></td>
                                        <td><?php /*echo $user->getEmail() ? $user->getEmail() : '<i>'._UPDATING.'</i>'; */?></td>
                                        <td><?php /*echo $user->getAddress() ? $user->getAddress() : '<i>'._UPDATING.'</i>'; */?></td>
                                        <td><?php /*echo $user->getBirthday()? $user->getBirthday() : '<i>'._UPDATING.'</i>'; */?></td>
                                        <td><?php /*echo $user->getGender() == 0 ? "Nam" : "Nữ"; */?></td>
                                        <td><?php /*echo $user->getCreated(); */?></td>
                                        <td>
                                            <button type="button" rel="tooltip" title="Chỉnh sửa thông tin" class="btn btn-primary btn-simple btn-xs">
                                                <i class="material-icons">edit</i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php /*endforeach; */?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>-->
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
                                            <li class="">
                                                <a href="#mostfavorite" data-toggle="tab">
                                                    Danh sách các user được nhiều người yêu thích
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
                                                        <button type="button" rel="tooltip" title="Chỉnh sửa thông tin" class="btn btn-primary btn-simple btn-xs">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="mostfavorite">
                                        <table class="table">
                                            <thead class="text-info">
                                                <th>Số điện thoại </th>
                                                <th>Tên </th>
                                                <th>Email</th>
                                                <th>Địa chỉ </th>
                                                <th>Số lượng người yêu thích</th>
                                            </thead>
                                            <tbody>
                                            <?php $x = 10; $y = 4;  foreach($userList as $user): ?>
                                            <tr>
                                                <td><?php echo $user->getPhoneNumber(); ?></td>
                                                <td><?php echo $user->getFullname(); ?></td>
                                                <td><?php echo $user->getEmail() ? $user->getEmail() : '<i>'._UPDATING.'</i>'; ?></td>
                                                <td><?php echo $user->getAddress() ? $user->getAddress() : '<i>'._UPDATING.'</i>'; ?></td>
                                                <td><?php if ($y>0) $y--; $x = $x - $y; echo $x; ?></td>
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