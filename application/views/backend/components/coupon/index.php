<div class="container-fluid">
	<div class="d-flex align-items-baseline justify-content-between mb-5">
		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript: void(0);">Bảng điều khiển</a></li>
				<li class="breadcrumb-item active" aria-current="page">Mã giảm giá</li>
			</ol>
		</nav>
	</div>
	<?php if ($this->session->userdata('message')) : ?>
		<div class="alert text-bg-success-soft" role="alert">
			<?php echo $this->session->userdata('message'); ?>
		</div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('success')) : ?>
		<div class="alert text-bg-success-soft" role="alert">
			<?php echo $this->session->flashdata('success'); ?>

		</div>
	<?php endif; ?>
	<div class="row">
		<div class="col d-flex">
			<!-- Card -->
			<div class="card border-0 flex-fill w-100">
				<div class="card-header border-0">

					<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-end">

						<!-- Title -->
						<h2 class="card-header-title h4 text-uppercase">
							Quản lý mã giảm giá
						</h2>


						<!-- Button -->
						<a type="button" class="list-fuzzy-search mw-md-300px ms-md-auto mt-5 mt-md-0 mb-3 mb-md-0 btn btn-primary ms-md-4" href="<?php echo base_url() ?>/admin/coupon/insert" role="button">
							Tạo mới mã giảm
						</a>
						<!-- Button -->
						<a type="button" class="btn btn-outline-danger ms-md-4" href="<?php echo base_url() ?>admin/coupon/recyclebin" role="button">
							Thùng rác <small>(<?php $total=$this->Mcoupon->coupon_trash_count(); echo $total; ?>)</small>
						</a>
					</div>

				</div>
				
				<!-- Table -->
				<div class="table-responsive">
					<table class="table align-middle table-hover table-bordered">
						<thead class="thead-light">
							<tr>
							<th >STT</th>
											<th>Mã giảm giá</th>
											<th >Số tiền giảm</th>
											<th >Số tiền đơn hàng áp dụng tối thiểu</th>
											<th >Số lần giới hạn nhập</th>
											<th >Hạn nhập</th>
								<th class="w-200px">
									<a href="javascript: void(0);" class="text-muted list-sort" data-sort="created">
										Trạng thái
									</a>
								</th>
								<th class="w-150px">Hành động</th>
							</tr>
						</thead>

						<tbody class="list">
							<?php $stt = 0; foreach ($list as $row) : ?>
								<tr>
								<td><?php $stt += 1;
												echo $stt; ?></td>
									<td><?php echo $row['code']?></td>
									<td class="key">
									<?php echo (number_format($row['discount'])); ?>
									
									</td>
									<td class="created"><?php echo number_format($row['payment_limit'])?> đ</td>
									<td><?php if($row['orders'] == 1)
											echo $row['limit_number'];
											else
												echo'Mã giảm giá tự động';
											?>
												
											</td>
											<td><?php echo date("d/m/Y", strtotime($row['expiration_date']));  ?></td>
									<td class="status">
										<?php if ($row['status'] == 1) : ?>
											<span class="legend-circle bg-success"></span> Kích hoạt
										<?php else : ?>
											<span class="legend-circle bg-warning"></span> Ngừng kích hoạt
										<?php endif; ?>
									</td>
									<td>
										<!-- Dropdown -->
										<div class="dropdown float-end">
											<a href="javascript: void(0);" class="dropdown-toggle no-arrow d-flex text-secondary" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="14" width="14">
													<g>
														<circle cx="12" cy="3.25" r="3.25" style="fill: currentColor" />
														<circle cx="12" cy="12" r="3.25" style="fill: currentColor" />
														<circle cx="12" cy="20.75" r="3.25" style="fill: currentColor" />
													</g>
												</svg>
											</a>
											<ul class="dropdown-menu">
												<li>
													<a class="dropdown-item" href="<?php echo base_url() ?>admin/coupon/status/<?php echo $row['id'] ?>">
														<?php if ($row['status'] == 1) : ?>
															<i class='bx bx-block'></i> Ngừng kích hoạt
														<?php else : ?>
															<i class='bx bx-check-circle'></i> Kích hoạt
														<?php endif; ?>
													</a>
												</li>
												<li>
													<a class="dropdown-item" href="<?php echo base_url() ?>admin/coupon/update/<?php echo $row['id'] ?>" role="button">
														<i class='bx bx-edit-alt'></i> Chỉnh sửa mã giảm
													</a>
												</li>
												<li>
													<hr class="dropdown-divider">
												</li>
												<li>
													<a class="dropdown-item text-danger" href="<?php echo base_url() ?>admin/coupon/trash/<?php echo $row['id'] ?>" onclick="return confirm('Bạn có chắn chắn muốn xóa bài viết này?')" role="button">
														<i class='bx bx-trash'></i> Xóa mã giảm
													</a>
												</li>
											</ul>
										</div>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div> <!-- / .table-responsive -->

				<div class="card-footer">
					<!-- Pagination -->
					<ul class="pagination justify-content-end list-pagination mb-0">
						<?php echo $strphantrang ?>
					</ul>
				</div>
			</div>
		</div>
	</div> <!-- / .row -->
</div>