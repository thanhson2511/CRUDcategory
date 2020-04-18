<?php 
	$mod = $_GET['mod'];
	$act = $_GET['act'];

	switch($mod){
		

		case 'category':
			require 'Controller/CategoryController.php';
			$category_controller = new CategoryController();
			switch($act){
				case 'list':
					$category_controller->index();
					break;
				case 'add':
					$category_controller->create();
					break;
				case 'add-process':
					$category_controller->store();
					break;
				case 'detail':
					$id = $_GET['id'];
					$category_controller->detail($id);
				case 'edit':
					$id = $_GET['id'];
					$category_controller->edit($id);
					break;
				case 'edit-process':
					$category_controller->update();
				case 'delete':
					$id = $_GET['id'];
					$category_controller->destroy($id);

				default;
					die('Action post not found');		
			}


		
			break;
		default:
			die("Mod not found");
	
	}
 ?>