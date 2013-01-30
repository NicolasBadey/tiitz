<?php

class GeneratorController extends tzController{

	public function generateEntityAction() {

		$objPDO = tzSQL::getPDO();
		
		if (!is_null($objPDO)) {
			$obj = $objPDO->prepare('show tables');
			$obj->execute();
			$tables = $obj->fetchAll();

			$columsList = array();
			foreach ($tables as $key => $value) {
				$colums = $objPDO->prepare('show columns from '.$value[0]);
				$colums->execute();
				$columsList[$value[0]] = $colums->fetchAll(PDO::FETCH_ASSOC);
			}
			#var_dump($columsList);
			if(empty($_POST['generateEntity']) && empty($_POST['tablename'])) {
				require_once ROOT.'/app/components/gui/views/entityGeneratorForm.php';
			}
			else{
				require_once(ROOT.'/app/components/gui/includes/entityGenerator.php');
			}
		} else {
			Header("Location: /");
		}
		
	}

	public function postedAction() {
		echo 'LOL';
	}
}