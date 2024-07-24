<template>
    <div>
      <JcLoader :load="load"></JcLoader>
      <AdminTemplate :page="page" :modulo="modulo">
        <div slot="body">
          <div class="row justify-content-end">
  
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <th class="py-0 px-1">#</th>
                      <th class="py-0 px-1">FECHA</th>
                      <th class="py-0 px-1">USUARIO</th>
                      <th class="py-0 px-1">TOTAL</th>
                      <th class="py-0 px-1"></th>
                    </thead>
                    <tbody>
                      <tr v-for="(m, i) in list">
                        <td class="py-0 px-1">{{ i + 1 }}</td>
                        <td class="py-0 px-1">{{ m.fecha }}</td>
                        <td class="py-0 px-1">{{ m.user.nombre }}</td>
                        <td class="py-0 px-1">{{ Number(m.total).toFixed(2) }}</td>
                        
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
  export default {
    head() {
      return {
        title: this.modulo,
      };
    },
  
    data() {
      return {
        load: true,
        list: [],
        sucursals: [],
        apiUrl: "cajas",
        page: "Caja",
        modulo: "Lista de cajas",
        sucursal:{
  
        },
       
      };
    },
    methods: {
      async GET_DATA(path) {
        const res = await this.$api.$get(path);
        return res;
      },
      async EliminarItem(id) {
        this.load = true;
        try {
          const res = await this.$api.$delete(this.apiUrl + "/" + id);
          console.log(res);
          await Promise.all([this.GET_DATA(this.apiUrl)]).then((v) => {
            this.list = v[0];
          });
        } catch (e) {
          console.log(e);
        } finally {
          this.load = false;
        }
      },
     
     
    },
    mounted() {
      this.$nextTick(async () => {
        try {
          await Promise.all([this.GET_DATA(this.apiUrl)]).then((v) => {
            this.list = v[0];
          });
        } catch (e) {
          console.log(e);
        } finally {
          this.load = false;
        }
      });
    },
  };
  </script>
  