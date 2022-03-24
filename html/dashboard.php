<?php /*
$title = "Dashboard | ";
include "head.php";
//Activa el li del sidebar.php
$active_dashboard = "active";
include "sidebar.php";
include "topbar.php";

//Eventos Expo/Feria
$events_expo = mysqli_query($con, "SELECT * FROM events WHERE type='fair' AND id_user=$id");
$eventsexpo = mysqli_num_rows($events_expo);
//Eventos Conferencia/Webinar
$events_conf = mysqli_query($con, "SELECT * FROM events WHERE type='conf' AND id_user=$id");
$eventsconf = mysqli_num_rows($events_conf);

//Usuarios Totales
*/


?>

<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<div id="dasboard-content" class="content">


	<div class="container-fluid p-0">

		<div class="row" style="margin-bottom: 24px;">
			<div class="col-10 ">

				<div class="dropdown">
					<button style="font-size: 25px;" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						VOCA FESTIVAL
					</button>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="#">VOCA FESTIVAL</a>
					</div>

				</div>
			</div>

			<!--<div class="col-2 d-flex justify-content-end ">
				<button id="btn-download-report-pdf" type="button" class="btn btn-light" data-toggle="tooltip" data-placement="left" title="Descargar reporte en PDF">
					<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
						<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
						<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
					</svg>
				</button>

			</div> -->

		</div>


		<!--<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<div class="media d-flex">

							<div class="media-body text-left">
								<h3 class="success">15</h3>
								<span>Usuarios registrados</span>
							</div>

							<div class="align-self-center d-flex justify-content-end">
								<div class="col-5 success">
									<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
										<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
									</svg>
								</div>
								<i class="icon-user success font-large-2 float-right"></i>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>-->



		<div class="row">

			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">

					<div class="info-box-content">
						<h3 id="card-visitors-txt" class="info-box-number success">000</h3>
						<span class="info-box-text">Visitas Acumuladas</span>

					</div>

					<span class="info-box-icon bg-success"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
							<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
						</svg></span>

				</div>

			</div>


			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">

					<div class="info-box-content">

						<h3 id="card-users-txt" class="info-box-number primary">000</h3>
						<span class="info-box-text">Usuarios registrados</span>
					</div>

					<span class="info-box-icon bg-primary"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
							<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
							<path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
						</svg></span>

				</div>

			</div>


			<!-- <div class="col-md-3 col-sm-12 col-12">
				<div class="info-box">

					<div class="info-box-content">

						<h3 id="card-avrg-usr-sessions-txt" class="info-box-number warning">000</h3>
						<span class="info-box-text">Sesiones por usuario</span>
					</div>

					<span class="info-box-icon bg-warning"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-box-arrow-in-up-right" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M6.364 13.5a.5.5 0 0 0 .5.5H13.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 13.5 1h-10A1.5 1.5 0 0 0 2 2.5v6.636a.5.5 0 1 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H6.864a.5.5 0 0 0-.5.5z" />
							<path fill-rule="evenodd" d="M11 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793l-8.147 8.146a.5.5 0 0 0 .708.708L10 6.707V10.5a.5.5 0 0 0 1 0v-5z" />
						</svg></span>

				</div>

			</div> -->


			<div class="col-md-3 col-sm-12 col-12">
				<div class="info-box">

					<div class="info-box-content">

						<h3 id="card-stands-txt" class="info-box-number warning">000</h3>
						<span class="info-box-text">Stands totales</span>
					</div>

					<span class="info-box-icon bg-warning"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
							<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z" />
						</svg></span>

				</div>

			</div>



			<div class="col-md-3 col-sm-12 col-12">
				<div class="info-box">

					<div class="info-box-content">

						<h3 id="card-avrg-usr-sessions-txt" class="info-box-number danger">000</h3>
						<span class="info-box-text">Pasaportes completados</span>
					</div>

					<span class="info-box-icon bg-danger"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-file-check" viewBox="0 0 16 16">
							<path d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
							<path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
						</svg></span>

				</div>

			</div>


		</div>

		<hr>

		<!-- MENU DASHBOADS -->
		<div class="row d-flex justify-content-center">

			<div class="col-md-4 col-sm-12  ">
				<div id="btn-dash-graphs-admin" class="card btn-dashboard" style="cursor:pointer;">
					<div class="my-auto">
						<div class="d-flex justify-content-center">
							<i class="fas fa-chart-pie fa-4x"></i>
						</div>
						<div class="d-flex justify-content-center">
							Montaje de evento
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-12 ">
				<div id="btn-dash-graphs-event" class="card btn-dashboard btn-dashboard-selected" style="cursor:pointer;">
					<div class="my-auto">
						<div class="d-flex justify-content-center">
							<i class="fas fa-chart-bar fa-4x"></i>
						</div>
						<div class="d-flex justify-content-center">
							Gráficas de Evento
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-12">
				<div id="btn-dash-graphs-passport" class="card btn-dashboard" style="cursor:pointer;">
					<div class="my-auto">
						<div class="d-flex justify-content-center">
							<i class="fas fa-project-diagram fa-4x"></i>
						</div>
						<div class="d-flex justify-content-center">
							Gráficas Pasaporte
						</div>
					</div>
				</div>
			</div>



		</div>
		<!-- END MENU DASHBOADS -->

		<hr>


		<div id="dashboard-container">
			<div class="collapse w-100" id="container_dashboard_passport">


			<?php 

				include "pasaporte.php";
			?>
		


			</div>
		</div>




			<div class="collapse w-100" id="container_dashboard_admin">

				<div class="row">

					<div class="col-md-3 col-sm-12" style="margin-bottom: 24px;">

						<div class="card flex-fill w-100">
							<div class="c-card-header row">

								<div class="col-10">
									<h5 class="c-card-title mb-0">Organizadores</h5>
								</div>

								<div class="col-2">
									<i id="downloadOrganizersInfoID" class="fas fa-download" style="cursor: pointer;"> </i>
								</div>
							</div>

							<div class="card-body d-flex">
								<div class="align-self-center w-100">
									<div class="py-3">
										<div class="d-flex justify-content-center" style="font-size:5vh">

											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="7vh" height="7vh" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
													<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
													<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
												</svg>
											</span>
											<span id="lbl-dash-admin-organizers" style="margin-left: 12px;">0</span>

										</div>
									</div>
								</div>
							</div>
						</div>

					</div>


					<div class="col-md-3 col-sm-12" style="margin-bottom: 24px;">
						<div class="card flex-fill w-100">
							<div class="c-card-header row">

								<div class="col-10">
									<h5 class="c-card-title mb-0">Expositores</h5>
								</div>

								<div class="col-2">
									<i id="downloadExhibitorsInfoID" class="fas fa-download" style="cursor: pointer;"> </i>
								</div>
							</div>


							<div class="chart chart-xs py-4">
								<canvas id="dashboard_expositores_grafica"></canvas>
							</div>


						</div>
					</div>



					<div class="col-md-3 col-sm-12" style="margin-bottom: 24px;">
						<div class="card flex-fill w-100">
							<div class="c-card-header row">

								<div class="col-10">
									<h5 class="c-card-title mb-0">Asesores</h5>
								</div>

								<div class="col-2">
									<i id="downloadAdvisersInfoID" class="fas fa-download" style="cursor: pointer;"> </i>
								</div>
							</div>

							<div class="chart chart-xs py-4">
								<canvas id="dashboard_asesores_grafica"></canvas>
							</div>

						</div>
					</div>


					<div class="col-md-3 col-sm-12" style="margin-bottom: 24px;">
						<div class="card flex-fill w-100">
							<div class="c-card-header row">

								<div class="col-10">
									<h5 class="c-card-title mb-0">Visitantes</h5>
								</div>

								<div class="col-2">
									<i id="downloadVisitorsInfoID" class="fas fa-download" style="cursor: pointer;"> </i>
								</div>
							</div>

							<div class="card-body d-flex">
								<div class="align-self-center w-100">
									<div class="py-3">
										<div class="d-flex justify-content-center" style="font-size:5vh">

											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="7vh" height="7vh" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
													<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
													<path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
													<path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
												</svg>
											</span>

											<span id="lbl-dash-admin-visitors" style="margin-left: 12px;"><?php echo $query; ?></span>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div>

				<div class="row">

					<div class="col-sm-12 col-md-4 " style="margin-bottom: 24px;">
						<div class="card  ">
							<div class="c-card-header row">

								<div class="col-10">
									<h5 class="c-card-title mb-0">Estatus Stands</h5>
								</div>

								<div class="col-2">
									<i id="btn_asigned_stands_report" class="fas fa-download" style="cursor: pointer;"> </i>
								</div>
							</div>

							<div class="chart chart-xs py-4">
								<canvas id="chartjs-dashboard-asgined-stands"></canvas>
							</div>

						</div>
					</div>


					<div class="col-sm-12 col-md-4 " style="margin-bottom: 24px;">
						<div class="card">
							<div class="c-card-header row">
								<div class="col-10">
									<h5 class="c-card-title mb-0">Personalización de Stands</h5>
								</div>

								<div class="col-2">
									<i id="btn_complete_stands_report" class="fas fa-download" style="cursor: pointer;"> </i>
								</div>

							</div>


							<div class="chart chart-xs py-4">
								<canvas id="chartjs-dashboard-completed-stands"></canvas>
							</div>


						</div>
					</div>


					<div class="col-sm-12 col-md-4 " style="margin-bottom: 24px;">
						<div class="card">
							<div class="c-card-header row">

								<div class="col-10">
									<h5 class="c-card-title mb-0">Contenidos del Lobby</h5>
								</div>

								<div class="col-2">
									<i id="btn_complete_lobby_report" class="fas fa-download" style="cursor: pointer;"> </i>
								</div>
							</div>

							<div class="chart chart-xs py-4">
								<canvas id="chartjs-dashboard-lobby-docs"></canvas>
							</div>

						</div>
					</div>

				</div>



				<div class="row">

					<div class="col-sm-12 col-md-6 " style="margin-bottom: 24px;">
						<div class="card  ">
							<div class="c-card-header row">

								<div class="col-10">
									<h5 class="c-card-title mb-0">Contenidos Pabellones</h5>
								</div>

								<div class="col-2">
									<i id="btn_complete_pabs_report" class="fas fa-download" style="cursor: pointer;"> </i>
								</div>
							</div>

							<div class="chart chart-xs py-4">
								<canvas id="chartjs-dashboard-pabs-docs"></canvas>
							</div>

						</div>
					</div>


					<div class="col-sm-12 col-md-6 " style="margin-bottom: 24px;">
						<div class="card  ">
							<div class="c-card-header row">

								<div class="col-10">
									<h5 class="c-card-title mb-0">Contenidos Auditorios</h5>
								</div>

								<div class="col-2">
									<i id="" class="fas fa-download" style="cursor: pointer;"> </i>
								</div>
							</div>

							<div class="chart chart-xs py-4">
								<canvas id="chartjs-dashboard-aud-docs"></canvas>
							</div>

						</div>
					</div>


				</div>


				<!-- <div class="row">


					<div class="col-sm-12 col-md-4 " style="margin-bottom: 24px;">
						<div class="card  ">
							<div class="c-card-header row">

								<div class="col-10">
									<h5 class="c-card-title mb-0">Contenidos Subidos</h5>
								</div>

							</div>

						</div>
					</div>


					<div class="col-md-8 col-sm-12">
						<div class="col-sm-12 col-md-12 d-flex order-12 order-xxl-12">
							<div class="card flex-fill w-100 ">

								<div class="c-card-header ">
									<h5 class="c-card-title mb-0">Tipos de contenidos</h5>
								</div>

								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-publicidad-pabellones"></canvas>
											</div>
										</div>
										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Contenidos totales</td>
													<td id="lbl-tot-interactions" class="text-right">0</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>

							</div>
						</div>
					</div>



				</div> -->


			</div>

			<!--<div style="border-radius: 10px; border: solid #E4E4E8; border-width: 1px; padding:16px; margin-right: -12px; margin-left: -12px;">-->
			<div class="collapse w-100" id="container_dashboard_event">


				<!-- <div>

					<div class="d-flex " style="margin-bottom: -28px; ">
						<div class=" badge rounded-pill bg-secondary" style=" z-index: 1;">
							<span style="margin-top: 4px; ">Filtros</span>

							<span style="margin-left: 12px;">
								<svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 4px;" width="14" height="14" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
									<path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
								</svg>
							</span>
						</div>
					</div>

				</div>


				 <hr> -->


				<!-- <div class="row">
<div class="col-md-1 col-sm-12 d-flex "><span style="margin-top: 4px; ">Filtros</span> <span style="margin-left: 12px;">
		<svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 4px;" width="20" height="20" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
			<path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
		</svg>
	</span>
</div>

<div class="col-md-11 col-sm-12">
	<hr>
</div>
</div>-->

				<div class="d-flex justify-content-center">

					<button id="btn-dashboard-filters-calendar" class="btn btn-primary" style="margin-right: 16px;">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week-fill" viewBox="0 0 16 16">
							<path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zM2 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
						</svg>

						Fechas
					</button>


					<button id="btn-dashboard-filters-stands" class="btn btn-primary" style="margin-right: 16px;">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
							<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z" />
						</svg>

						Stands
					</button>


					<button id="btn-refresh-charts" type="button" class="btn btn-success">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
							<path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
							<path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
						</svg>

						Actualizar
					</button>


				</div>

				<!-- CONTENDERORES COLLAPSABLES -->

				<div id="dash-filters-container-calendar" class="collapse w-100">

					<div style="height: 24px;"></div>

					<div class="d-flex justify-content-center">

						<div class="d-flex justify-content-center row">

							<div class="col-md-4 d-flex justify-content-center my-auto">Periodo contemplado: &zwnj;</div>
							<div class="col-md-3 d-flex justify-content-center my-auto"><input class="input_dp" type="text" id="dp_start" /></div>
							<div class="col-md-1 d-flex justify-content-center my-auto">&zwnj; a &zwnj;</div>
							<div class="col-md-3 d-flex justify-content-center my-auto"><input class="input_dp" type="text" id="dp_end" /></div>

						</div>
					</div>

					<br>

				</div>


				<div id="dash-filters-container-stands" class="collapse w-100">

					<div style="height: 24px;"></div>

					<!--<div class="d-flex justify-content-center">

						AQUÍ ESTARÁ LA SELECCIÓN DE STAND INDIVIDUALES Y POR CATEGORIAS

					</div>-->

					<br>
				<div class="d-flex justify-content-center">
					<?php 

    				include "../config/config.php";
					$array = null;
					$query = "SELECT count(*) as n_pabellones from pabellon where id_evento = 167 ;";
    				$res = mysqli_query($con, $query);
				    while ($data = mysqli_fetch_assoc($res)) {
				        $array["data"][] = $data;
				    }
				    $numeroPabellones = $array["data"][0]['n_pabellones'];

					$array = null;
					$query = "SELECT id_pabellon,nombre_pabellon from pabellon where id_evento = 167;";
    				$res = mysqli_query($con, $query);

				    while ($data = mysqli_fetch_assoc($res)) {
				        $array["data"][] = $data;
				    }

    				for ($i = 0; $i < $numeroPabellones; $i++) { 
    					


					?> 

					<button onclick="cambiarPabellon(<?php echo $array["data"][$i]['id_pabellon']; ?>)" id="" class="btn btn-primary" style="margin-right: 16px;">
						<?php echo $array["data"][$i]['nombre_pabellon']; ?>
					</button>


					<?php 

    				}

					?>

				</div>

					<div id="cb-stands-container" class="boxes row">
						<!--<input type="checkbox" id="box-1">
	<label for="box-1">stand#1</label>

	<input type="checkbox" id="box-2" checked>
	<label for="box-2">stand#2</label>

	<input type="checkbox" id="box-3">
	<label for="box-3">stand#3</label> -->
					</div>


				</div>

				<!-- END CONTENDERORES COLLAPSABLES -->



				<hr>
				<!--<div style="margin-top:-28px;"> <span class="in_hr_title"> Datos específicos </span></div>-->


				<!--<div class="row">

				<div class="col-sm-12 col-md-4 d-flex order-2 order-xxl-3">
					<div class="card flex-fill w-100 ">
						<div class="c-card-header ">
							<h5 class="c-card-title mb-0">Tipo(s) de stands</h5>

							<div class="row">
								<div class="col-8">Stands totales</div>
								<div id="lbl-total-stands	" class="col-4">0</div>
							</div>
						</div>


						<div class="card-body d-flex">
							<div class="align-self-center w-100">
								<div class="py-3">
									<div class="chart chart-xs">
										<canvas id="chartjs-dashboard-pie-type-stands"></canvas>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>


				<div class="col-sm-12 col-md-4  d-flex order-2 order-xxl-3">
					<div class="card flex-fill w-100 ">
						<div class="c-card-header ">
							<h5 class="c-card-title mb-0">Visitas en este periodo</h5>
						</div>

						<div class="card-body d-flex">
							<div class="align-self-center w-100">
								<div class="py-3">
									<div class="d-flex justify-content-center" style="font-size:5vh">

										<span><svg xmlns="http://www.w3.org/2000/svg" width="7vh" height="7vh" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
												<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
											</svg></span>
										<span id="lbl-delimited-visits">0</span>
										<span style="color: #28A745;">↑</span>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-sm-12 col-md-4  d-flex order-2 order-xxl-4">
					<div class="card flex-fill w-100 ">
						<div class="c-card-header ">
							<h5 class="c-card-title mb-0">Tipo(s) de Usuarios</h5>
						</div>

						<div class="card-body d-flex">
							<div class="align-self-center w-100">
								<div class="py-3">
									<div class="chart chart-xs">
										<canvas id="chartjs-dashboard-pie-users"></canvas>
									</div>
								</div>
								<table class="table mb-0">
									<tbody>
										<tr>
											<td>Totales</td>
											<td id="lbl-tot-usrs" class="text-right"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>


			</div>


			<div class="row">

				<div class="col-sm-12 col-md-8 d-flex order-12 order-xxl-13">
					<div class="card flex-fill w-100 ">
						<div class="c-card-header ">
							<div class="row">
								<div class="col-6">
									<h5 class="c-card-title mb-0">Visitas por hora </h5>
								</div>


							</div>

						</div>

						<div class="card-body d-flex">
							<div class="align-self-center w-100">
								<div class="py-3">
									<div class="chart chart-xs">

										<div id="div-visits-stands">
											<canvas id="chartjs-dashboard-stand-visits-stands"></canvas>
										</div>

										

									</div>
								</div>

								<table class="table mb-0">
									<tbody>
										<tr>
											<td id="tlt_tot_visitas">-</td>
											<td id="lbl_tot_visitas" class="text-right">0</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>


				<div class="col-sm-12 col-md-4 d-flex order-12 order-xxl-3">
					<div class="card flex-fill w-100 ">
						<div class="c-card-header ">
							<h5 class="c-card-title mb-0">Medio de visita</h5>
						</div>

						<div class="card-body d-flex">
							<div class="align-self-center w-100">
								<div class="py-3">
									<div class="chart chart-xl">
										<canvas id="chartjs-dashboard-pie-stand-visits"></canvas>
									</div>
								</div>

								<table class="table mb-0">
									<tbody>
										<tr>
											<td> </td>
											<td id="lbl_visitas_totales" class="text-right"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div> -->

				<!-- SEG -->
				<div class="row">

					<div class="col-md-8 col-sm-12">

						<div class="row">

							<div class="col-md-6 col-sm-12" style="margin-bottom: 24px;">

								<div class="card flex-fill w-100">
									<div class="c-card-header ">
										<h5 class="c-card-title mb-0">Visitas en este periodo</h5>
									</div>

									<div class="card-body d-flex">
										<div class="align-self-center w-100">
											<div class="py-3">
												<div class="d-flex justify-content-center" style="font-size:5vh">

													<span><svg xmlns="http://www.w3.org/2000/svg" width="7vh" height="7vh" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
															<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
														</svg></span>
													<span id="lbl-delimited-visits">&zwnj; 0</span>
													<span style="color: #28A745;">↑</span>

												</div>
											</div>
										</div>
									</div>
								</div>

							</div>

							<div class="col-md-6 col-sm-12" style="margin-bottom: 24px;">

								<div class="card flex-fill w-100 ">
									<div class="c-card-header ">
										<h5 class="c-card-title mb-0">Conectados al tour ahora</h5>
									</div>

									<div class="card-body d-flex">
										<div class="align-self-center w-100">

											<div class="py-3">
												<div class="d-flex justify-content-center" style="font-size:5vh">

													<span><svg xmlns="http://www.w3.org/2000/svg" width="7vh" height="7vh" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
															<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
															<path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
															<path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
														</svg></span>
													<span id="lbl-tour-online">&zwnj; 0</span>
													<span style="color: #28A745;">↑</span>

												</div>
											</div>

										</div>
									</div>
								</div>

							</div>

						</div>

						<div class="col-sm-12 col-md-12 d-flex order-12 order-xxl-12">
							<div class="card flex-fill w-100 ">
								<div class="c-card-header ">
									<div class="row">
										<div class="col-6">
											<h5 class="c-card-title mb-0">Visitas por hora </h5>
										</div>

									</div>

								</div>

								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">

												<div id="div-visits-stands">
													<canvas id="chartjs-dashboard-stand-visits-stands"></canvas>
												</div>



											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td id="tlt_tot_visitas">-</td>
													<td id="lbl_tot_visitas" class="text-right">0</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

					</div>


					<div class="col-md-4 col-sm-12" style="margin-bottom: 24px;">

						<div class="card flex-fill w-100">

							<div class="flex-fill">

								<div class="c-card-header ">
									<h5 class="c-card-title mb-0">Tipo(s) de stands</h5>

									<!--<div class="row">
									<div class="col-8">Stands totales</div>
									<div id="lbl-total-stands" class="col-4">0</div>
								</div>-->

									<div>
										<div>Stands totales: <span id="lbl-total-stands">0</span></div>
									</div>

								</div>

								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie-type-stands"></canvas>
											</div>
										</div>
									</div>
								</div>



							</div>

							<div class="flex-fill">

								<div class="c-card-header ">
									<h5 class="c-card-title mb-0">Tipo(s) de Usuarios</h5>

									<div>
										<div>Usuarios totales: <span id="lbl-tot-usrs">0</span></div>
									</div>
								</div>

								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie-users"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>

				</div>


				<div class="row">


					<div class="col-md-4 col-sm-12" style="margin-bottom: 24px;">

						<div class="card flex-fill w-100">

							<div class="flex-fill">

								<div class="c-card-header ">
									<h5 class="c-card-title mb-0">Medio de visita</h5>
								</div>

								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xl">
												<canvas id="chartjs-dashboard-pie-stand-visits"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td> </td>
													<td id="lbl_visitas_totales" class="text-right"></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>


							</div>

							<div class="flex-fill">

								<div class="c-card-header ">
									<h5 class="c-card-title mb-0">Chats creados</h5>
								</div>

								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xl">
												<canvas id="chartjs-dashboard-stand-chats-created"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Chats totales</td>
													<td id="lbl-total-chats" class="text-right"></td>
												</tr>
											</tbody>
										</table>

									</div>
								</div>

							</div>

						</div>



					</div>


					<div class="col-md-8 col-sm-12">

						<div class="col-sm-12 col-md-12 d-flex order-12 order-xxl-12">
							<div class="card flex-fill w-100 ">

								<div class="c-card-header ">
									<h5 class="c-card-title mb-0">Interacciones por stand</h5>
								</div>

								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-interactions"></canvas>
											</div>
										</div>
										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Interacciones totales</td>
													<td id="lbl-tot-interactions" class="text-right">0</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>

							</div>
						</div>

					</div>

				</div>


				<hr>


				<br>

				<div class="row">

					<div class="col-sm-12 col-md-8 ">
						<div class="card flex-fill w-100 ">
							<div class="c-card-header ">

								<h5 class="c-card-title mb-0">Origen de las visitas</h5>
							</div>

							<div class="card-body px-4">
								<div id="world_map" style="height:350px;"></div>
							</div>
						</div>
					</div>

					<div   class="col-sm-12 col-md-4  d-flex">
						<div class="card flex-fill w-100 ">
							<div class="c-card-header ">
								<h5 class="c-card-title mb-0">Países</h5>
							</div>

							<div class="card-body d-flex">
								<div class="align-self-center w-100">
									<div class="py-3">
										<div class="chart chart-xs">
											<canvas id="chartjs-dashboard-pie-countries"></canvas>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

				</div>

			</div>

			<!-- ////////////////////////////////////////////////////////////////////////// -->


		</div>


	</div>

	<br>
	<br>

</div>

<script type="text/javascript">

var setSelectTodoStand = new Set();



var id_pabellon; 
var numerosStands = '(0)';
var setStands = new Set();

function cambiarPabellon(id_pabellon){

	globalThis.id_pabellon = id_pabellon;
    getStandsList();

}
// onchange=""







function seleccionarTodos(codigo){
	//checked
	let btn = document.getElementById(codigo+'Btn').value;
	if (btn == '0' ) {

			$("."+codigo).attr("checked","");//con esto se puede cambiar cualquier atributo
			$("."+codigo).attr("value","1");//con esto se puede cambiar cualquier atributo
			$("#"+codigo+'Btn').attr("value","1");//con esto se puede cambiar cualquier atributo

			setSelectTodoStand.add(codigo+'Btn');

			let todosClases = document.getElementsByClassName(codigo);
			for(let i of todosClases){
				if (i.value == "1") {

					stringCheck(i.id,true);

				}
			}

		
	}else{
        $("."+codigo).removeAttr("checked");
		$("."+codigo).attr("value","0");//con esto se puede cambiar cualquier atributo
		$("#"+codigo+'Btn').attr("value","0");//con esto se puede cambiar cualquier atributo

		setSelectTodoStand.delete(codigo+'Btn');


		let todosClases = document.getElementsByClassName(codigo);
		for(let i of todosClases){
			if (i.value == "0") {

				stringCheck(i.id,false);

			}
		}

	}
	getStandsList();


}

function cambiarValorCheck(id){
	let valueCheck = document.getElementById(id).value
	let classCheck = document.getElementById(id).className
	if (valueCheck == "0") {

		$("#"+id).attr("checked","");
		$("#"+id).attr("value","1");
		

		stringCheck(id,true);
	}else if (valueCheck == "1") {
        $("#"+id).removeAttr("checked");
		$("#"+id).attr("value","0");


		stringCheck(id,false);

	}
	
}



function stringCheck(value,bool){

	if (bool) {
		globalThis.setStands.add(value.substring(10));


	}else{
		globalThis.setStands.delete(value.substring(10));
	}

	let numerosStandsArray = '(';

	for (let item of globalThis.setStands){
		numerosStandsArray += item + ',' ;
	}
	if (numerosStandsArray == '(' ){
		numerosStandsArray = '(0)';
	}else{
		numerosStandsArray = numerosStandsArray.substring(0, numerosStandsArray.length - 1);
		numerosStandsArray += ')';		
	}




	globalThis.numerosStands = numerosStandsArray;


}



</script>

<script src="../js/dash__Board__.js"></script>
