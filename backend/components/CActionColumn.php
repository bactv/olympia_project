<?php

namespace backend\components;

use Yii;
use yii\helpers\Html;
use yii\grid\ActionColumn;

class CActionColumn extends ActionColumn
{
    /**
     * Initializes the default button rendering callbacks.
     */
    protected function initDefaultButtons()
    {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('cms', 'View'),
                    'class'=>'btn btn-default btn-action',
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a('<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;', $url, $options);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('cms', 'Update'),
                    'class' => 'btn btn-default btn-action',
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;', $url, $options);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('cms', 'Delete'),
                    'class' => 'btn btn-default btn-action',
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;', $url, $options);
            };
        }
    }
}