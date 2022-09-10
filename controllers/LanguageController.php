<?php

namespace geantgram\translatemanager\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use geantgram\translatemanager\models\Language;

/**
 * Controller for managing multilinguality.
 *
 * @author Rio Hazuki <hazuki_scorpion@yahoo.fr>
 *
 * @since 1.0
 */
class LanguageController extends Controller
{
    /**
     * @var \geantgram\translatemanager\Module TranslateManager module
     */
    public $module;

    /**
     * @inheritdoc
     */
    public $defaultAction = 'list';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['list', 'change-status', 'optimizer', 'scan', 'translate', 'save', 'dialog', 'message', 'view', 'create', 'update', 'delete', 'delete-source', 'import', 'export'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['list', 'change-status', 'optimizer', 'scan', 'translate', 'save', 'dialog', 'message', 'view', 'create', 'update', 'delete', 'delete-source', 'import', 'export'],
                        'roles' => $this->module->roles,
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'list' => [
                'class' => 'geantgram\translatemanager\controllers\actions\ListAction',
            ],
            'change-status' => [
                'class' => 'geantgram\translatemanager\controllers\actions\ChangeStatusAction',
            ],
            'optimizer' => [
                'class' => 'geantgram\translatemanager\controllers\actions\OptimizerAction',
            ],
            'scan' => [
                'class' => 'geantgram\translatemanager\controllers\actions\ScanAction',
            ],
            'translate' => [
                'class' => 'geantgram\translatemanager\controllers\actions\TranslateAction',
            ],
            'save' => [
                'class' => 'geantgram\translatemanager\controllers\actions\SaveAction',
            ],
            'dialog' => [
                'class' => 'geantgram\translatemanager\controllers\actions\DialogAction',
            ],
            'message' => [
                'class' => 'geantgram\translatemanager\controllers\actions\MessageAction',
            ],
            'view' => [
                'class' => 'geantgram\translatemanager\controllers\actions\ViewAction',
            ],
            'create' => [
                'class' => 'geantgram\translatemanager\controllers\actions\CreateAction',
            ],
            'update' => [
                'class' => 'geantgram\translatemanager\controllers\actions\UpdateAction',
            ],
            'delete' => [
                'class' => 'geantgram\translatemanager\controllers\actions\DeleteAction',
            ],
            'delete-source' => [
                'class' => 'geantgram\translatemanager\controllers\actions\DeleteSourceAction',
            ],
            'import' => [
                'class' => 'geantgram\translatemanager\controllers\actions\ImportAction',
            ],
            'export' => [
                'class' => 'geantgram\translatemanager\controllers\actions\ExportAction',
            ],
        ];
    }

    /**
     * Finds the Language model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param string $id
     *
     * @return Language the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Language::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Returns an ArrayDataProvider consisting of language elements.
     *
     * @param array $languageSources
     *
     * @return ArrayDataProvider
     */
    public function createLanguageSourceDataProvider($languageSources)
    {
        $data = [];
        foreach ($languageSources as $category => $messages) {
            foreach ($messages as $message => $boolean) {
                $data[] = [
                    'category' => $category,
                    'message' => $message,
                ];
            }
        }

        return new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => false,
        ]);
    }
}
