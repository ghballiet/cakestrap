<?
App::uses('SessionHelper', 'View/Helper');

class BootstrapSessionHelper extends SessionHelper {
	public function flash($key = 'flash', $attrs = array()) {
		// extends default flash display
		$attrs = array_merge(
			array('params'=>array('class'=>'alert')),
			$attrs
		);
		return parent::flash($key, $attrs);
	}
}
?>