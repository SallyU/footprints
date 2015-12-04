<?php
Yii::import('zii.widgets.CPortlet');

class UserMenu extends CPortlet
{
	/*public function init()
	{

	}*/

	protected function renderContent()
	{
		$this->render('userMenu');
	}
}