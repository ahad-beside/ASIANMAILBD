<?php
$poll = Poll::model()->find(array(
   'condition'=>'status=:status',
   'params'=>array(':status'=>1),
   'order'=>'id desc',
));
if(count($poll)>0):
    $options = PollOptions::model()->findAll(array(
        'condition'=>'poll_id=:pollid',
        'params'=>array(':pollid'=>$poll->id),
    ));
?>
<div class="row">
    <div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Share your opinion</div>
        <div class="panel-body">
            
        <form action="#" id="giveVote" class="form">
            <div class="voteError form-group" style="display: none; color: red; font-weight: bold">Please choose a option</div>
            <div class="form-group">
                <label><?= $poll->title?></label>
                <input type="hidden" name="pollId" value="<?= $poll->id?>"/>
                <?php foreach($options as $opt):?>
                <br><input type="radio" value="<?= $opt->id?>" name="poll_option"> <?= $opt->option?>
                <?php endforeach;?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Vote</button>
            </div>
        </form>
        
        <div style="text-align: center; font-size: 53px; display: none" class="col-md-12 voteLoading"><i class="fa fa-spinner fa-spin"></i><h3>Please wait...</h3></div>
        <br>
        <a href="<?= $this->createUrl('//poll/viewResult',array('id'=>$poll->id))?>">View Results</a> &nbsp; <a href="<?= $this->createUrl('//poll/pastResults')?>">View Past Results</a>
        </div>
    </div>
    </div>
</div>
<script type="text/javascript">
    $('#giveVote').submit(function(){
        if($('#giveVote').find('input[type="radio"]').is(':checked')){
            var optionId = $('#giveVote').find('input[type="radio"]:checked:first').val();
            var pollId = $('#giveVote').find('input[type="hidden"]').val();
            $.post("<?= $this->createUrl('//poll/giveVote')?>",{optionId: optionId, pollId: pollId},function(data){
                $('.voteLoading').show();
                $('#giveVote').hide();
            }).done(function(data) {
                $('.voteLoading').html(data);
              })
              .fail(function() {
                $('#giveVote').show();
                $('.voteError').html('Server Error!!!');
                $('.voteError').show();
              });
        }else{
            $('#giveVote').show();
            $('.voteError').html('Please choose a option');
            $('.voteError').show();
        }
        return false;
    });
</script>
<?php endif;?>