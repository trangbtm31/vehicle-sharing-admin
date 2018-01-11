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
							<input id="userid" hidden >
							<div class="modal-footer">
								<button type="submit" class="btn btn-default" data-dismiss="modal">Có </button>
								<button type="button" class="btn btn-default" data-dismiss="modal"> Hủy</button>
							</div>
						</form>
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
								<th>Tên người đi chung </th>
								<th>Tên đối tượng nguy hiểm</th>
								<th>Vị trí xảy ra nguy hiểm</th>
								<th>Thời gian được tạo</th>
							</thead>
							<tbody>
							<?php foreach($dangerJourneyList as $journey): ?>
								<tr>
									<td><?php echo $journey->getJourneyId(); ?></td>
									<td><?php echo $journey->getDriverUsername(); ?></td>
									<td><?php echo $journey->getHikerUsername(); ?></td>
									<td class="text-danger" style="font-weight: bold;"><?php echo $journey->getDangerUsername(); ?>
										<button onclick="setUserId(<?=$journey->getDangerUserId()?>)" type="button" data-toggle="modal" data-target="#myModal" rel="tooltip" title="Khóa tài khoản" class="btn btn-primary btn-simple btn-xs">
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
							<th>Tên người đi chung </th>
							<th>Trạng thái</th>
							<th>Thời gian được tạo</th>
							</thead>
							<tbody>
							<?php foreach($journeyList as $journey): ?>
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
	function setUserId($userId) {
		console.log('aaa');
		$('#userid').val($userId);
	}
	$('#journeylist').addClass('active');
</script>
<?php require "footer.php"?>
