<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">Karimun</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" title="home"><a href="{{ route('welcome') }}" class="nav-link">Home</a></li>
                <li class="nav-item" title="destinations"><a href="{{ route('destinations') }}" class="nav-link">Destinations</a></li>
                <li class="nav-item" title="packages"><a href="{{ route('packages') }}" class="nav-link">Packages</a></li>
                <li class="nav-item" title="news"><a href="{{ route('news') }}" class="nav-link">News</a></li>
            </ul>
        </div>
    </div>
</nav>