			<?php

			$model = new Model();
			$rows = $model->count_widget($department_id);
			if (!empty($rows)) {
				foreach ($rows as $row) {
					$faculty = $row['faculty'];
					$students = $row['students'];
				}
		  	}

		  	$rows = $model->count_capstone($department_id);
			if (!empty($rows)) {
				foreach ($rows as $row) {
					$registered_proj = $row['registered_proj'];
				}
			}

		  	$rows = $model->count_archive($department_id);
			if (!empty($rows)) {
				foreach ($rows as $row) {
					$a_faculty = $row['faculty'];
					$a_students = $row['students'];
				}
		  	}

			?>

<!-- 			<div class="row">
					<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-6">
						<div class="widget-card widget-bg2" style="background-image: linear-gradient(to right, #13bed4, #00c5dc, #00c5dc, #95dde6);">	
							<div class="icon">
								<i class="ti-timer"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
									<?php echo date('F j, Y'); ?>
								</h3>
								<span class="wc-des">
									<?php echo date('g:i A'); ?> | <?php echo date('l'); ?>
								</span>
							</div>				      
						</div>
					</div>
					<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-6">
						<div class="widget-card widget-bg4" style="background-image: linear-gradient(to right, #16b595, #34bfa3, #4dc9b0, #63d4bd);">	
							<div class="icon">
								<i class="ti-harddrives"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
									Capstone Projects
								</h3>
								<span class="wc-des">
									<?php echo $abbrv; ?>
								</span>
								<span class="wc-stats">
									<span class="counter"><?php echo $registered_proj; ?></span>
								</span>		
							</div>				      
						</div>
					</div>
					<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-6">
						<div class="widget-card widget-bg3" style="background-image: linear-gradient(to right, #ffb822, #fac34d, #fcd174, #fad88e);">	
							<div class="icon">
								<i class="ti-agenda"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
									Faculty
								</h3>
								<span class="wc-des">
									<?php echo $abbrv; ?>
								</span>
								<span class="wc-stats">
									<span class="counter"><?php echo $faculty; ?></span>
								</span>		
							</div>				      
						</div>
					</div>
					<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-6">
						<div class="widget-card widget-bg2" style="background-image: linear-gradient(to right, #f52a4c, #f0526d, #f0526d, #f5677f);">	
							<div class="icon">
								<i class="ti-user"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
									Students
								</h3>
								<span class="wc-des">
									<?php echo $abbrv; ?>
								</span>
								<span class="wc-stats">
									<span class="counter"><?php echo $students; ?></span>
								</span>		
							</div>				      
						</div>
					</div>
					
				</div> -->