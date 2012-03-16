
		
		<div class="datalist">
			<ul data-role="listview" data-inset="true" data-filter="true" data-split-icon="minus" data-split-theme="d" >
                     
                     <?php foreach($programName as $studie): ?>

                    <li>
                    	<a href="../../ziestudie/studie/<?=$studie['id']?>">
                    		<?=$studie['programName']?> <span class="ui-li-count"><?php echo $studie['degree']?></span>
                    	</a>
                    	<a href="favorieten/remove/<?php echo $studie['id']?>" data-rel="dialog" data-transition="slideup">- Verwijder</a>
                    </li>

                    <?php endforeach; ?>
                    
            </ul>
		
        </div>
