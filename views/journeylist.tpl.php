<?php require "header.php"; ?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
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
								<tr>
									<td><?php echo $request->getRequestId(); ?></td>
									<td><?php echo $request->getUsername(); ?></td>
									<td><?php echo $request->getTimeStart(); ?></td>
									<td><?php echo $request->getVehicleType(); ?></td>
									<td style="font-weight: bold;"><?php echo $request->getStatus(); ?></td>
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
	$('#journeylist').addClass('active');
</script>
<?php require "footer.php"?>
