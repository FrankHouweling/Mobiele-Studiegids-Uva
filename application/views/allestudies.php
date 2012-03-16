
		
		<div class="datalist">
			<ul data-role="listview" data-inset="true" data-filter="true" data-split-icon="plus" data-split-theme="d" >
                     
                     <?php foreach($programName as $studie): ?>

                    <li>
                    	<a href="../../index.php/ziestudie/studie/<?=$studie['id']?>">
                    		<?=$studie['programName']?> <span class="ui-li-count"><?php echo $studie['degree']?></span>
                    	</a>
                    	<a href="../../index.php/favorieten/add/<?php echo $studie['id']?>" data-rel="dialog" data-transition="slideup">+ Favoriet</a>
                    </li>

                    <?php endforeach; ?>
                    
            </ul>
		
        </div>
