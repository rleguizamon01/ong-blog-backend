<div id="categories" class="widget categories">
    <header>
        <h3 class="h6">Categorias</h3>
    </header>
    @foreach($categories as $category)
        <div class="item d-flex justify-content-between align-items-center">
            <button id="category-{{$category->id}}" onclick="FilterbyCategory({{$category->id}},'{{$category->name}}')" class="btn">
                {{$category->name}}
            </button>
            <span>{{$category->posts_count}}</span>
        </div>
    @endforeach
        <div class="item d-flex justify-content-between align-items-center">
            <button id="category-" onclick="FilterbyCategory('','')" class="btn active">
                Todas
            </button>
            <span>{{$totalposts}}</span>
        </div>
</div>
