<?php
/**
 * Created by PhpStorm.
 * User: ewb
 * Date: 3/11/18
 * Time: 6:45 PM
 */

namespace App\Controller\V01;


use Cake\Controller\Controller;
use Crud\Controller\ControllerTrait;

class AppController extends Controller {

    use ControllerTrait;

    public $components = [
        'RequestHandler',
        'Crud.Crud' => [
            'actions' => [
                'Crud.Index',
                'Crud.View',
                'Crud.Add',
                'Crud.Edit',
                'Crud.Delete',
            ],
            'listeners' => [
                'Crud.Api',
                'Crud.ApiPagination',
                'Crud.ApiQueryLog',
            ],
        ],
    ];
}
