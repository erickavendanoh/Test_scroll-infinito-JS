<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scroll infinito AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Posts</h2>
        <div id="posts-container">
            {{-- @include('posts.load') --}}
            @include('posts.pagination');

            {{-- <div class="d-none">
                {{ $posts->links() }}
            </div> --}}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        let page=2;
        let contador=0;
        window.onscroll = function(env) {
            if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
                contador += 1;
                alert(contador);
                //alert("Hasta abajo");
                const section = document.getElementById('posts-container');
                // section.innerHTML += '<br><br><br><br><br><br><p>MÁS CONTENIDO</p><br><br><br><br><br><br>';
                fetch(`/posts/pagination?page=${page}`, {
                    method: 'get'
                }).then(function(response){
                    // console.log(response);
                    return response.text();
                }).then(function(htmlContent){
                    //Respuesta en HTML
                    // console.log(htmlContent);
                    section.innerHTML += htmlContent;
                    page += 1;
                }).catch(function(err){
                });
            }
        }
    </script>
</body>

</html>
