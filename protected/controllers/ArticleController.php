<?php

class ArticleController extends Controller {

    public $layout = '//layouts/main';
    public $defaultAction = 'view';

    public function actionView($title) {
        $model = Post::model()->find('slug=:slug', array(':slug' => urlencode($title)));
        if ($model->status == 1 || (!Yii::app()->user->isGuest)) {
            $this->increseRead($model->id, $model->times_of_read);

            $getCat = PostCategories::model()->findAll('post_id=:pid', array(':pid' => $model->id));
            foreach ($getCat as $cat):
                $data['category'][] = $cat->category_id;
            endforeach;

            if ($model->image != '') {
                $data['image'][] = array('src' => $model->image, 'title' => $model->title);
            }
            $images = $model->postImages;
            if (count($images) > 0) {
                foreach ($images as $image):
                    $data['image'][] = array('src' => $image->image, 'title' => $image->title);
                endforeach;
            }

            $data['relatedPost'] = Post::model()->getRelatedPost($model->id,$model->keyword);

            $this->render('view', array('model' => $model, 'data' => $data));
        }
    }

    public function actionPrint($id) {
        $this->layout = '//layouts/print';
        $model = Post::model()->findByPk((int) $id);

        if ($model->image != '') {
            $data['image'][] = array('src' => $model->image, 'title' => $model->title);
        }
        $images = $model->postImages;
        if (count($images) > 0) {
            foreach ($images as $image):
                $data['image'][] = array('src' => $image->image, 'title' => $image->title);
            endforeach;
        }

        $this->render('viewPrint', array('model' => $model, 'data' => $data));
    }

    public function increseRead($postId, $timesOfRead) {
        Post::model()->updateByPk($postId, array('times_of_read' => (int) $timesOfRead + 1));
    }

}
