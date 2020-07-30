<?php

namespace yii\jui\autosearch;

use yii\helpers\Html;
use yii\jui\AutoComplete as JuiAutoComplete;

class AutoComplete extends JuiAutoComplete
{

    /**
     * @var array|string|\yii\web\JsExpression
     * @see http://api.jqueryui.com/autocomplete/#option-source
     */
    public $source = [];

    /**
     * @var int
     * @see http://api.jqueryui.com/autocomplete/#option-minLength
     */
    public $minLength = 0;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'form-control');
        if (!array_key_exists('onfocus', $this->options)) {
            $this->options['onfocus'] = 'jQuery(this).autocomplete(\'search\');';
        }
        $this->clientOptions = array_merge($this->clientOptions, [
            'source' => $this->source,
            'minLength' => $this->minLength
        ]);
    }
}
