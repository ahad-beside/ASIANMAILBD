<div class="example bdws">
    <h2 class="open"><?php echo $filkey?></h2>
    <div class="bganother">
        <ul id="price_range" class="facets" valuelimit="" keepcollapsed="" displaytype="" nofilter="1">
            <?php asort($filval); foreach($filval as $filter):?>
            <li class="facet"> <a class="active">
                <input autocomplete="off" class="facetoption filtercheck" value="<?php echo $filter['filter_id']?>" name="filter[]" type="checkbox" <?php if(in_array($filter['filter_id'],$data['getFilter'])){echo "checked='checked'";}?> >
                <span class="title fk-inline-block lmargin5" original="Rs. 250 and Below"><?php echo $filter['filter_name']?></span> <span class="count"></span> </a> 
            </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
