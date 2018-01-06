<?php require "header.php"; ?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header" data-background-color="red">
						<h4 class="title">Danh sách chuyến đi bị hủy</h4>
						<p class="category">Danh sách các chuyến đi không thành công </p>
					</div>
					<div class="card-content table-responsive">
						<table class="table">
							<thead class="text-primary">
								<th>Id</th>
								<th>Tên người gửi yêu cầu</th>
								<th>Tên người dùng hủy chuyến</th>
								<th>Thời điểm hủy chuyến</th>
							</thead>
							<tbody>
							<?php foreach($cancelJourneyList as $journey): ?>
								<tr>
									<td><?php echo $journey->getJourneyId(); ?></td>
									<td><?php echo $journey->getSenderUsername(); ?></td>
									<td style="font-weight: bold;"><?php echo $journey->getDeleteUsername(); ?></td>
									<td><?php echo $journey->getDeletedDate(); ?></td>
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
							<th>Tên người đi chung </th>
							<th>Trạng thái</th>
							<th>Thời gian được tạo</th>
							</thead>
							<tbody>
							<?php foreach($journeyList as $request): ?>
								<tr>
									<td><?php echo $request->getJourneyId(); ?></td>
									<td><?php echo $request->getDriverUsername(); ?></td>
									<td><?php echo $request->getHikerUsername(); ?></td>
									<td style="font-weight: bold;"><?php echo $request->getStatus(); ?></td>
									<td><?php echo $request->getCreatedDate(); ?></td>
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
