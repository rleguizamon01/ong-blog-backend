@extends('website.layout')

@section('title', 'Posts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 id="categoryNameSelect" class="h3 mt-4">
            </h3>
            <h3 id="categoryItSelect" class="d-none">
            </h3>
        </div>
        <!-- Latest Posts -->
        <main id="posts_data" class="posts-listing col-lg-8">
            <x-posts.data :posts="$posts"/>
        </main>
        <aside class="col-lg-4">
            <!-- Widget [Search Bar Widget]-->
            <div class="widget search">
                <header>
                <h3 class="h6">Buscar</h3>
                </header>
                <form action="" class="search-form">
                <div class="form-group d-flex align-items-baseline">
                    <input type="search" id="search" value="" placeholder="Que estas buscando?">
                    <i class="fa fa-search"></i>
                    <button id="clearSearch" class="btn btn-link text-dark">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                </form>
            </div>
            <!-- Widget [Categories Widget]-->
            @include('website.categories.index')
        </aside>
    </div>
</div>
@endsection
<script src={{ asset('js/app.js')}}></script>
@push('scripts')
<script>
$(document).ready(function(){

    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        console.log("en page",page);
        getMorePosts(page);
    });

    $('#search').on('keyup', function(){
        getMorePosts(1);
    });

    $(document).on('click', '#categories.widget.categories a', function(event){
        event.preventDefault();
        let categoryItSelected = $(this).attr('href').split('/')[4];
        document.getElementById("categoryItSelect").innerHTML = categoryItSelected;
        let categoryNameSelected = event.target.innerText;
        document.getElementById("categoryNameSelect").innerHTML = categoryNameSelected;
        if(categoryItSelected==0) {
            document.getElementById("categoryNameSelect").classList.add("d-none");
        }else{
            document.getElementById("categoryNameSelect").classList.remove("d-none");
        }
        console.log("dentro en categories");
        console.log("categoryItSelected",categoryItSelected);
        getMorePosts(1);
    });

    $(document).on('click', '#clearSearch', function(event){
        event.preventDefault();
        document.getElementById("search").value = '';
        getMorePosts(1);
    });
});

function getMorePosts(page){
    console.log("dentro en getMorePosts");
    console.log("page",page);
    let search = document.getElementById("search").value;
    let cat = document.getElementById("categoryItSelect").innerHTML;
    let url = `{{route('get-more-posts')}}?page=${page}`;
    console.log("search",search);
    console.log("cat",cat);
    console.log("url",url);
    axios.get(url, {
    params: {
        'search_query': search,
        'category_query': cat
    }
    })
    .then(function (response) {
        $("#posts_data").html(response.data);
    })
    .catch(function (error) {
        console.log(error);
    })
    .then(function () {
    });
}

</script>
@endpush
