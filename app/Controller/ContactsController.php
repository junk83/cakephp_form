<?php

App::uses('AppController', 'Controller');
class ContactsController extends AppController
{
    //モデルの指定
    public $uses = array('Contact');

    public function index()
    {
        $this->set('typeList', $this->Contact->getTypeList());
        if($this->request->is('post'))
        {
            //リクエストデータをモデルにセット
            $this->Contact->set($this->request->data);
            if($this->Contact->validates()){
                //バリデーションが突破したら確認画面に遷移
                //リクエストーデータはセッションに保存
                $this->Session->write('datas', $this->request->data);
                $this->redirect('confirm');
            }else{
                //バリデーションに失敗したらデータとエラーメッセージをviewにセット
                $this->set('datas', $this->request->data);
                $this->set('valerror', $this->Contact->validationErrors);
            }

        }elseif($this->Session->check('datas')){
            //セッションのデータをviewにセット
            $this->set('datas', $this->Session->read('datas'));
            //セッションを削除
            $this->Session->delete('datas');
        }

    }

    public function confirm()
    {
        $this->set('typeList', $this->Contact->getTypeList());
        //セッションが保存されているかチェク
        if($this->Session->check('datas'))
        {
            //セッションのデータをviewにセット
            $this->set('datas', $this->Session->read('datas'));
        }
        else
        {
            //フォームにデータが入力されていない場合はindexにリダイレクト
            $this->redirect('/contacts/');
        }
    }

    public function thanks()
    {
        if($this->request->is('post') && $this->Session->check('datas'))
        {
            $datas = $this->Session->read('datas');
            //セッションを削除する
            $this->Session->delete('datas');

            $data = array(
                'name' => $datas['name'],
                'email' => $datas['email'],
                'type' => $datas['type'],
                'body' => $datas['body']
            );
            //DB登録
            $this->Contact->save($data);
        }
        else
        {
            //thanksを直叩きされた場合はindexにリダイレクト
            $this->redirect('/contacts/');
        }
    }

}