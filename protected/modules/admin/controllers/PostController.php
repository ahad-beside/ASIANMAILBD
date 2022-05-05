<?php
class PostController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/main';
    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update','admin','delPostImages','delete'),
                'roles' => array('Admin'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update','admin'),
                'roles' => array('Sub Editor'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Post;
        $modelPostImg = new PostImages;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Post'])) {
            $model->attributes = $_POST['Post'];
            $model->slug = $model->makeSlug($model->title);
            $model->entry_by = Yii::app()->user->userId;
            $model->update_by = Yii::app()->user->userId;
            $model->update_time = date('Y-m-d H:i:s');
            
            if(Yii::app()->user->roles!='Admin'){
                $model->status = 0;
            }
            
            $uploadedFile = CUploadedFile::getInstance($model, "image");
            if ($uploadedFile) {
                $fileName = Yii::app()->easycode->genFileName($uploadedFile->extensionName);
                $model->image = $fileName;
            }else{
                if($_POST['existing_image']!=''){
                    $model->image = $_POST['existing_image'];
                }
            }

            if ($model->save()) {
                if ($uploadedFile)
                    $uploadedFile->saveAs(UPLOAD . '/' . $fileName);
                $this->saveLinks($model->id, $_POST['tags'],'PostTags');
                $this->saveLinks($model->id, $_POST['categories'],'PostCategories');
                $this->saveItems($model->id, $_POST['PostImages']);
                
                if((int)$_POST['post_to_fb_page']==1 && $model->status==1){
                    $title=$model->title.' #asianmailbd';
                    $keywords=explode(',',$model->keyword);
                    foreach($keywords as $key):
                        if(trim($key)!=''){
                            $title .= ' #'.trim(str_replace(' ','',$key));
                        }
                    endforeach;
                    
                    FbToken::model()->postToFb(array('link'=>Post::makeLink($model->id), 'text'=>$title));
                }
                
                Yii::app()->user->setFlash('success', "Success: Post created successfully");
                $this->redirect(array('admin'));
            } else {
                Yii::app()->user->setFlash('warning', "Warning: Please check the form carefully for errors!");
            }
        }

        $this->render('create', array(
            'model' => $model,
            'modelPostImg'=>$modelPostImg,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $modelPostImg = new PostImages;
        
        $data['selectedCategories'] = PostCategories::model()->getSelectedCategories($id);
        
        $preImage = $model->image;

        if (isset($_POST['Post'])) {
            $model->attributes = $_POST['Post'];
            if($model->title!=$_POST['Post']['title'])
                $model->slug = $model->makeSlug($model->title,'update');
            else
                $model->slug = urlencode(mb_strtolower($model->slug, 'UTF-8'));
            
            $model->update_by = Yii::app()->user->userId;
            $model->update_time = date('Y-m-d H:i:s');
            
            if(Yii::app()->user->roles!='Admin'){
                $model->status = 0;
            }
            
            
            
            $uploadedFile = CUploadedFile::getInstance($model, "image");
            if ($uploadedFile) {
                $fileName = Yii::app()->easycode->genFileName($uploadedFile->extensionName);
                $model->image = $fileName;
            }else{
                if($_POST['existing_image']!=''){
                    $model->image = $_POST['existing_image'];
                    Yii::app()->easycode->deleteFile($preImage);
                }else
                    $model->image = $preImage;
            }
            
            if ($model->save()) {
                if ($uploadedFile) {
                    $uploadedFile->saveAs(UPLOAD . '/' . $fileName);
                    Yii::app()->easycode->deleteFile($preImage);
                }
                $this->saveLinks($model->id, $_POST['categories'],'PostCategories');
                $this->saveLinks($model->id, $_POST['tags'],'PostTags');
                
                $this->saveItems($model->id, $_POST['PostImages']);
                
                if((int)$_POST['post_to_fb_page']==1 && $model->status==1){
                    $title=$model->title.' #asianmailbd';
                    $keywords=explode(',',$model->keyword);
                    foreach($keywords as $key):
                        if(trim($key)!=''){
                            $title .= ' #'.trim(str_replace(' ','',$key));
                        }
                    endforeach;
                    
                    FbToken::model()->postToFb(array('link'=>Post::makeLink($model->id), 'text'=>$title));
                }
                
                Yii::app()->user->setFlash('success', "Post updated successfully");
                $this->redirect(array('admin'));
            } else {
                Yii::app()->user->setFlash('warning', "Warning: Please check the form carefully for errors!");
            }
        }
        
        $model->slug = urldecode($model->slug);

        $this->render('update', array(
            'model' => $model,
            'modelPostImg'=>$modelPostImg,
            'data'=>$data,
        ));
    }
    
    public static function saveLinks($id, $values, $model){
        if (count($values) > 0) {
            $model::model()->deleteAll('post_id=:id',array(':id'=>$id));
            for ($i = 0; $i < count($values); $i++):
                $model = new $model;
                $model->post_id = $id;
                if($model->hasAttribute('tag_id'))
                    $model->tag_id = $values[$i];
                else
                    $model->category_id = $values[$i];
                $model->save();
            endfor;
        }
    }


    public static function saveItems($id, $values) {
        if (count($values) > 0) {
            for ($i = 0; $i < count($values['title']); $i++):
                if ($values['title'][$i] != '') {
                    if (isset($values['id'][$i]) && $values['id'][$i] != '') {
                        $model = PostImages::model()->findByPk($values['id'][$i]);
                        $preImage = $model->image;
                    } else {
                        $model = new PostImages;
                        $preImage = '';
                    }

                    $uploadedFile = CUploadedFile::getInstance($model, "image[{$i}]");
                    if ($uploadedFile) {
                        $fileName = Yii::app()->easycode->genFileName($uploadedFile->extensionName);
                        $model->image = $fileName;
                        $uploadedFile->saveAs(UPLOAD . '/' . $fileName);
                        Yii::app()->easycode->deleteFile($preImage);
                    } else {
                        $model->image = $preImage;
                    }

                    $model->post_id = $id;
                    $model->title = $values['title'][$i];
                    $model->update_by = Yii::app()->user->userId;
                    $model->save();
                }
            endfor;
        }
    }
    
    public function actionDelPostImages() {
        if (isset($_POST['id']) && $_POST['id'] != '') {
            $id = $_POST['id'];
            $model = new PostImages;
            $info = $model->findByPk($id);
            if (count($info) > 0) {
                $model->deleteByPk($id);
                Yii::app()->easycode->deleteFile($info->image);
                echo 1;
            }
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if(Yii::app()->user->roles=='Admin'):
            $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        endif;
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        /* $dataProvider=new CActiveDataProvider('Manufacturer');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          )); */
        $this->actionAdmin();
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Post('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Post']))
            $model->attributes = $_GET['Post'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Manufacturer the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Post::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested Post does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Manufacturer $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'post-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
