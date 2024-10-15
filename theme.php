<?php 
	$jsondata = file_get_contents("./api/main.json");
	$data = json_decode($jsondata, true);
	$json = $data['app'];
	if(isset($_POST['submit'])){
		$message = '<div class="has-sidebar-left has-sidebar-tabs"><div class="container-fluid relative animatedParent animateOnce p-lg-5"><div class="alert alert-success" id="flash-msg"><center><h4 style="color:white!important"><i class="icon fa fa-check"></i>Updated!</h4></center></div></div></div>';
		$jsonData = file_get_contents("./api/main.json");
		$arrayData = json_decode($jsonData, true);
		$replacementData = array(
			'app' =>  array(
				'theme' => $_POST["theme"]));
		$newArrayData = array_replace_recursive($arrayData, $replacementData);
		$newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);

		file_put_contents("./api/main.json", $newJsonData);
		header("Location: theme.php?message=$message");
	}
include ('includes/header.php');
?>

<div class="has-sidebar-left has-sidebar-tabs">
    <div class="container-fluid relative animatedParent animateOnce p-lg-5">
        <div class="col-md-8 mx-auto">
            <div class="card-body">
                <div class="card bg-primary text-white">
                    <div class="card-header card-header-warning">
                        <center>
                            <h2><i class="icon icon-paint-brush"></i> Theme Change</h2>
                        </center>
                    </div>

                    <div class="alert alert-info alert-dismissible" role="alert">
						<center>
							<h3 style="color:black!important">You <strong style="color:black!important">must</strong> use <em>modded</em> XCIPTV to use Panel themes!</h3>
						</center>
					</div>

		            <div class="card-body">

		                <form method="post">
								<div class="form-group ">
		                        	<label class="control-label" for="theme" >Choose Your Layout</label>
		                            <select class="select form-control" id="select" name="theme">
										<option value="theme_d" <?=$json['theme']=='theme_d'?'selected':'' ?>>Default</option>
		                                <option value="theme_1" <?=$json['theme']=='theme_1'?'selected':'' ?>>Theme 1</option>
										<option value="theme_2" <?=$json['theme']=='theme_2'?'selected':'' ?>>Theme 2</option>
										<option value="theme_3" <?=$json['theme']=='theme_3'?'selected':'' ?>>Theme 3</option>
		                            </select>
								</div>

									<hr>

		                                <div class="form-group">
		                                    <center>
		                                        <button class="btn btn-info " name="submit" type="submit">
		                                            <i class="icon icon-check"></i> Submit
		                                        </button>
		                                    </center>
		                                </div>
		                            </form>

						  			<div class="container">
						    			<div class="row">
											<div class="col mx-1">
							  					<div class="card">
							    					<div class="card-block">
														<h4 class="card-title text-center card card bg-light text-dark">Standard</h4>
								  					</div>
								    				<img class="card-img-bottom" src="./img/d.jpg" alt="Card image">
												</div>
											</div>
											<div class="col">
												<div class="card">
													<div class="card-block">
									  					<h4 class="card-title text-center card card bg-light text-dark">Theme 1</h4>
									   	 			</div>
									      			<img class="card-img-bottom" src="./img/1.jpg" alt="Card image">
									        	</div>
										  	</div>
											<div class="col">
												<div class="card">
													<div class="card-block">
								   						<h4 class="card-title text-center card card bg-light text-dark">Theme 2</h4>
								     				</div>
													<img class="card-img-bottom" src="./img/2.jpg" alt="Card image">
										  		</div>
									   		</div>
									    	<div class="col">
									      		<div class="card">
													<div class="card-block">
								    					<h4 class="card-title text-center card card bg-light text-dark">Theme 3</h4>
								      				</div>
													<img class="card-img-bottom" src="./img/3.jpg" alt="Card image">
									  			</div>
									   		</div>
										</div>
                                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('includes/footer.php');?>

</body>
</html>