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
                    <input type="search" id="search" onkeyup="Search()"  value="" placeholder="Que estas buscando?">
                    <i class="fa fa-search"></i>
                    <button id="clearSearch" onclick="ClearSearch()" class="btn btn-link text-dark">
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

    let currentCategoryId = "";
    let currentCategoryName = "";
    let search = document.getElementById("search");
    search.value = '';

    function Page(event){
        event.preventDefault();
        let page = event.target.innerHTML;
        getMorePosts(page);
    }
    document.getElementsByClassName("pagination")[0].addEventListener('click', Page);

    function FilterbyCategory(categId,categName){
        currentCategoryId = categId;
        currentCategoryName = categName;
        document.getElementById("categoryNameSelect").innerHTML = currentCategoryName;
        if(currentCategoryId=="") {
            document.getElementById("categoryNameSelect").classList.add("d-none");
        }else{
            document.getElementById("categoryNameSelect").classList.remove("d-none");
        }
        document.getElementById("categories").getElementsByClassName("active")[0].classList.remove("active");
        document.getElementById(`category-${currentCategoryId}`).classList.add("active");
        getMorePosts(1);
    }

    function Search(){
        getMorePosts(1);
    }

    function ClearSearch(){
        event.preventDefault();
        search.value = '';
        Search();
    }

    function getMorePosts(page){
        let url = `{{route('get-more-posts')}}?page=${page}`;
        axios.get(url, {
        params: {
            'search_query': search.value,
            'category_query': currentCategoryId
        }
        })
        .then(function (response) {
            document.getElementById("posts_data").innerHTML=response.data;
            document.getElementsByClassName("pagination")[0].addEventListener('click', Page);
        })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {
        });
    }

</script>
@endpush
