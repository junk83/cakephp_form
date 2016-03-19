<?php

App::uses('AppModel', 'Model');
class Contact extends AppModel{
    public $validate = array(
        'name' => array(
            'rule' => 'notBlank',
            'message' => '名前を入力してください。'
        ),
        'email' => array(
            array(
                'rule' => 'notBlank',
                'message' => 'メールアドレスを入力してください。'
            ),
            array(
                'rule' => 'email',
                'message' => 'メールアドレスを正しく入力してください。'
            )
        ),
        'type' => array(
            'rule' => 'notBlank',
            'message' => 'お問い合わせ種類を選択してください。'
        ),
        'body' => array(
            'rule' => 'notBlank',
            'message' => 'お問い合わせ内容を入力してください。'
        )
    );

    public function getTypeList()
    {
        return array(
            '1' => '商品について',
            '2' => 'お支払いについて',
            '3' => '当サイトについて',
            '4' => 'その他'
        );
    }

}