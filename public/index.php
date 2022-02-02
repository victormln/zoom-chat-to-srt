<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Victormln - Software Engineer</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* Show it is fixed to the top */
        body {
            min-height: 75rem;
            padding-top: 3rem;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Victormln</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Utilities
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/zoom-chat-to-srt/">Zoom Chat to Srt</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item disabled" href="#">More coming soon</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <a href="." class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                            d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                    Converter - Zoom Chat to SRT
                </span>
            </a>
        </header>

        <div class="row align-items-md-stretch">
            <div class="col-md-12">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <form action="form_handler.php" method="post" enctype="multipart/form-data">
                        <h2>Instructions</h2>
                        <ol>
                            <li>Upload your zoom chat. (<a href="https://support.zoom.us/hc/en-us/articles/115004792763-Guardar-el-chat-en-la-reuni%C3%B3n" target="_blank" class="link-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg> More info about how to get it</a>)</li>
                            <li>Click on the button "Convert & Download" to start an automatic download.</li>
                        </ol>
                        <div class="col-md-4">
                            <label for="fileToUpload" class="form-label">Upload your Zoom Chat here:</label>
                            <input class="form-control" type="file" id="fileToUpload" name="fileToUpload">
                        </div>
                        <hr>
                        Options:
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="form-group form-check mt-1">
                                    <input class="form-check-input" type="checkbox" value="" id="overlapSubtitles" name="overlap_subtitles">
                                    <label class="form-check-label" for="overlapSubtitles">
                                        Overlap subtitles
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <label for="number_of_seconds_duration" class="form-label">Number of duration in seconds for each line of subtitle/chat line:</label>
                                <div class="form-group col-md-3">
                                    <input type="number" class="form-control" id="number_of_seconds_duration" aria-describedby="numberOfSecondsDuration" placeholder="5" name="number_of_seconds_duration">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Convert & Download</button>
                    </form>
                </div>
            </div>
        </div>

        <footer class="pt-3 mt-4 text-muted border-top">
            Víctor Molina (<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
            </svg> <a href="https://github.com/victormln" target="_blank" class="link-info">victormln</a>) | © 2022
        </footer>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>