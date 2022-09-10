<?php

namespace geantgram\translatemanager\controllers\actions;

/**
 * Deletes an existing Language model.
 *
 * @author Rio Hazuki <hazuki_scorpion@yahoo.fr>
 *
 * @since 1.3
 */
class DeleteAction extends \yii\base\Action
{
    /**
     * Deletes an existing Language model.
     * If deletion is successful, the browser will be redirected to the 'list' page.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function run($id)
    {
        $this->controller->findModel($id)->delete();

        return $this->controller->redirect(['list']);
    }
}
