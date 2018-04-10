@extends('layouts.app')
@section('content')

            <div class="content">
                <ul>
               @foreach($data as $key => $categoria)
                    @if ($categoria->status === 1)
                        
                        <li id="{{ $categoria->id }}">
                            {{ $categoria->title}}
                            {{ $categoria->description}}
                            <img src="http://lavalldelord.com/appvallLord/storage/app/images/{{ $categoria->imatge}}" width="80px" class="img_thumbnail">
                        </li>
                        
                    @endif
               @endforeach
               </ul>
            </div>
@endsection
