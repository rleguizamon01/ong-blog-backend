@extends('website.layout')

@section('title', 'Posts')

@section('content')
    <div id="pagination">
    @include('website.posts.pagination',$posts)
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click','.pagination a', function (event) {
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                getPosts(page);
            });
        });

        function getPosts(page) {
        const url = "{{route('posts.index')}}?page=" + page;
        console.log(url);
        axios(url)
        .then(function (response) {
            $("#pagination").html(response.data);
            })
            .catch(function (error) {
                console.log(error);
            })
        }
    </script>
@endpush

