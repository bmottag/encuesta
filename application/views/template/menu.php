        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				
<?php
		$userRol = $this->session->userdata("rol");
		
		if($userRol==4){ //USUARIOS DELEGADOS
			$enlace = base_url("dashboard/delegados");
			$titulo = 'Representante';
		}elseif($userRol==6){ //USUARIOS OPERADOR
			$enlace = base_url("dashboard/operador");
			$titulo = 'Operador';
		}elseif($userRol==3){ //USUARIOS DELEGADOS
			$enlace = base_url("dashboard/coordinador");
			$titulo = 'Coordinador';
		}elseif($userRol==2){ //USUARIOS DIRECTIVO
			$enlace = base_url("dashboard/directivo");
			$titulo = 'Directivo';
		}else{
			$enlace = base_url("dashboard/admin");
			$titulo = 'Admin';
		}
?>

		<a class="navbar-brand" href="<?php echo $enlace; ?>">CEIV-CCV</a>
				
            </div>
            <!-- /.navbar-header -->

		


            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->	
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
<?php 
if($userRol==1){ //ADMIN
?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-gear"></i> Configuraciones <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
				
						<li>
							<a href="<?php echo base_url("admin/users"); ?>"><i class="fa fa-users fa-fw"></i> Usuarios</a>
						</li>
						

                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
<?php
}
?>



				<li>
					<a href="<?php echo base_url("menu/salir"); ?>"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
				</li>
				
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->



			
			
			


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $this->session->firstname; ?></a>
                        </li>
						
                        <li>
							<a href="<?php echo base_url("encuesta/manzana"); ?>"><i class="fa fa-dashboard fa-fw"></i> Formularios</a>
                        </li>

                        <li>
							<a href="<?php echo base_url("reemplazo"); ?>"><i class="fa fa-retweet fa-fw"></i> Reemplazos</a>
                        </li>
						

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>