<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14.04.2019
 * Time: 19:22
 */

namespace app\controllers;

use yii\web\Controller;

class AppController extends Controller
{
    public function debug($arr)
    {
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }
}