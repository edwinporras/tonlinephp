<div class="cont_main_card">
			<div class="row">
				<?php 
					$where="where 1=1";
					$nombre =mysqli_real_escape_string($con, $_REQUEST['nombre']??'');

					if (empty($nombre)==false) {
						$where=" and productos.nombre like '%".$nombre."%'";
					}
					// OBTENER CANTIDAD DE REGISTROS --> INICIO
					$queryCuenta="SELECT COUNT(*) AS cuenta FROM productos $where;";
					$resCuenta=mysqli_query($con, $queryCuenta);
					$rowCuenta=mysqli_fetch_assoc($resCuenta);
					$totalRegistros=$rowCuenta['cuenta'];
					// OBTENER CANTIDAD DE REGISTROS --> FIN

					$elementosPorPagina=8;
					$totalPaginas=ceil($totalRegistros/$elementosPorPagina); //REDONDEA HACIA ARRIBA
					$paginaSelecionada=$_REQUEST['pagina']??false;
					if ($paginaSelecionada==false) {
						$inicioLimite=0;
						$paginaSelecionada=1;
					}else{
						$inicioLimite=($paginaSelecionada-1)*$elementosPorPagina;
					}
					$limite="limit $inicioLimite, $elementosPorPagina";
					
					$query="SELECT productos.id_producto, productos.nombre, productos.existencia, productos.precio, files.id_files, files.file_name  
					FROM productos 
					JOIN files ON productos.id_producto = files.id_producto 
					JOIN categorias ON productos.id_categoria = categorias.id_categoria 
					$where
					GROUP BY productos.id_producto
					$limite ";

					$resultado=mysqli_query($con,$query);
					while ($row=mysqli_fetch_assoc($resultado)) {
						?>
						<div class="cont_inf_card">
							<img class="img_cont_card" src="../admin/<?php echo $row['file_name'] ?>" class="img-responsive" alt="img">
							<h4 class="titulo_cont_card"><?php echo $row['nombre'] ?></h4>
							<p class="desc_cont_card"><strong> Precio: </strong><?php echo $row['precio'] ?></p> 
							<p class="desc_cont_card"><strong> Existencia: </strong><?php echo $row['existencia'] ?></p> 
							<a class="btn btn-success" href="index.php?modulo=detalleProductos&id=<?php echo $row['id_producto'] ?>">Ver detalles</a>
						</div>

						
						<?php
					}
				?>
			</div>
		<?php 
			if ($totalPaginas>0) {
				?>
					<nav aria-label="Page navigation">
						<ul class="pagination">
							<?php 
								if ($paginaSelecionada!=1) {
							?>
							<li class="page-item">
								<a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSelecionada-1); ?>" aria-label="Previous">Anterior
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<?php 
								}
							?>

							<?php 
								for ($i=1; $i<=$totalPaginas; $i++) { 
							?>
							<li class="page-item <?php echo ($paginaSelecionada==$i)?"active":""; ?>">
								<a class="page-link" href="index.php?modulo=productos&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
							</li>
							<?php 
								}
							?>
							<?php 
							if ($paginaSelecionada!=$totalPaginas) {
							?>
							<li class="page-item">
								<a class="page-link" aria-label="Next" href="index.php?modulo=productos&pagina=<?php echo ($paginaSelecionada+1); ?>">Siguiente
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
								</a>
							</li>
							<?php 
							}
							?>
						</ul>
					</nav>
				<?php
			}
		?>

		<!-- </div> -->
	</div>