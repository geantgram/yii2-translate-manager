<?php

namespace geantgram\translatemanager\controllers\actions;

use Yii;
use geantgram\translatemanager\models\LanguageSource;
use geantgram\translatemanager\models\LanguageTranslate;

/**
 * Class for returning messages in the given language
 *
 * @author Rio Hazuki <hazuki_scorpion@yahoo.fr>
 *
 * @since 1.2
 */
class MessageAction extends \yii\base\Action
{
    /**
     * Returning messages in the given language
     *
     * @return string
     */
    public function run()
    {
        $languageTranslate = LanguageTranslate::findOne([
            'id' => Yii::$app->request->get('id', 0),
            'language' => Yii::$app->request->get('language_id', ''),
        ]);

        if ($languageTranslate) {
            $translation = $languageTranslate->translation;
        } else {
            $languageSource = LanguageSource::findOne([
                'id' => Yii::$app->request->get('id', 0),
            ]);

            $translation = $languageSource ? $languageSource->message : '';
        }

        return $translation;
    }
}
