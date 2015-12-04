<?php

class QuietController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}
}