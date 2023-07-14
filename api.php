<?php 
if(isset($_GET['key']) && $_GET['key'] == '123') {
    $res = array(
        'status' => 'Thành Công',
        'key' => '1',
        'expired' => 'NguyenDucKien'
    );
    echo json_encode($res);
} ?>