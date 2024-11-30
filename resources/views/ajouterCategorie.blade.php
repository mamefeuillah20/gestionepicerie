@include('header')
<body class="with-welcome-text">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <div>
                    <div class="btn-wrapper">
                      <button type="button" class="btn btn-success btn-rounded text-white me-0" data-bs-toggle="modal" data-bs-target="#addFormModal">
                        <i class="icon-plus"></i> Ajouter
                      </button>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Liste des Catégories</h4>
                      <p class="card-description"> Liste des catégories disponibles. </p>
                      <div class="table-responsive pt-3">
                        <table class="table table-bordered" id="categoriesTable">
                          <thead>
                            <tr>
                              <th> # </th>
                              <th> Nom </th>
                              <th> Description </th>
                              <th> Actions </th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- Les catégories seront ajoutées ici par AJAX -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<!-- Modal -->
<div class="modal fade" id="addFormModal" tabindex="-1" aria-labelledby="addFormModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addFormModalLabel">Ajouter une catégorie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addCategoryForm" class="forms-sample material-form bordered">
          <div class="form-group">
            <input type="text" id="name" class="form-control" required />
            <label for="name" class="control-label">Nom</label><i class="bar"></i>
          </div>
          <div class="form-group">
            <textarea id="description" class="form-control" style="height: 150px;" required></textarea>
            <label for="description" class="control-label">Description</label><i class="bar"></i>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary btn-rounded" id="saveCategoryButton">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

    </div>
  </div>
</body>

@include('footer')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
  // Fonction pour récupérer toutes les catégories
  function fetchCategories() {
    axios.get('/all-categories')
      .then(response => {
        const categories = response.data.categories;
        let rows = '';
        categories.forEach((category, index) => {
          rows += `
            <tr>
              <td>${index + 1}</td>
              <td>${category.nom}</td>
              <td>${category.description}</td>
              <td>
                <button class="btn btn-warning btn-sm btn-rounded" onclick="editCategory(${category.id})" style="height:40px;">Éditer</button>
                <button class="btn btn-danger btn-sm btn-rounded" onclick="deleteCategory(${category.id})" style="height:40px;">Supprimer</button>
              </td>
            </tr>
          `;
        });
        document.querySelector('#categoriesTable tbody').innerHTML = rows;
      })
      .catch(error => {
        console.error('Erreur lors du chargement des catégories:', error);
      });
  }

  // Appeler la fonction au chargement de la page pour afficher les catégories
  window.onload = function() {
    fetchCategories();
  };

  // Fonction pour ajouter une nouvelle catégorie
  document.getElementById('saveCategoryButton').addEventListener('click', function() {
    const categoryId = this.getAttribute('data-id');  // Récupérer l'ID de la catégorie si c'est une mise à jour
    const name = document.getElementById('name').value;
    const description = document.getElementById('description').value;

    // Valider les champs
    if (!name) {
        alert('Le nom de la catégorie est obligatoire.');
        return;
    }

    // Si l'ID existe, il s'agit d'une mise à jour
    if (categoryId) {
        axios.put(`/update-categories/${categoryId}`, {
            nom: name,
            description: description
        })
        .then(response => {
            alert(response.data.message);
            $('#addFormModal').modal('hide'); // Fermer le modal
            fetchCategories(); // Recharger la liste des catégories
            document.getElementById('saveCategoryButton').removeAttribute('data-id'); // Supprimer l'ID
        })
        .catch(error => {
            console.error('Erreur lors de la mise à jour de la catégorie:', error);
        });
    } else {
        // Sinon, c'est un ajout
        axios.post('/create-categories', {
            nom: name,
            description: description
        })
        .then(response => {
            alert(response.data.message);
            $('#addFormModal').modal('hide'); // Fermer le modal
            fetchCategories(); // Recharger la liste des catégories
        })
        .catch(error => {
            console.error('Erreur lors de l\'ajout de la catégorie:', error);
        });
    }
});

  // Fonction pour éditer une catégorie
  function editCategory(id) {
    axios.get(`/show-categories/${id}`)
      .then(response => {
        const category = response.data;
        document.getElementById('name').value = category.nom;
        document.getElementById('description').value = category.description;
        $('#addFormModal').modal('show');
        document.getElementById('saveCategoryButton').setAttribute('data-id', id);
      })
      .catch(error => {
        console.error('Erreur lors de la récupération de la catégorie:', error);
      });
  }

  // Fonction pour supprimer une catégorie
  function deleteCategory(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')) {
      axios.delete(`/delete-categories/${id}`)
        .then(response => {
          alert(response.data.message);
          fetchCategories(); // Recharger la liste des catégories
        })
        .catch(error => {
          console.error('Erreur lors de la suppression de la catégorie:', error);
        });
    }
  }
</script>
