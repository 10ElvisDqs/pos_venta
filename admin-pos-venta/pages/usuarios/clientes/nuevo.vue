<template>
  <div>
    <AdminTemplate :page="page" :modulo="modulo">
      <div slot="body">
        <div class="row justify-content-center">
          <div class="col-sm-8 col-12">
            <div class="card">
              <div class="card-header">
                <h3>Agregar</h3>
              </div>
              <div class="card-body">
                  <CrudCreate :model="model" :apiUrl="apiUrl">
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
                  </CrudCreate>
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
      title:this.modulo,
    };
  },
  data(){
    return {
      model:{
        ci : '',
        nombre:'',
        paterno:'',
        materno: '',
        email:'',
        celular:'',
        direccion: '',
      },
      apiUrl:'clientes',
      page:'Usuarios',
      modulo:'Clientes'
      
    }
  },
  methods:{
    
  },
  mounted() {
    this.$nextTick(async () => {
      try{
        
      }catch(e) {
        console.log(e)
      }finally{
        
      }
      
      

    });
  },
};
</script>

<style scoped>
/* Estilos específicos para esta página */
</style>
