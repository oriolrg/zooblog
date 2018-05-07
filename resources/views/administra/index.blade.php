@extends('base')

@section('content')
	
<article class="row">
	
	<div class="col-md-12">
		
		<div class="well">

			<div class="page-header">
				<h1>Listado de Posts</h1>
			</div>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati omnis vel nulla doloremque at dicta libero, repellendus quas, velit eos ab dolorem, minima provident modi eligendi alias sapiente corporis quos.</p>

		</div>

		{{-- Esta seccion sera un bucle de Posts (Los listará todos) --}}

		<section class="posts">
			
			<article class="post">
				
				<div class="page-header">
					<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br/> <small>24-11-2016</small></h3>
				</div>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate exercitationem inventore quidem, provident hic, praesentium veritatis? Iusto expedita excepturi voluptatum, sint reprehenderit eligendi, ab laudantium accusamus veritatis iste eius vel!</p>

				<a href="#" class="btn btn-primary">Ver post -></a>

			</article>

		</section>

		{{-- END Esta seccion sera un bucle de Posts --}}

	</div>

</article>

@stop