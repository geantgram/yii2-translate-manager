<?php

namespace geantgram\translatemanager\controllers\actions;

use geantgram\translatemanager\services\Optimizer;

/**
 * Class for optimizing language database.
 *
 * @author Rio Hazuki <hazuki_scorpion@yahoo.fr>
 *
 * @since 1.0
 */
class OptimizerAction extends \yii\base\Action
{
    /**
     * Removing unused language elements.
     *
     * @return string
     */
    public function run()
    {
        $optimizer = new Optimizer();
        $optimizer->run();

        $removedLanguageElements = $optimizer->getRemovedLanguageElements();

        return $this->controller->render('optimizer', [
            'newDataProvider' => $this->controller->createLanguageSourceDataProvider($removedLanguageElements),
        ]);
    }
}
