@extends('layouts.app')

@section('content')

    <div class="container">
        
            <a href="{{ route('post.create') }}" class="btn btn-success">Ajouter un Post</a>       
        <div class="row  mt-3">
            
            @foreach ($posts as $post)
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-header">
                            {{ $post->title }} 
                            @if (Auth::user()->id ==  $post->user->id)
                                
                                <button onclick="check('/post/{{ $post->id }}')" class="btn btn-danger float-right ml-2">Supprimer</button>
                                
                                
                                <a class="btn btn-info float-right" href="post/{{ $post->id }}/edit">Modifier</a>
                            @endif
                            
                             
                        </div>
                        <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ $post->content }}</p>
                            <footer class="blockquote-footer">{{ $post->user->name }}</footer>
                        </blockquote>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
@endsection

@section('script')
<script> 

function check(urls){

    swal({
            title: "Attention !",
            text: "La suppression d'un article est definitive !",
            icon: "warning",
            buttons: {
                    cancel: "Annuler",
                    catch: {
                    text: "Supprimer",
                    value: "catch",
                    },
                    
                },
            dangerMode: true,
    })
    .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Votre article a été supprimer avec success !", {
                icon: "success",
                });

                const headers = new Headers({
                    'Content-Type': 'x-www-form-urlencoded',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                });
                const formData = new FormData();
                fetch(urls, {
                    method: 'POST',
                    headers,
                    body: formData,
                }).then(() => {
                    document.location.reload(true)
                });

            } 
    });

}

</script>
@endsection
