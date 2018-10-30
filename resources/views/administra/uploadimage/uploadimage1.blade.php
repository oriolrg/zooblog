@if(@isset($editdata->imatge))
<div id="uploadimage1">
	<div id="selectImage">
	    <div class="main" class="col-md-12 col-md-offset">
	        <div class="col-md" align="center">
				<label>Selecciona la imatge pàgina principal</label><br/>
			    <div id="message1"></div>
			    <div id="selectImage">
			        <label>
			            <strong>Recomanacions: </strong>
			                <ul>
								<li>Per tal de millorar el posicionament SEO, </br>puja una imatge amb nom relacionat amb la seva descripció</li>
			                    <li>Màxim 500 kb</li>
			                </ul>
			        </label>
			        <input type="file" name="file1" id="file1"/>
			    </div>
			    <hr id="line">
			    <div id="image_preview1"><img id="previewing1" src="{{asset('/storage/app/public/')}}/{{$editdata->imatge}}" /></div>
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
			                <ul >
								<li><p class="seo">Per tal de millorar el posicionament SEO, </br>puja una imatge amb nom relacionat amb la seva descripció</p></li>
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
