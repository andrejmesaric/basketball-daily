<template>
    <div class="container">
        <div class="row">
          <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sources</h3>

                <div class="card-tools">
                  <button class="btn btn-success">Add Source <i class="fa fa-user-plus fa-fw"></i></button>
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
                      <td>{{source.description}}</td>
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
    </div>
</template>

<script>
    export default {
        data() {            
            return {
                sources: {},
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
                axios.get("/sources").then(({data}) => (this.sources = data.data));
                /*axios.get("/sources")
                .then(({data}) => {
                    console.log(data);
                });*/
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
