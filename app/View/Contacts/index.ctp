<form action="" method="post">
<table class="form">
    <tbody>
        <tr>
            <td>お名前</td>
            <td>
                <input type="text" name="name" value="<?php echo isset($datas['name'])? h($datas['name']) : '' ?>">
                <?php if(isset($valerror['name'])): ?>
                  <br><font color="red"><?= $valerror['name'][0]?></font>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>メールアドレス</td>
            <td>
                <input type="text" name="email" value="<?php echo isset($datas['email'])? h($datas['email']) : '' ?>">
                <?php if(isset($valerror['email'])): ?>
                  <br><font color="red"><?= $valerror['email'][0]?></font>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>お問い合わせ種類</td>
            <td>
                <?php echo $this->Form->select('type', $typeList, [
  'value' => isset($datas['type']) ? $datas['type'] : '1',
  ]) ?>
                <?php if(isset($valerror['type'])): ?>
                  <font color="red"><?= $valerror['type'][0]?></font>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>お問い合わせ内容</td>
            <td>
                <textarea cols=40 rows=7 name="body"><?php echo isset($datas['body'])? h($datas['body']) : '' ?></textarea>
                <?php if(isset($valerror['body'])): ?>
                <font color="red"><?= $valerror['body'][0]?></font>
                <?php endif; ?>
            </td>
        </tr>
    </tbody>
</table>
<p class="buttons">
    <input type="submit" value="確認画面へ">
</p>
</form>