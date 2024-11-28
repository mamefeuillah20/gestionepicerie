<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'Épicerie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Épicerie</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('produits.index') ? 'active' : '' }}" 
                           href="{{ route('produits.index') }}">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('categories.index') ? 'active' : '' }}" 
                           href="{{ route('categories.index') }}">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('fournisseurs.index') ? 'active' : '' }}" 
                           href="{{ route('fournisseurs.index') }}">Fournisseurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('clients.index') ? 'active' : '' }}" 
                           href="{{ route('clients.index') }}">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('commandes.index') ? 'active' : '' }}" 
                           href="{{ route('commandes.index') }}">Commandes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
