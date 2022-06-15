<?php
require_once('../../db/utility.php');

if(!empty($_POST)) {
	$action = getPost('action');
	$id = getPost('id');
	$num = getPost('num');

	$cart = [];
	if(isset($_COOKIE['cart'])) {
		$json = $_COOKIE['cart'];
		$cart = json_decode($json, true);
	}

	switch ($action) {
		case 'add':
			$isFind = false;
			for ($i=0; $i < count($cart); $i++) { 
				if($cart[$i]['id'] == $id) {
					$cart[$i]['num'] += $num;
					$isFind = true;
					break;
				}
			}

			if(!$isFind) {
				$cart[] = [
					'id'=>$id,
					'num'=>$num
				];
			}
			setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
			break;
			case 'move':
				$isFind = false;
				for ($i=0; $i < count($cart); $i++) { 
					if($cart[$i]['id'] == $id) {
						if($cart[$i]['num'] >1){
							$cart[$i]['num'] -= $num;
						    $isFind = true;setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
						   break;
						}
						
					}
				}
	
				if(!$isFind) {
					$cart[] = [
						'id'=>$id,
						'num'=>$num
					];
				}
				
				break;
		case 'delete':
			for ($i=0; $i < count($cart); $i++) { 
				if($cart[$i]['id'] == $id) {
					array_splice($cart, $i, 1);
					break;
				}
			}
			setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
		break;
	}
	

}
