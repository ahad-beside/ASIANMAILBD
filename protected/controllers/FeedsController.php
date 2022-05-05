<?php
class FeedsController extends Controller {

    public $layout = '//layouts/main';
    public $defaultAction = 'index';

    public function actionIndex() {
        $type = 'xml';
        if (isset($_GET) && $_GET['type'] != '')
            $type = mysql_escape_string($_GET['type']);

        if ($type == 'xml') {
            header('Content-Type: text/xml; charset=utf-8', true);
            echo $this->xml();
        } else{
            header('Content-type: application/json');
            echo $this->json();
        }
        Yii::app()->end();
    }

    public function actionGetXml() {
        $feedUrl = 'http://localhost/asianmailbd/feeds?type=xml';
        $rawFeed = file_get_contents($feedUrl);
        $anobii = new SimpleXmlElement($rawFeed);

        foreach ($anobii->item as $anobiiinfo):
            $title = $anobiiinfo->title;
            $desc = $anobiiinfo->description;
            echo "<span> ", $title, "</span> <br/> <span> ", $desc, "</span><br>-------------------------------<br>";
        endforeach;
    }
    
    public function actionGetJson() {
        $feedUrl = 'http://localhost/asianmailbd/feeds?type=json';
        $rawFeed = CJSON::Decode(file_get_contents($feedUrl));
        
        foreach ($rawFeed as $anobiiinfo):
            $title = $anobiiinfo['title'];
            $desc = $anobiiinfo['description'];
            echo "<span> ". $title . "</span> <br/> <span> ". $desc . "</span><br>-------------------------------<br>";
        endforeach;
    }

    public function xml() {
        $rss = new SimpleXMLElement('<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:atom="http://www.w3.org/2005/Atom"></rss>');
        $rss->addAttribute('version', '2.0');

        $channel = $rss->addChild('channel'); //add channel node
        $atom = $rss->addChild('atom:atom:link'); //add atom node
        $atom->addAttribute('href', 'http://www.coder71.com'); //add atom node attribute
        $atom->addAttribute('rel', 'self');
        $atom->addAttribute('type', 'application/rss+xml');
        $title = $rss->addChild('title', 'Asianmailbd'); //title of the feed
        $description = $rss->addChild('description', 'New Newtwork'); //feed description
        $link = $rss->addChild('link', 'http://www.coder71.com/asianmailbd'); //feed site
        $language = $rss->addChild('language', 'en-us'); //language
//Create RFC822 Date format to comply with RFC822
        $date_f = date("D, d M Y H:i:s T", time());
        $build_date = gmdate(DATE_RFC2822, strtotime($date_f));
        $lastBuildDate = $rss->addChild('lastBuildDate', $date_f); //feed last build date
        $generator = $rss->addChild('generator', 'PHP Simple XML'); //add generator node

        $post = Post::model()->findAll(array(
            'condition'=>'status=:active',
            'params'=>array(':active'=>1),
            'order' => 'id desc',
            'limit' => '20'
        ));
        foreach ($post as $row):
            $item = $rss->addChild('item'); //add item node
            $title = $item->addChild('title', $row->title); //add title node under item
            $link = $item->addChild('link', Post::model()->makeLink($row->id)); //add link node under item
            $guid = $item->addChild('guid', Post::model()->makeLink($row->id)); //add guid node under item
            $guid->addAttribute('isPermaLink', 'false'); //add guid node attribute

            $image = $item->addChild('image', Yii::app()->easycode->showReturnOriginalImage($row->image)); //add description
            $description = $item->addChild('description', '<![CDATA[ ' . htmlentities($row->description)); //add description

            $date_rfc = gmdate(DATE_RFC2822, strtotime($row->update_time));
            $item = $item->addChild('pubDate', $date_rfc); //add pubDate node
        endforeach;
        return $rss->asXML();
    }

    public function json() {
	    //header('Content-Type: text/html; charset=utf-8');
        $data = array();
        $post = Post::model()->findAll(array(
            'condition'=>'status=:active',
            'params'=>array(':active'=>1),
            'order' => 'id desc',
            'limit' => '20'
        ));
        foreach ($post as $row):
            $data[] = array(
                'title' => $row->title,
                'link' => Post::model()->makeLink($row->id),
                'image' => Yii::app()->easycode->showReturnOriginalImage($row->image),
                'description' => $row->description,
                'publishDate' => $row->update_time
            );
        endforeach;
        return CJSON::encode($data);
    }
	
	  public function actionIframe() {
	  $this->layout = '//layouts/blank';
        $model = Post::model()->findAll(array(
            'condition'=>'status=:active',
            'params'=>array(':active'=>1),
            'order' => 'id desc',
            'limit' => '6'
        ));
		$this->render('iframe',array(
			'model'=>$model,
		));
		}

}
