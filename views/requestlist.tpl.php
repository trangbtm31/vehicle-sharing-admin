<?php require "header.php"; ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title">Active Request List</h4>
                            <p class="category">Here is a active request list</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th>Id</th>
                                    <th>Owner</th>
                                    <th>Start time</th>
                                    <th>Vehicle Type</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </thead>
                                <tbody>
                                <?php foreach($allRequest as $request): ?>
                                <tr>
                                    <td><?php echo $request->getRequestId(); ?></td>
                                    <td><?php echo $request->getOwnerId(); ?></td>
                                    <td><?php echo $request->getTimeStart(); ?></td>
                                    <td><?php echo $request->getVehicleType(); ?></td>
                                    <td><?php echo $request->getStatus(); ?></td>
                                    <td><?php echo $request->getCreatedDate(); ?></td>
                                    <td><?php echo $request->getUpdatedDate(); ?></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">User Rating list</h4>
                            <p class="category">Here is a User rating list that order by the most voted user</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>Phone</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Rate value</th>
                                </thead>
                                <tbody>
                                <?php foreach($userList as $user): ?>
                                    <tr>
                                        <td><?php echo $user->getPhoneNumber(); ?></td>
                                        <td><?php echo $user->getFullname(); ?></td>
                                        <td><?php echo $user->getEmail(); ?></td>
                                        <td><?php echo $user->getAddress(); ?></td>
                                        <td>5</td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><div class="col-md-6">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Favorite User List</h4>
                            <p class="category">Here is a User list that order by the most favorited user</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>Phone</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Liked amount</th>
                                </thead>
                                <tbody>
                                <?php foreach($userList as $user): ?>
                                    <tr>
                                        <td><?php echo $user->getPhoneNumber(); ?></td>
                                        <td><?php echo $user->getFullname(); ?></td>
                                        <td><?php echo $user->getEmail(); ?></td>
                                        <td><?php echo $user->getAddress(); ?></td>
                                        <td>10</td>
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