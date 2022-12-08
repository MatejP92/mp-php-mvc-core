<?php
/** User: Matej */

namespace app\core\form;

use app\core\Model;

/**
 * Class TextAreaField
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package app\core\form
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