<!-- left side bands --> 
<div class="fk-review-page fk-font-normal" style="background-color: white; padding: 10px;"> 
    <div class="line"> 
        <div class="size1of4 unit" > 
            <!-- div class="review-section yahoo-news"> </div--> 
            <h2>You have chosen to review</h2> 
            <div class="review-product-summary tmargin10"> 
                <div class="unit"> <div class="review-product-image"> <a href="<?php echo Products::model()->makeLink($productInfo->id)?>"><?php echo Yii::app()->easycode->showImage($productInfo->image,96,100)?></a> </div> </div> 
                <div class="lastUnit section-body lpadding10"> <div class="section-title"> <a title="<?php echo $productInfo->name?>" href="<?php echo Products::model()->makeLink($productInfo->id)?>"><?php echo $productInfo->name?></a> </div> </div> 
                <div class="fclear"></div> 
            </div> 
            <div class="fk-box-white fk-font-small tmargin10"> 
                <p class="bmargin10"> <span class="fk-font-normal boldtext bmargin10">What makes a good review</span> </p> <strong>Have you used this product?</strong> <p class="bmargin10">
                    It's always better to review a product you have personally experienced.
                </p> <strong>Educate your readers</strong> <p class="bmargin10">
                    Provide a relevant, unbiased overview of the product. Readers are interested in the pros and the cons of the product.
                </p> <strong>Be yourself, be informative</strong> <p class="bmargin10">
                    Let your personality shine through, but it's equally important to provide facts to back up your opinion.
                </p> <strong>Get your facts right!</strong> <p class="bmargin10">
                    Nothing is worse than inaccurate information. If you're not really sure, research always helps.
                </p> <strong>Stay concise</strong> <p class="bmargin10">
                    Be creative but also remember to stay on topic. A catchy title will always get attention!
                </p> <strong>Easy to read, easy on the eyes</strong> <p>
                    A quick edit and spell check will work wonders for your credibility. Also, break reviews into small, digestible paragraphs.
                </p> 
            </div> 
        </div> 
        <div class="size3of4 lastUnit lpadding20"> 
            <div class="review-section"> 
                <div id="addReviewDiv"> 
                    <a name="writereview"></a> <div class="review-page-header line bmargin10"> <h1 class="fk-float-left">Help others! Write a Wavesales review</h1><div class="fclear"></div> </div> <div class="fk-smallfont bmargin5"> </div>
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'rating-form',
                        'enableAjaxValidation' => false,
                    ));
                    ?>
                    <div class="help_message bmargin5"> All fields are mandatory </div>
                    <table id="user-review-form"> 
                        <tbody>
                            <tr> 
                                <td class="lbl boldtext"> 
                                    <label for="review_title" class="lastUnit fk-label"> <div class="fk-review-steps fk-review-step1 unit"></div>Review Title:</label> 
                                </td> 
                                <td class="user-input">
                                    <?php echo $form->textField($model, 'review_title', array('size' => 60, 'maxlength' => 100, 'class' => 'txt user-input-field fk-input')); ?>
                                    <span><?php echo $form->error($model, 'review_title',array('class'=>'one_line_error_message')); ?></span>
                                </td> 
                            </tr> 
                            <tr> 
                                <td class="lbl boldtext valign-top"> <label for="review_text" class="lastUnit fk-label"> <div class="fk-review-steps fk-review-step2 unit"></div>
                                        Your Review:
                                    </label> 
                                </td> 
                                <td class="user-input"> 
                                    <div class="review_text-holder fk-position-relative"> <div class="review_text-message"> <div class="padding6"> <strong>Please do not include:</strong> HTML, references to other retailers, pricing, personal information, any profane, inflammatory or copyrighted comments, or any copied content.</div> </div>
                                        
                                        <?php echo $form->textArea($model, 'review_description', array('class' => 'user-input-field fk-input','style'=>'height:100px')); ?>
                                        <span><?php echo $form->error($model, 'review_description',array('class'=>'one_line_error_message')); ?></span>
                                    
                                        <div id="review_text_help_message" class="help_message lpadding5" style="margin-top:5px;">(Please make sure your review contains at least 100 characters.)</div>  
                                    </div> 
                                </td> 
                            </tr> 
                            <tr> 
                                <td class="lbl boldtext"> 
                                    <label class="lastUnit"> <div class="fk-review-steps fk-review-step3 unit fk-label"></div>
                                        Your Rating:
                                    </label> 
                                </td> 
                                <td class="user-input"> 
                                    <div class="starRating">
                                        <div>
                                            <div>
                                                <div>
                                                    <div>
                                                        <input id="rating1" type="radio" name="ProductsRatingReview[rating_score]" value="1">
                                                        <label for="rating1"><span>1</span></label>
                                                    </div>
                                                    <input id="rating2" type="radio" name="ProductsRatingReview[rating_score]" value="2">
                                                    <label for="rating2"><span>2</span></label>
                                                </div>
                                                <input id="rating3" type="radio" name="ProductsRatingReview[rating_score]" value="3">
                                                <label for="rating3"><span>3</span></label>
                                            </div>
                                            <input id="rating4" type="radio" name="ProductsRatingReview[rating_score]" value="4">
                                            <label for="rating4"><span>4</span></label>
                                        </div>
                                        <input id="rating5" type="radio" name="ProductsRatingReview[rating_score]" value="5">
                                        <label for="rating5"><span>5</span></label>
                                    </div>
                                </td> 
                            </tr> 
                            <tr> 
                                <td>&nbsp;</td> 
                                <td>
                                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Review' : 'Save', array('class' => 'btn btn-blue')); ?>
                                </td> 
                            </tr> 
                        </tbody>
                    </table>
                    <?php $this->endWidget(); ?>
                </div> 

            </div> 
        </div> 
    </div> 
</div> <!-- right side bands -->


<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/rating/stylesheet.css" />


