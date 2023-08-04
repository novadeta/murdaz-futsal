<?php
  $url = "http://" . $_SERVER['SERVER_NAME'] . "/futsal/public";
 ?>
<body onload="javascript:window.print()" style ="margin:0 auto; width: 1000px;">

<table width="80%" cellspacing="0" cellpadding="0">
    <tr>
        <td style="font-size: 16; margin:0 auto; text-align: center;" ><b style="text-align: center;">MURDAZ FUTSAL</b></td>
    </tr>
    <tr>
        <td align="center" style="font-size: 16; margin:0 auto; text-align: center;"><b>Jl. K.H. Zaenal Arifin No.44, Cikulak, Kec. Waled, Kabupaten Cirebon, Jawa Barat, 45187</b></td>
    </tr>
</table><br>
<div style="border-bottom: 3px dotted gray;"></div><br>

<label style="margin:0 auto; text-align: center;"><font size="5" style="margin:0 auto; text-align: center;"><u> LAPORAN TRANSAKSI</u></font></label>

<p>&nbsp;</p>

<table style="border: 1px solid gray" width="100%">
<tr>
            <th style="border: 1px solid gray">No</th>
            <th style="border: 1px solid gray">Tanggal dan Waktu Pesan </th>
            <th style="border: 1px solid gray">Tanggal Main</th>
            <th style="border: 1px solid gray">Jam Mulai</th>
            <th style="border: 1px solid gray">Jam Berakhir</th>
            <th style="border: 1px solid gray">Harga</th>
            <th style="border: 1px solid gray">Foto Pembayaran</th>
</tr>
</td>

            <?php
            include_once "./core/TransactionController.php";
            $transaction = new TransactionController();
            $result_transaction = $transaction->get_transaction(['status' => 'history']) ?? [];
            $no=1;
            foreach($result_transaction as $result){
            ?>
            <tr>
                <td style="border: 1px solid gray"><?php echo"$no" ?></td>
            <td style="border: 1px solid gray"><?php echo "$result[date]" ?></td>
                <td style="border: 1px solid gray"><?php echo "$result[date_play]" ?></td>
<td style="border: 1px solid gray"><?php echo "$result[start_time]" ?></td>
<td style="border: 1px solid gray"><?php echo "$result[end_time]" ?></td>
<td style="border: 1px solid gray"><?php echo "$result[price]" ?></td>
<td style="border: 1px solid gray">
<img width="100" src="<?= $url .'/assets/photo_payments/'.$result['payment'] ?>" alt="" srcset=""></td>
                
</tr>
<?php $no++; } ?>
</table>

<p>&nbsp;</p>

</body>