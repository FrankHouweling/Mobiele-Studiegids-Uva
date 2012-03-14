         <form method="get" action="toelatingseisen">
         <div class="mcontent">
         
         <h3>Selecteer de vakken die van toepassing zijn:</h3>
                    
          <?php 
          
            $cnt    =   0;
          
            foreach($vak_name as $vak){
          
                if( str_replace( "wiskunde", "", $vak["vak_name"] ) == $vak["vak_name"] )
                {
                
                    $cnt++;
            
          
          ?>
                    
            <input type="checkbox"
            name="checkbox-<?=$vak['vak_id']?>" id="checkbox-<?=$cnt?>"
            class="custom" />
            <label for="checkbox-<?=$cnt?>"><?=$vak['vak_name']?></label>


          <?php 
          
                }
          
            } 
            
          ?>
          
           <div data-role="fieldcontain">
			    <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
			     	<legend><h5>Hoogste vorm van Wiskunde:</h5></legend>
			         	<input type="radio" name="wiskunde" value="c" id="radio-choice-c" />
			         	<label for="radio-choice-c">Wiskunde C</label>
			         	<input type="radio" name="wiskunde" id="radio-choice-d" value="a" checked="checked" />
			         	<label for="radio-choice-d">Wiskunde A</label>
			         	<input type="radio" name="wiskunde" id="radio-choice-e" value="b" />
			         	<label for="radio-choice-e">Wiskunde B</label>
			    </fieldset>
			</div>
          <br />
          <div class="ui-block-b"><button type="submit" data-theme="d" data-mini="true">Toon Resultaten</button></div>
          
          </div>
          </form>
