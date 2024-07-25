<!-- <template>
    <div>
        {{ $route.params.id }}
    </div>
</template>
<script>
export default {

}
</script> -->
<template>
    <div>
    <Loader :load="load"></Loader>
    <AdminTemplate :page="page" :modulo="modulo">
      <div slot="body">
        <div class="row justify-content-center">
          
          <div class="col-sm-8 col-12">
            <div class="card">
              <div class="card-header">
                <h3>Actualizar</h3>
              </div>
              <div class="card-body"> 
                <CrudUpdate :model="model" :apiUrl="apiUrl">
                  <div slot="body" class="row">
                      <div class="form-group col-12">
                        <label for="">Ci</label>
                        <input type="text" name="" v-model="model.ci" class="form-control" id="">
                      </div>
                    </div>
                    <div slot="body" class="row">
                      <div class="form-group col-12">
                        <label for="">Nombre</label>
                        <input type="text" name="" v-model="model.nombre" class="form-control" id="">
                      </div>
                    </div>
                    <div slot="body" class="row">
                      <div class="form-group col-12">
                        <label for="">Paterno</label>
                        <input type="text" name="" v-model="model.paterno" class="form-control" id="">
                      </div>
                    </div>
                    <div slot="body" class="row">
                      <div class="form-group col-12">
                        <label for="">Materno</label>
                        <input type="text" name="" v-model="model.materno" class="form-control" id="">
                      </div>
                    </div>
                    <div slot="body" class="row">
                      <div class="form-group col-12">
                        <label for="">Email</label>
                        <input type="text" name="" v-model="model.email" class="form-control" id="">
                      </div>
                    </div>
                    <div slot="body" class="row">
                      <div class="form-group col-12">
                        <label for="">Celular</label>
                        <input type="text" name="" v-model="model.celular" class="form-control" id="">
                      </div>
                    </div>
                    <div slot="body" class="row">
                      <div class="form-group col-12">
                        <label for="">Direccion</label>
                        <input type="text" name="" v-model="model.direccion" class="form-control" id="">
                      </div>
                    </div>
                  </CrudUpdate>
              </div>
            </div>
          </div>
        </div>
      </div>
    </AdminTemplate>
  </div>
  </template>
  
  <script>
  
  export default {
    name: "IndexPage",
    head() {
        return {
            title: "Clientes",
        };
        ;
    },
    
    data(){
      return {
        load:true,
        model:{
          ci:'',
          nombre:'',
          paterno:'',
          materno:'',
          email:'',
          celular:'',
          direccion:'',

        },
        apiUrl:'clientes',
        page:'Usuarios',
        modulo:'Clientes'
      }
    },
    methods:{
        async GET_DATA(path){
      const res =await this.$api.$get(path)
      return res;
    },
     
    },
    mounted() {
        this.$nextTick(async () => {
            try{
                await Promise.all([this.GET_DATA(this.apiUrl+'/'+this.$route.params.id)]).then((v) =>{
                this.model = v[0]
            })
            }catch(e) {
                console.log(e)
            }finally{
                this.load=false
            }
        })
    }
  };
  </script>
  
  <style scoped>
  /* Estilos específicos para esta página */
  </style>
  