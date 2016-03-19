<table class="form">
    <tbody>
        <tr>
            <td>お名前</td>
            <td>
                <?php echo isset($datas['name'])? h($datas['name']) : '' ?>
            </td>
        </tr>
        <tr>
            <td>メールアドレス</td>
            <td>
                <?php echo isset($datas['email'])? h($datas['email']) : '' ?>
            </td>
        </tr>
        <tr>
            <td>お問い合わせ種類</td>
            <td>
                <?php echo isset($datas['type']) ? h($typeList[$datas['type']]) : '' ?>
            </td>
        </tr>
        <tr>
            <td>お問い合わせ内容</td>
            <td>
                <?php echo isset($datas['body'])? nl2br(h($datas['body'])) : '' ?>
            </td>
        </tr>
    </tbody>
</table>

<p class="buttons">
    <button type="button" onclick="location.href='/cakephp_form/contacts'">戻る</button>
    <input type="submit" onclick="location.href='thanks'"value="送信する">
</p>
