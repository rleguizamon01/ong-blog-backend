@extends('website.layout')
@section('title') {{$post->title}}@endsection
@section('content')
    <main class="post blog-post col-lg-10">
        <div class="container">
            <div class="post-single">
                <div class="post-thumbnail"><img src="{{ $post->photo }}" class="img-fluid"></div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="title">Categoria: {{$post->category->name}}</div>
                    </div>
                </div>

                <!--User-->
                <div class="post-footer d-flex flex-column flex-sm-row">
                    <div class="author d-flex align-items-center flex-wrap">
                        <div class="title">
                            <i class="fas fa-user"></i>
                            <span>{{ $post->user->first_name }} {{ $post->user->last_name }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="date">
                            <i class="fas fa-table"></i>
                            {{ $post->created_at->format('d M Y') }}
                        </div>
                        <div class="comments meta-last">
                            <i class="fas fa-comments"></i>
                            {{ count($post->comments) }}
                        </div>
                    </div>
                </div>

                <h1>{{$post->title}}</h1>

                <div class="post-body">
                    <p>{{$post->body}}</p>
                </div>

                <div class="post-comments">
                    <header>
                        <h3 class="h6">Comentarios del post<span class="no-of-comments">{{ count($post->comments) }}</span></h3>
                    </header>

                    <div class="add-comment">
                        <header>
                            <h3 class="h6">Deja tu comentario</h3>
                        </header>
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <input type="email" name="email" id="email" placeholder="Direccion de email" class="form-control">
                                
                                <!-- Email error -->
                                <p id="email-error" class="d-none alert alert-danger mt-3 small p-2">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="body" id="body" placeholder="Tu comentario" class="form-control"></textarea>

                                <!-- Body error -->
                                <p id="body-error" class=" d-none alert alert-danger mt-3 small p-2"></p>
                            </div>
                            <div class="form-group col-md-12">
                                <button id="submit-comment" class="btn btn-secondary">Enviar comentario</button>
                            </div>
                        </div>
                    </div>

                    <!-- Comments -->
                    <div id="comment-section"></div> 

                </div>                    
            </div>
        </div>
    </main>

    
    <script type="text/javascript">

        document.getElementById('submit-comment').addEventListener('click', postComment);

        function postComment(){
            axios.post('{{ route('comments.store', $post) }}',{
                email: document.getElementById('email').value,
                body: document.getElementById('body').value,
            })
            .then(function(response){
                hideAlert('email-error');
                hideAlert('body-error');

                document.getElementById('email').value = "";
                document.getElementById('body').value = "";
            })
            .catch(function(error){
                let errors = JSON.parse(error.response.request.response).errors;

                if(errors.email){
                    showAlert('email-error');
                    document.getElementById("email-error").innerHTML = errors.email[0];
                } else{
                    hideAlert('email-error');
                }

                if(errors.body){
                    showAlert('body-error');
                    document.getElementById("body-error").innerHTML = errors.body[0];
                } else{
                    hideAlert('body-error');
                }
            });
        }

        function showAlert(id){
            document.getElementById(id).classList.remove("d-none");
        }

        function hideAlert(id){
            document.getElementById(id).classList.add("d-none");
        }
    </script>
@endsection

