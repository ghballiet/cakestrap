<?
App::uses('FormHelper', 'View/Helper');

class BootstrapFormHelper extends FormHelper {
	private $map = array(
		'string' => 'text', 'datetime' => 'datetime',
		'boolean' => 'checkbox', 'timestamp' => 'datetime',
		'text' => 'textarea', 'time' => 'time',
		'date' => 'date', 'float' => 'number',
		'integer' => 'number'
	);

	public function create($model = null, $options = array()) {
		$options = array_merge(
			array(
				'class' => 'form-horizontal'
			),
			$options
		);
		return parent::create($model, $options);
	}

	public function input($field_name, $options = array()) {
		$this->setEntity($field_name);
		$model_key = $this->model();
		$field_key = $this->field();

		$options = array_merge(
			array(
				'div' => array(
					'class' => 'control-group'
				),
				'label' => array(
					'class' => 'control-label'
				)
			),
			$options
		);

		// need to do a little bit of type magic here
		if(!isset($options['type'])) {
			$def = $this->_introspectModel($this->model(), 'fields', $this->field());
			if(isset($this->map[$def['type']]) && $this->map[$def['type']] == 'checkbox') {
				$options['format'] = array('before', 'input', 'between', 'after', 'error');
			}
		}

		return parent::input($field_name, $options);
	}

	public function textarea($field_name, $options = array()) {
		// extends the textarea functionality
		return $this->Html->div('controls', parent::textarea($field_name, $options));
	}

	public function checkbox($field_name, $options = array()) {
		// extends the default checkbox
		// return parent::checkbox($field_name, $options);
		$label = $this->_inputLabel($field_name, array('class'=>'checkbox'), array(
			'type'=>'checkbox'));
		$html = parent::checkbox($field_name, $options);
		$html = preg_replace('/>(\w*)<\/label/', sprintf('>%s $1</label', $html), $label);
		$html = $this->Html->div('controls', $html);
		return $html;
	}

	public function text($field_name, $options = array()) {
		// extends the default text box
		if(in_array($field_name, array('email', 'e-mail', 'e_mail')))
			$options = array_merge(array('type'=>'email'), $options);
		return $this->Html->div('controls', parent::text($field_name, $options));
	}

	public function password($field_name, $options = array()) {
		// extends the default password box
		return $this->Html->div('controls', parent::password($field_name, $options));
	}

	public function select($field_name, $options = array(), $attributes = array()) {
		// extends the default select box
		return $this->Html->div('controls', parent::select($field_name, $options, $attributes));
	}

	public function submit($caption = null, $options = array()) {
		// extends the default form ending
		$options = array_merge(
			array('class' => 'btn btn-primary'),
			$options
		);

		return $this->Html->tag(
			'div',
			parent::submit($caption, $options),
			array('class' => 'form-actions')
		);
	}
}
?>