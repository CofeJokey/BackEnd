<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 06.11.2017
 * Time: 23:40
 */

class menuController extends Controller {
    public function index(){
        $examples=$this->model->load();		// просим у модели все записи
        $this->setResponce($examples);		// возвращаем ответ
    }
}