<?php

namespace geantgram\translatemanager\controllers\actions;

use Yii;
use geantgram\translatemanager\bundles\TranslateAsset;
use geantgram\translatemanager\bundles\TranslatePluginAsset;
use geantgram\translatemanager\models\searches\LanguageSourceSearch;

/**
 * This class facilitates the listing of language elements to be translated.
 *
 * @author Rio Hazuki <hazuki_scorpion@yahoo.fr>
 *
 * @since 1.0
 */
class TranslateAction extends \yii\base\Action
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        TranslateAsset::register(Yii::$app->controller->view);
        TranslatePluginAsset::register(Yii::$app->controller->view);
        parent::init();
    }

    /**
     * List of language elements.
     *
     * @return string
     */
    public function run()
    {
        $searchModel = new LanguageSourceSearch([
            'searchEmptyCommand' => $this->controller->module->searchEmptyCommand,
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->controller->render('translate', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'searchEmptyCommand' => $this->controller->module->searchEmptyCommand,
            'language_id' => Yii::$app->request->get('language_id', ''),
        ]);
    }
}
