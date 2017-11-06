

<template>
  <!--
  Rafael Caziraghi
  29out2017 - 23:26
  -->
<div>
  <table class="table table-striped">
    <thead>
      <tr>
        <!-- cabecalho da lista e entrada da função de ordenamento -->
        <th @click="sortBy('id')">ID</th>
        <th @click="sortBy('name')">Nome</th>
        <th @click="sortBy('email')">Email</th>
        <th @click="sortBy('role_id')">Role</th>
        <th>Editar</th>
        <th>Deletar</th>
      </tr>
      <tr>
        <!--
        inputs de pesquisa
      -->
        <th>
          <input type="text" placeholder="procurar" v-model="searchId">
        </th>
        <th>
          <input type="text" placeholder="procurar" v-model="searchName">
        </th>
        <th>
          <input type="text" placeholder="procurar" v-model="searchEmail">
        </th>
        <th>
          <input type="text" placeholder="procurar" v-model="searchRole_Id">
        </th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <!-- <tbody name="table-row" is="transition-group"> -->
    <!--
    montagem da lista, com animacao de ordenamento
  -->
    <tbody name="flip-list" is="transition-group">
      <!-- <transition-group name="flip-list" tag="ul"> -->
      <!-- <tr v-for="result in filtered" :key="result" name="flip-list" tag="ul" is="transition-group"> -->
      <tr v-for="(result, index) in filtered" :key="result.id">
        <td v-text="result.id" :key="result.id"></td>
        <td v-text="result.name" :key="result.name"></td>
        <td v-text="result.email" :key="result.email"></td>
        <td v-text="result.role_id" :key="result.role_id"></td>
        <td :key="result.id"><button type="button" class="btn btn-primary" @click="editarUsuario(index)">
        Editar
      </button></td>

        </td>
        <td :key="result.id"><button type="button" class="btn btn-danger" @click="deletarUsuario(index)">
        Deletar
      </button></td>

      <!-- <td><a :href="'/laravel/users' + '/' + result.id" class="btn btn-warning">Editar</a></td>
      <td>
        <form action="`action('UserController@destroy', $result['id'])`" method="post"></form>
          {{csrf_field()}}
          <input name="_method" type="hidden" value="DELETE">
          <button class="btn btn-danger" type="submit">Deletar</button>
      </td> -->

      </tr>
      <!-- </transition-group> -->

    </tbody>
  </table>
  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->
  <!--
  Modal editar
   -->
  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditarTitulo">Editar o usuário: {{ this.updateData.name }}</h5>

        </div>
        <div class="alert alert-danger" v-if="errors.length > 0">
          <ul>
            <li v-for="error in errors">{{ error }}</li>
          </ul>
        </div>
        <form v-on:submit.prevent="updateUser">
          <!--
          abertura do formulario de atualizacao de usuario
        -->
          <!-- <input type="hidden" name="_token" value=""> -->
  <!-- <input type="hidden" name="_method" value="PUT"> -->
          <!-- <input name="_method" type="hidden" value="patch"> -->
          <!-- <form method="post"> -->
          <!-- {{csrf_field()}} -->
          <div class="modal-body">
            <!--
            inputs (puxam do que foi mostrado) para atualizacao de dados
          -->
            <div class="row">
              <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <label for="name">ID:</label>
                <!-- <input class="form-control" type="text" name="id" v-bind:value="this.updateData.id" disabled> -->
                <input class="form-control" type="text" name="id" v-model="updateData.id" disabled>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <label for="name">Name:</label>
                <!-- <input type="text" class="form-control" name="name" v-bind:value="this.updateData.name" @:input="this.updateData.name = $event.target.value"> -->
                <input type="text" class="form-control" name="name" v-model="updateData.name">
                <form-error v-if="errors" :errors="errors">
                        @{{ errors }}
                </form-error>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <label for="name">Email:</label>
                <!-- <input type="text" class="form-control" name="email" v-bind:value="this.updateData.email" @:input="this.updateData.email = $event.target.value"> -->
                <input type="text" class="form-control" name="email" v-model="updateData.email">
                <form-error v-if="errors" :errors="errors">
                        @{{ errors }}
                </form-error>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <label for="role_id">Role ID:</label>
                <select class="form-control" id="exampleFormControlSelect1">
                      <option>2</option>
                      <option>1</option>
                  </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button class="btn btn-primary">Salvar alterações</button>
            <!-- <button type="button" @click="updateTask" class="btn btn-primary">Salvar alterações</button> -->

          </div>
        </form>
      </div>
    </div>
  </div>

  <!--
  modal excluir usuario
-->
  <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form v-on:submit.prevent="deleteUser">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir o usuário: {{ this.deleteData.name }}</h5>

        </div>
        <div class="modal-body">
          Voce tem certeza?
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button class="btn btn-danger">Excluir</button>
        </div>
      </form>
      </div>
    </div>
  </div>


</div>
</template>

<script>
export default {
  data() {
    return {
      results: [],
      errors: [],
      successes: [],
      sortKey: "",
      searchId: "",
      searchName: "",
      searchEmail: "",
      searchRole_Id: "",
      order: "desc",
      updateData: {},
      deleteData: {}

    }
  },
  mounted() {
    // ao montar a instancia, traz todos os dados do BD
    this.results = [];
    this.token = document.head.querySelector('meta[name="csrf-token"]');
    axios.get('/laravel/api/listarusuarios')
      .then(response => response.data)
      .then(data => Vue.set(this, 'results', data));

  },
  methods: {
    // metodo para ordenar a lista, sem fazer outro download do bd
    sortBy: function(sortKey) {
      // console.log(sortKey);
      // console.log(this.order);
      this.order == 'desc' ? this.order = 'asc' : this.order = 'desc';
      // altera a ordem, baseado no fato de quantas vezes a funcao foi acionada
      this.results = _.orderBy(this.results, function(i) {
        // dependendo em qual coluna foi clicado, muda a forma de ordenar
          switch (sortKey) {
            case 'id':
              return i.id;
              break;
            case 'name':
              return i.name.toLowerCase();
              break;
            case 'email':
              return i.email.toLowerCase();
              break;
            case 'role_id':
              return i.role_id;
              break;
          }
        },
        this.order)

    },
    editarUsuario: function(index) {
      // funcao para editar o usuario, acionando o modal. copia os dados da linha clicada
      this.errors = [];
      $("#modalEditar").modal('show');
      // this.updateData = result;
      this.updateData = this.results[index];
      // console.log(this.updateData, this.results[index]);

      // this.modalId = result.id;
      // this.modalName = result.name;
      // this.modalEmail = result.email;
      // this.modalRole_Id = result.role_id;
    },
    deletarUsuario: function(index) {
      // funcao para editar o usuario, acionando o modal. copia os dados da linha clicada
      this.errors = [];
      $("#modalExcluir").modal('show');
      // this.updateData = result;
      this.deleteData = this.results[index];
      // console.log(this.updateData, this.results[index]);

      // this.modalId = result.id;
      // this.modalName = result.name;
      // this.modalEmail = result.email;
      // this.modalRole_Id = result.role_id;
    },
    updateUser: function() {
      // funcao para enviar os dados do moal para o BD por patch

      // console.log('/users/' + this.modalId, {
      //     name: this.modalName,
      //     description: this.modalEmail,
      //   }, {
      //     headers: {
      //       "Content-Type": "application/x-www-form-urlencoded"
      //     }
      //   }),
        axios.put('/laravel/users/' + this.updateData.id, {
          id: this.updateData.id,
          name: this.updateData.name,
          email: this.updateData.email,
        }
        // , {
        //   headers: {
        //     "Content-Type": "application/x-www-form-urlencoded"
        //   }
        // }
      )
        .then(response => {

          $("#modalEditar").modal("hide");


        })
        .catch(error => {
          this.errors = [];
          if (error.response.data.errors.name) {
            this.errors.push(error.response.data.errors.name[0]);
          }

          if (error.response.data.errors.email) {
            this.errors.push(error.response.data.errors.email[0]);
          }


        });
    },
    deleteUser: function() {
      axios.delete('/laravel/users/' + this.deleteData.id)
      .then(response => {
        this.results.splice(this.deleteData.id, 1);
        console.log(this.deleteData.id);
        $("#modalExcluir").modal("hide");

      })
      .catch(error => {
        this.errors = [];
        if (error.response.data.errors.name) {
          this.errors.push(error.response.data.errors.name[0]);
        }

        if (error.response.data.errors.email) {
          this.errors.push(error.response.data.errors.description[0]);
        }


      });
    }

  },
  computed: {
    // funcoes de filtro, o primeiro chama os que seguem, de forma que os filtros se sobreponham
    filtered() {
      return getById(getByName(getByEmail(getByRole_Id(this.results, this.searchRole_Id), this.searchEmail), this.searchName), this.searchId)
    },

    filteredById() {
      return getById(this.results, this.searchId)
    },
    filteredByName() {
      return getByName(this.results, this.searchName)
    },
    filteredByEmail() {
      return getByEmail(this.results, this.searchEmail)
    },
    filteredByRole_Id() {
      return getByRole_Id(this.results, this.searchRole_Id)
    },
  }


}

// funcoes de pesquisa fora do componente principal. as funcoes computadas secundarias chamam estas para ordenar , com input da lista e do que foi digitado
function getById(results, searchId) {
  const Id = searchId.trim()
  if (!Id.length) return results
  return results.filter(result => result.id.toString().indexOf(Id) > -1)
}

function getByName(results, searchName) {
  const Name = searchName.trim().toLowerCase()
  if (!Name.length) return results
  return results.filter(result => result.name.toLowerCase().indexOf(Name) > -1)
}

function getByEmail(results, searchEmail) {
  const Email = searchEmail.trim().toLowerCase()
  if (!Email.length) return results
  return results.filter(result => result.email.toLowerCase().indexOf(Email) > -1)
}

function getByRole_Id(results, searchRole_Id) {
  const Role_Id = searchRole_Id.trim()
  if (!Role_Id.length) return results
  return results.filter(result => result.role_id.toString().indexOf(Role_Id) > -1)
}
</script>
