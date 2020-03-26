<?php

use Phalcon\Http\Request;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->tag->setTitle('Трекинг времени');
        $name = $this->session->get('name');
        $id = $this->session->get('id');
        $role = $this->session->get('role');

        if($role == 1) {
            $text = 'templates/user';
        }
        else {
            $text = 'templates/guest';
        }
        if($role == 2) {
            return $this->dispatcher->forward(
                [
                    "controller" => "admin",
                    "action" => "index",
                ]
            );
        }
        $request = new Request();
        if ($this->request->isPost()) {
            $select_month = $request->getPost('select_month');
        } else {
            $select_month = date("m");
        }


        date_default_timezone_set('Asia/Bishkek');
        $today = date("d");
        $months = [
            'Декабрь', 'Январь', 'Февраль', 'Март', 'Апрель',
            'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь'
        ];
        $todayMonth = $months[intval($select_month)];

        $users = Users::find();

        $monthData = Tracking::getData($select_month, $users);

        $this->view->username = $name;
        $this->view->user_id = $id;
        $this->view->users = $users;
        $this->view->data = $monthData['month'];
        $this->view->totalDays = $monthData['totalDays'];
        $this->view->totalWorkingDays = $monthData['totalDays'] - $monthData['notWorkingDays'];
        $this->view->today = $today;
        $this->view->todayMonth = $todayMonth;
        $this->view->numTodayMonth = date("m");
        $this->view->numSelectMonth = $select_month;
        $this->view->text = $text;
        //$this->view->users = Users::find();
    }
}

