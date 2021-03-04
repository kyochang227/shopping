<!--購入履歴-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>購入履歴 | HEMZON</title>
<link rel="stylesheet" href="shop.css">
</head>
<body>
<h1>購入履歴</h1>
<table>
    <tr>
        <td>id</td>
        <td>氏名</td>
        <td>住所</td>
        <td>電話番号</td>
        <td>商品名</td>
        <td>価格</td>
        <td>個数</td>
        <td>合計</td>
        <td>購入日時</td>
    </tr>
  <?php foreach($history as $h):?>
    <tr>
      <td><?php echo $h['user_id']; ?></td>
      <td><?php echo $h['name']; ?></td>
      <td><?php echo $h['address']; ?></td>
      <td><?php echo $h['tel']; ?></td>
      <td><?php echo $h['item_name']; ?></td>
      <td><?php echo $h['item_price']; ?></td>
      <td><?php echo $h['item_num']; ?></td>
      <td><?php echo $h['item_sum']; ?></td>
      <td><?php echo $h['created_at']; ?></td>
    </tr>
  <?php endforeach;?>
</table>
<div class="base">
  <a href="index.php">お買い物に戻る</a>　　
</div>
</body>
</html>