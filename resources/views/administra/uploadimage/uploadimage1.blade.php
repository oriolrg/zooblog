@if(@isset($editdata->imatge))
<div id="uploadimage1">
	<div id="selectImage">
	    <div class="main" class="col-md-12 col-md-offset">
	        <div class="col-md" align="center">
			    <label>Selecciona la imatge pàgina principal</label><br/>
			    <div id="message1"></div>
			    <div id="selectImage">
			        <label>
			            <strong>Mides recomanades: </strong>
			                <ul>
			                    <li>Màxim 500 kb</li>
			                </ul>
			        </label>
			        <input type="file" name="file1" id="file1"/>			        
			    </div>
			    <hr id="line">
			    <div id="image_preview1"><img id="previewing1" src="{{asset('storage')}}/{{$editdata->imatge}}" /></div>
			</div>
		</div>
	</div>
</div>
@else
<div id="uploadimage1">
	<div id="selectImage">
	    <div class="main" class="col-md-12 col-md-offset">
	        <div class="col-md" align="center">
			    <label>Selecciona la imatge pàgina principal</label><br/>
			    <div id="message1"></div>
			    <div id="selectImage">
			        <label>
			            <strong>Mides recomanades: </strong>
			                <ul>
			                    <li>Màxim 500 kb</li>
			                </ul>
			        </label>
			        <input type="file" name="file1" id="file1"/>			        
			    </div>
			    <hr id="line">
			    <div id="image_preview1"><img id="previewing1" src="{{asset('storage/no-image-box.png')}}" /></div>
			</div>
		</div>
	</div>
</div>
@endif