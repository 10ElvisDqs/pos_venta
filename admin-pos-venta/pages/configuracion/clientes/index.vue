<template>
  <div>
  <Loader :load="load"></Loader>
  <AdminTemplate :page="page" :modulo="modulo">
    <div slot="body">
      <div class="row justify-content-end">
        <div class="col-2 ">
          <nuxtLink :to="url_nuevo" class="btn btn-dark btn-sm w-100">
            <i class="fas fa-plus"></i>Agregar
          </nuxtLink>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table class="table">
                <thead>
                  <th class="py-0 px-1">#</th>
                  <th class="py-0 px-1">CI</th>
                  <th class="py-0 px-1">NOMBRE</th>
                  <th class="py-0 px-1">PATERNO</th>
                  <th class="py-0 px-1">MATERNO</th>
                  <th class="py-0 px-1">EMAIL</th>
                  <th class="py-0 px-1">CELULAR</th>
                  <th class="py-0 px-1">DIRECCION</th>
                  <th class="py-0 px-1"></th>
                </thead>
                <tbody>
                  <tr v-for="(m,i) in list">
                    <td class="py-0 px-1">{{ i+ 1}}</td>
                    <td class="py-0 px-1">{{ m.ci }}</td>
                    <td class="py-0 px-1">{{ m.nombre }}</td>
                    <td class="py-0 px-1">{{ m.paterno }}</td>
                    <td class="py-0 px-1">{{ m.materno }}</td>
                    <td class="py-0 px-1">{{ m.email }}</td>
                    <td class="py-0 px-1">{{ m.celular }}</td>
                    <td class="py-0 px-1">{{ m.direccion }}</td>
                    <td class="py-0 px-1">
                      <div class="btn-group">
                        <nuxtLink :to="url_editar+m.id" class="btn btn-info btn-sm py-1 px-2">
                          <i class="fas fa-pen"></i>
                        </nuxtLink>
                        <button type="button" @click="Eliminar(m.id)" class="btn btn-danger btn-sm py-1 px-2">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminTemplate>
</div>
</template>

<script>
import AdminTemplate from "@/components/AdminTemplate.vue";

export default {
  name: "IndexPage",
  components: {
    AdminTemplate,
  },
  head() {
    return {
      title: this.modulo,
    };
  },
  data(){
    return {
      load:true,
      list:[],
      apiUrl:'clientes',
      page:'Configuracion',
      modulo:'Clientes',
      url_nuevo:'/configuracion/clientes/nuevo',
      url_editar:'/configuracion/clientes/editar/'
    }
  },
  methods:{
    async GET_DATA(path){
      const res =await this.$api.$get(path)
      return res;
    },
    async EliminarItem(id){
      this.load=true
      try{
      const res =await this.$api.$delete(this.apiUrl+"/"+id)
      console.log(res)
      await Promise.all([this.GET_DATA(this.apiUrl)]).then((v) =>{
        this.list = v[0]
      })
      }catch(e) {
        console.log(e)
      }finally{
        this.load=false
      }

    },
    Eliminar(id){
      let self = this
      this.$swal.fire({
      title: "Deseas Eliminar",
      showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: "Eliminar",
      cancelarButtonText: `Cancelar`
      }).then(async(result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        await self.EliminarItem(id)
      } 
});
    }
  },
  mounted() {
    this.$nextTick(async () => {
      try{
        await Promise.all([this.GET_DATA(this.apiUrl)]).then((v) =>{
        this.list = v[0]
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
