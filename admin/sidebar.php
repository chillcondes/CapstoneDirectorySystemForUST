				<?php

				$model = new Model();
				$rows = $model->count_widget($_SESSION['sess']);
				if (!empty($rows)) {
					foreach ($rows as $row) {
						$faculty = $row['faculty'];
						$students = $row['students'];
					}
			  	}

			  	$rows = $model->count_capstone($_SESSION['sess']);
				if (!empty($rows)) {
					foreach ($rows as $row) {
						$registered_proj = $row['registered_proj'];
						$pending_proj = $row['pending_proj'];
						$rejected_proj = $row['rejected_proj'];
					}
			  	}

			  	$rows = $model->count_archive($_SESSION['sess']);
				if (!empty($rows)) {
					foreach ($rows as $row) {
						$a_faculty = $row['faculty'];
						$a_students = $row['students'];
					}
			  	}

				?>

				<div class="ttr-sidebar-logo" style="background-image: url('../assets/images/background.png');background-position: center;background-repeat: no-repeat;background-size: cover;height: 135px;">
					<div class="ttr-sidebar-toggle-button">
						<i class="ti-arrow-left"></i>
					</div>
					<div style="padding-left: 12px; padding-top: 12px;">
						<div class="image">
							<img src="../assets/images/logo-mobile.png" width="48" height="48" alt="User">
						</div>
						<div style="height: 8px;">
						</div>
						<div class="info-container">
							<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-size: 15px;"><b><?php echo $abbrv; ?> Administrator</b></div>
							<div class="email" style="color: white; font-size: 12px;"><?php echo $unm; ?></div>
						</div>
					</div>
				</div>