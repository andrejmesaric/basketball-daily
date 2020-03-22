<template>
    <div class="container">
        <div class="row">
          <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sources</h3>

                <div class="card-tools">
                  <button class="btn btn-success" @click="newModal">Add Source <i class="fa fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Language</th>
                      <th>Logo</th>
                      <th>Registered</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="source in sources" :key="source.id">
                      <td>{{source.id}}</td>
                      <td>{{source.name}}</td>
                      <td>{{source.language}}</td>
                      <td>{{source.language | upText}}</td>
                      <td>{{source.created_at | myDate}}</td>
                      <td>
                            <a href="#"> <i class="fa fa-edit blue"></i></a>
                            /
                            <a href="#">
                                <i class="fa fa-trash red"></i>
                            </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

        <!-- Modal -->
        <!--div class="modal fade" id="addSource" tabindex="-1" role="dialog" aria-labelledby="addSourceLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-show="editmode" class="modal-title" id="addSourceLabel">Update Source</h5>
                        <h5 v-show="!editmode" class="modal-title" id="addSourceLabel">Add Source</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editmode ? updateSource() : createSource()">
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <input v-model="form.name" type="text" name="name"
                                    placeholder="Name"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <!--div class="form-group">
                                <input v-model="form.email" type="email" name="email"
                                placeholder="Email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                            </div-->

                            <!--div class="form-group">
                                <select v-model="form.type" name="type" id="type" class="form-control"  
                                :class="{ 'is-invalid': form.errors.has('type') }">
                                    <option>Select User Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">Standard User</option>
                                    <option value="author">Authors</option>
                                </select>
                                <has-error :form="form" field="type"></has-error>
                            </div-->

                            <!--div class="form-group">
                                <input v-model="form.password" type="password" name="password" id="password"
                                placeholder="Password" class="form-control" 
                                :class="{ 'is-invalid': form.errors.has('password') }">
                                    <has-error :form="form" field="password"></has-error>
                            </div-->

                        <!--/div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update Source</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Create Source</button>
                        </div>
                    </form>
                </div>
            </div>
        </div-->

    </div>
</template>

<script>
    export default {
        data() {            
            return {
                editmode: false,
                sources : {},
                form: new Form({
                    id: '',
                    name: '',
                    description:'',
                    source_link: '',
                    language: '',                    
                    logo: ''
                })
            }
        },
        methods: {            
            loadSources() {
                axios.get("source").then(({data}) => (this.sources = data.data));
            }
        },
        created() {            
            this.loadSources();
            Fire.$on('AfterCreate', () => {
                this.loadSources();
            });

            //setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>
