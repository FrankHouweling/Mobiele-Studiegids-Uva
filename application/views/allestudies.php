
		
		<div class="datalist">
			<ul data-role="listview" data-inset="true" data-filter="true" data-split-icon="plus" data-split-theme="d" >
                     
                     <?php foreach($programName as $studie): ?>

                    <li>
                    	<a href="http://project0/index.php/ziestudie/studie/<?php echo $studie['id']?>">
                    		<?php echo $studie['programName']?> <span class="ui-li-count"><?php echo $studie['degree']?></span>
                    	</a>
                    	<a href="http://project0/index.php/favorieten/add/<?php echo $studie['id']?>" data-rel="dialog" data-transition="slideup">+ Favoriet</a>
                    </li>

                    <?php endforeach; ?>
                    
            </ul>
		
        </div>
