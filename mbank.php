<?php
ob_clean(); // clear output buffer
header("Location:nap-mbbank.php"); // redirect to "nap-momo.php"
error_reporting(0);

include_once 'connect.php';
//check lsgd
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.web2m.com/historyapimb/Nguyenthinh01/0353113640/DA7802EF-EFAE-135F-355E-55E5006BC834'); // thay history mbbank của bạn vào đây
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$result = json_decode($response, true);
#print_r($response);
$result = json_decode($response, true);
$count = count($result['data']);
for ($x = 0; $x <= $count; $x++) {
    $postingDate = $result['data'][$x]['postingDate'];
    $transactionDate = $result['data'][$x]['transactionDate'];
    $accountNo = $result['data'][$x]['accountNo'];
    $creditAmount = $result['data'][$x]['creditAmount'];
    $debitAmount = $result['data'][$x]['debitAmount'];
    $currency = $result['data'][$x]['currency'];
    $description = $result['data'][$x]['description'];
    $availableBalance = $result['data'][$x]['availableBalance'];
    $refNo = $result['data'][$x]['refNo'];


    $check = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `mbbank` WHERE `postingDate`='" . $postingDate . "'"));
    if ($check['postingDate'] == $postingDate) {
        echo 'Chưa có dư liệu';
    } else {
        mysqli_query($conn, "UPDATE `account` SET vnd=vnd+{$creditAmount}, tongnap=tongnap+{$creditAmount} WHERE username='$description'");

        mysqli_query($conn, "INSERT INTO `mbbank` SET 
    `postingDate`='$postingDate',
    `transactionDate`='$transactionDate',
    `accountNo`='$accountNo',
    `creditAmount`='$creditAmount',
    `debitAmount`='$debitAmount',
    `currency`='$currency',
    `description`='$description',
    `availableBalance`='$availableBalance',
    `refNo`='$refNo'
    ");

    }

}
#print_r($a['amount']);
?>
<script>
    window.alert("Load lại trang sau khi đã chuyển khoản đúng nội dung !");
    window.alert("Hệ thống xử lý tự động từ 1-10',sau 10' nếu không thấy cộng coin vui lòng liên hệ admin để xử lý !");
</script>
<?php
exit();
?>