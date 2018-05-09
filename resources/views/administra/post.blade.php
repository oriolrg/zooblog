@extends('base')

@section('css')

<style>
	.comments {
		margin-top: 3em;
	}

	.comments .tab-content .panel {
		margin: 2em 0;
	}
</style>

@stop

@section('content')
	
<article class="row">
	
	<div class="col-md-12">
		

		<section class="post">

			<a href="#" class="btn btn-primary"><- Listado</a>
			
			<article class="post">
				
				<div class="page-header">
					<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br/> <small>24-11-2016</small></h3>
				</div>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate exercitationem inventore quidem, provident hic, praesentium veritatis? Iusto expedita excepturi voluptatum, sint reprehenderit eligendi, ab laudantium accusamus veritatis iste eius vel!</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa illum accusantium enim, eum quos ad deserunt unde repellat optio, voluptates maxime ullam recusandae minima autem dolores non mollitia nobis iure.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit molestiae ullam atque similique quod est, assumenda laboriosam, facere deserunt commodi voluptas. Quibusdam facilis provident ut consequatur, dolorem sequi reprehenderit, qui!</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, quasi, sint. Quae deleniti consequatur, sunt similique animi dicta repellat ex corporis quasi deserunt consectetur quia tempora odio ab nam fugiat.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, et blanditiis qui! Repellat a, repellendus optio. Commodi ducimus sapiente, magni voluptatum. Nesciunt rem quibusdam, eius iure voluptatem nisi cupiditate animi?</p>

			</article>

		</section>

		<hr>

		<section class="comments">
			
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#list" aria-controls="list" role="tab" data-toggle="tab">Comentarios</a>
					</li>
					<li role="presentation">
						<a href="#new" aria-controls="new" role="tab" data-toggle="tab">Nuevo</a>
					</li>
				</ul>
			
				<!-- Tab panes -->
				<div class="tab-content">

					{{-- Comments list --}}
					<div role="tabpanel" class="tab-pane active" id="list">

						{{-- Bucle de comentarios --}}
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">
									Usuario
									<a href="{{ url('comments/deletecomment') }}" class="btn btn-danger btn-xs pull-right">X</a>
								</h3>
							</div>
							<div class="panel-body">
								Test
							</div>
						</div>
						{{-- END Bucle de comentarios --}}

					</div>

					{{-- New comment --}}
					<div role="tabpanel" class="tab-pane" id="new">
						
						<div class="well">
							
							<form action="{{ url('comments/createcomment') }}" method="POST">
								{{ csrf_field() }}
								
								<label for="user">Usuario:</label>
								<input type="text" name="user" id="user" class="form-control" required><br/>

								<label for="comment">Comentario:</label>
								<textarea rows="5" name="comment" id="comment" class="form-control" required></textarea><br/>

								<input type="submit" class="btn btn-success" value="Enviar">
								
							</form>

						</div>

					</div>
				</div>

			</div>

		</section>



	</div>

</article>

@stop