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

	public function error($field, $text = null, $options = array()) {
		// extends the default error message stuff
		$options = array_merge(
			array(
				'class' => 'help-inline',
				'wrap' => 'span'
			),
			$options
		);
		return parent::error($field, $text, $options);
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
				),
				'format' => array(
					'before', 'label', 'between', 'input', 'after'
				)
			),
			$options
		);

		// need to do a little bit of type magic here
		if(!isset($options['type'])) {
			$def = $this->_introspectModel($this->model(), 'fields', $this->field());
			if(isset($this->map[$def['type']]) && $this->map[$def['type']] == 'checkbox') {
				$options['format'] = array('before', 'input', 'between', 'after');
			}
		}

		return parent::input($field_name, $options);
	}

	public function textarea($field_name, $options = array()) {
		// extends the textarea functionality
		$input = parent::textarea($field_name, $options);
		$error = $this->error($field_name, $this->_extractOption('error', $options));
		return $this->Html->div('controls', $input . $error);
	}

	public function checkbox($field_name, $options = array()) {
		// extends the default checkbox
		// return parent::checkbox($field_name, $options);
		$label = $this->_inputLabel($field_name, array('class'=>'checkbox'), array(
			'type'=>'checkbox'));
		$html = parent::checkbox($field_name, $options);
		$html = preg_replace('/>([\w\s]*)<\/label/', sprintf('>%s $1</label', $html), $label);
		$error = $this->error($field_name, $this->_extractOption('error', $options));
		$html = $this->Html->div('controls', $html . $error);
		return $html;
	}

	public function text($field_name, $options = array()) {
		// extends the default text box
		if(in_array($field_name, array('email', 'e-mail', 'e_mail')))
			$options = array_merge(array('type'=>'email'), $options);
		$input = parent::text($field_name, $options);
		$error = $this->error($field_name, $this->_extractOption('error', $options));
		return $this->Html->div('controls', $input . $error);
	}

	public function password($field_name, $options = array()) {
		// extends the default password box
		$input = parent::password($field_name, $options);
		$error = $this->error($field_name, $this->_extractOption('error', $options));
		return $this->Html->div('controls', $input . $error);
	}

	public function select($field_name, $options = array(), $attributes = array()) {
		// extends the default select box
		$input = parent::select($field_name, $options, $attributes);
		$error = $this->error($field_name, $this->_extractOption('error', $options));
		return $this->Html->div('controls', $input . $error);
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