<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/17 0017
 * Time: 22:01
 */

\swoole_timer_tick(2000, function () {
    echo '只执行一次';
});

\swoole_timer_after(1000, function () {
    $a = 1;
    echo '不断执行' . $a;
    $a++;
});