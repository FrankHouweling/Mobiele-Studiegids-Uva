        
        <div class="datalist">
			<ul data-role="listview" data-inset="true">
			
                    <?php foreach($faculty_name as $faculteit): ?>

                    <li><a href="http://project0/index.php/faculteit/<?=$faculteit['id']?>"><?=$faculteit['fullFaculty']?></a></li>

                    <?php endforeach; ?>
                    
            </ul>
		
        </div>
