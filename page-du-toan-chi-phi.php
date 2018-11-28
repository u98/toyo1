<?php 
get_header();
?>
<div class="container">
	<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content();?> 
	<?php endwhile; ?>
	<div class="row">
		<div class="col-md-6 col-lg-6">
			<div class="financing_calculatoe">
				<div class="payment-form">
					<div class="form-group">
						<label class="form-label">Tên xe</label>
						<div class="select">
							<select class="car-name form-control" id="car-name">

							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label">Nơi đăng ký trước bạ
						</label>
						<div class="select">
							<select class="payment-location form-control">
								<option value="1000000" data-input="9">
									Thành phố
								</option>
								<option value="200000" data-input="5">
									Huyện                  
								</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label">Loại chủ thể</label>
						<div class="select">
							<select class="owner-type form-control" id="down-pay-bank">
								<option value="1560000">
									Cá nhân                  
								</option>
								<option value="2160000">
									Doanh nghiệp                  
								</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<button class="payment_cal_btn btn btn-block" value="">Dự toán chi phí</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-6 dutoan">
			<div class="ajaxLoadChiPhi">
				<div class="cost-price">
					<span>Giá xe (bao gồm VAT): </span>
					<span class="pull-right" id="car-price"/>
				</div>

				<div class="cost-price">
					<span>Lệ phí trước bạ:</span>
				</div>

				<div class="cost-price">
					<span>&nbsp;&nbsp;&nbsp;&nbsp;- Mức lệ phí:</span>
					<span  class="pull-right">10%</span>
				</div>

				<div class="cost-price">
					<span>&nbsp;&nbsp;&nbsp;&nbsp;- Thành tiền:</span>
					<span class="pull-right" id="sumprice">-</span>
				</div>

				<div class="cost-price">
					<span>Phí đăng kiểm:</span>
					<span  class="pull-right phidangkiem">340,000</span>
				</div>

				<div class="cost-price">
					<span>Lệ phí đăng ký:</span>
					<span  class="pull-right lephidangky">-</span>
				</div>

				<div class="cost-price">
					<span>Phí sử dụng đường bộ (1 năm)</span>
					<span class="pull-right phiduongbo">-</span>
				</div>

				<div class="cost-price">
					<span>Bảo hiểm TNDS (1 năm):</span>
					<span class="pull-right">580,700</span>
				</div>

				<div class="cost-price total">
					<span>TỔNG CỘNG (VNĐ):</span>
					<span class="pull-right" id="totalPrice">-</span>
				</div>

				<div class="cost-note">
					Mức biểu phí trên đây là tạm tính và có thể thay đổi do sự thay đổi của thuế và các bên cung cấp dịch vụ khác. Mức bảo hiểm đã gồm 10% VAT.
				</div>

			</div>
		</div>

	</div>
</div>

<?php get_footer();