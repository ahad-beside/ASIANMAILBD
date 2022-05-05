<?php

class PollController extends Controller {

    public $layout = '//layouts/main';

    public function actionGiveVote() {
        
        $this->pageTitle = 'Give your opinion';
        if ($_POST) {
            $option = (int) $_POST['optionId'];
            $pollId = (int) $_POST['pollId'];

            $activePoll = Poll::model()->find(array(
                'condition' => 'status=:status',
                'params' => array(':status' => 1),
                'order' => 'id desc',
            ));
            if ($activePoll->id == $pollId) {
                $getPollOpt = PollOptions::model()->findByPk($option);
                $vote = (int) $getPollOpt->vote + 1;

                Yii::app()->db->createCommand()->update('poll_options', array('vote' => $vote), 'id=:id', array(':id' => $option));
                
                //after voted keep cookie save
                $cookie = new CHttpCookie('voted', $pollId);
                $cookie->expire = time()+60*60*24*180; 
                Yii::app()->request->cookies['voted'] = $cookie;

                echo "<h3>ভোট প্রদানের জন্য আপনাকে ধন্যবাদ</h3>";
            } else {
                echo "<i class='fa fa-times'></i><h3>দুঃখিত, আবার চেষ্টা করুন</h3>";
            }
        }
        Yii::app()->end();
    }

    public function actionViewResult($id) {
        Yii::app()->theme = 'mobile';
        $this->pageTitle = 'Poll result';
        $this->breadcrumbs = array(
            'Poll' => array('//poll/pastResults'),
        );
        $data['poll'] = Poll::model()->findByPk((int) $id);
        $data['pollOptions'] = PollOptions::model()->findAll(array(
            'condition' => 'poll_id=:pollid',
            'params' => array(':pollid' => $data['poll']->id),
        ));
        $data['totalVote'] = PollOptions::model()->findBySql('select sum(`vote`) as `vote` from `poll_options` where `poll_id`="' . $data['poll']->id . '"');

        $this->render('viewResult', array('data' => $data));
    }

    public function actionPastResults() {
        Yii::app()->theme = 'mobile';
        $this->pageTitle = 'All poll';
        $this->breadcrumbs = array(
            'Poll' => array('//poll/pastResults'),
        );
        $model = new Poll('search');
        $model->unsetAttributes();
        if (isset($_GET['Poll']))
            $model->attributes = $_GET['Poll'];

        $this->render('pastResults', array(
            'model' => $model,
        ));
    }

}
