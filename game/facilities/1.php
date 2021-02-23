<?php
$db = new Mysql();
$user = $_SESSION['userid'];
$role = $db->table('role')->field('*')->where("Id=$user")->item();
?>
<div style="height: 20px"></div>
<div style="text-align: left;color: white;font-size: 14px;margin-top: 10px">
    <h4>觉醒命格</h4>
    <?php
    if ($role['task']>1)
    {
        exit("您的命格已经觉醒，请勿重复觉醒！快去向【村长】请教修仙的方法。");
    }
    if (!isset($_GET['jx'])) {
        echo '<p>您本次觉醒的命格属性：</p>';
        $a = rand(0, 6);
        if ($a == 0) {
            echo "<p>福星转世：气运＋3</p>";
        }
        if ($a == 1) {
            echo "<p>寿星转世：生命＋20</p>";
        }
        if ($a == 2) {
            echo "<p>禄星转世：名望＋10</p>";
        }
        if ($a == 3) {
            echo "<p>财神转世：气运＋1，灵石＋3000</p>";
        }
        if ($a == 4) {
            echo "<p>火神转世：火攻＋5，火抗＋3</p>";
        }
        if ($a == 5) {
            echo "<p>水神转世：水攻＋5，水抗＋3</p>";
        }
        if ($a == 6) {
            echo "<p>木神转世：木攻＋5，木抗＋3</p>";
        }
        echo '<a class="btn btn-danger" href="/main.php?facilities_id=1&page=facilities&jx=' . $a . '">开始觉醒</a>
    <a class="btn btn-warning" href="/main.php?facilities_id=1&page=facilities">重新觉醒</a>';
    } else {
        echo "觉醒成功";
        $a = $_GET['jx'];
        if ($a == 0) {
            $db->table('role')->where("Id=$user")->update(array('fate'=>3));
            echo "<p>福星转世：气运＋3</p>";
        }
        if ($a == 1) {
            $db->table('role')->where("Id=$user")->update(array('Hp'=>120));
            echo "<p>寿星转世：生命＋20</p>";
        }
        if ($a == 2) {
            $db->table('role')->where("Id=$user")->update(array('prestige'=>10));
            echo "<p>禄星转世：名望＋10</p>";
        }
        if ($a == 3) {
            $db->table('role')->where("Id=$user")->update(array('fate'=>1,'ls'=>3000));
            echo "<p>财神转世：气运＋1，灵石＋3000</p>";
        }
        if ($a == 4) {
            $db->table('role')->where("Id=$user")->update(array('fire_atk'=>15,'fire_def'=>13));
            echo "<p>火神转世：火攻＋5，火抗＋3</p>";
        }
        if ($a == 5) {
            $db->table('role')->where("Id=$user")->update(array('water_atk'=>15,'water_def'=>13));
            echo "<p>水神转世：水攻＋5，水抗＋3</p>";
        }
        if ($a == 6) {
            $db->table('role')->where("Id=$user")->update(array('wood_atk'=>15,'wood_def'=>13));
            echo "<p>木神转世：木攻＋5，木抗＋3</p>";
        }
        $db->table('role')->where("Id=$user")->update(array('task'=>2));
        echo '哔！<br>
只见觉醒石碑上泛起淡淡的光芒，转眼之间消失不见。<br>
你觉得自己的【命格】发生了微妙的变化。<br>
完成命格觉醒后，先去提交任务，然后向【村长】请教修仙的方法。<br>';
        echo '<a href="/main.php" style="color: #0f6674;font-size: 15px;margin-top: 3px">返回首页</a>';
    }
    ?>
</div>