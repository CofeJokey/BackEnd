<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 06.11.2017
 * Time: 23:40
 */

class userController extends Controller
{

    public function index(){
        $examples=$this->model->load();           // просим у модели все записи
        $this->setResponce($examples);            // возвращаем ответ
    }
    public function view($data){
        $example=$this->model->load($data['id']); // просим у модели конкретную запись
        $this->setResponce($example);
    }
    public function add(){
        if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['score'])) {
            // мы передаем в модель массив с данными
            // модель должна вернуть boolean
            $dataToSave = array('id'=>$_POST['id'], 'name'=>$_POST['name'], 'score'=>$_POST['score']);
            $addedItem  = $this->model->create($dataToSave);
            $this->setResponce($addedItem);
        }
    }
    public function edit($data){
        // НАПИШИТЕ РЕАЛИЗАЦИЮ метода save в классе Model
        if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['score'])) {
            // мы передаем в модель массив с данными
            // модель должна вернуть boolean
            $dataToEdit = array('id'=>$_POST['id'], 'name'=>$_POST['name'], 'score'=>$_POST['score']);
            $editItem  = $this->model->save($dataToEdit, $data['id']);
            $this->setResponce($editItem);
        }
    }
    public function delete($data){
        // НАПИШИТЕ РЕАЛИЗАЦИЮ метода save в классе Model
        $examples=$this->model->delete($data['id']); // просим у модели конкретную запись
        $this->setResponce($examples);
    }
}