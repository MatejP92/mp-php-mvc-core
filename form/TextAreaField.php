<?php
/** User: Matej */

namespace matejpal\phpmvc\form;

use matejpal\phpmvc\Model;

/**
 * Class TextAreaField
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package matejpal\phpmvc\form
*/

class TextAreaField extends BaseField {
    
	public function renderInput(): string {
        return sprintf(
            "<textarea name='%s' class='form-control%s'>%s</textarea>",
            $this->attribute,
            $this->model->hasError($this->attribute) ? 'is-invalid' : '',
            $this->model->{$this->attribute}
        );
	}
}