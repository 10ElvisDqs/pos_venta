<template>
  <div>
    <JcLoader :load="load"></JcLoader>
    <AdminTemplate :page="page" :modulo="modulo">
      <div slot="body">
        <div class="row justify-content-center">
          <div class="col-sm-4 col-12">
            <div class="card">
              <div class="card-header">
                <h3>Actualizar</h3>
              </div>
              <div class="card-body">
                <div class="form-control dropzone" id="fileDrop">
                  <div class="fallback">
                    <input name="file" type="file" multiple />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-8 col-12">
            <div class="card">
              <div class="card-header">
                <h3>Actualizar</h3>
              </div>
              <div class="card-body">
                <ul class="list-group">
                  <li
                    v-for="m in model.articulo_images"
                    class="list-group-item border-0 d-flex align-items-center px-0 mb-2"
                  >
                    <div class="avatar me-3">
                      <img
                        :src="m.url"
                        alt="image"
                        class="border-radius-lg shadow"
                      />
                    </div>
                   
                    <a
                      class="btn btn-link pe-3 ps-0 mb-0 ms-auto"
                      href="javascript:void(0);"
                      @click="Eliminar(m.id)"
                      >ELIMINAR</a
                    >
                  </li>
                </ul>
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
      title: this.modulo,
    };
  },
  data() {
    return {
      load: false,

      apiUrl: "articuloImages/articulo",
      page: "Configuracion",
      modulo: "Articulos",
      model: {},
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
        const res = await this.$api.$post(this.apiUrl + "/delete/" + id);
        console.log(res);
        await Promise.all([this.GET_DATA(this.apiUrl + "/" + this.$route.params.id)]).then((v) => {
          this.model = v[0];
        });
      } catch (e) {
        console.log(e);
      } finally {
        this.load = false;
      }
    },
    Eliminar(id) {
      let self = this;
      this.$swal
        .fire({
          title: "Deseas Eliminar?",
          showDenyButton: false,
          showCancelButton: true,
          confirmButtonText: "Eliminar",
          cancelarButtonText: `Cancelar`,
        })
        .then(async (result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            await self.EliminarItem(id);
          }
        });
    },
  },
  mounted() {
    this.$nextTick(async () => {
      Dropzone.autoDiscover = false;
      let self = this;
      try {
        await Promise.all([
          this.GET_DATA(this.apiUrl + "/" + this.$route.params.id),
        ]).then((v) => {
          this.model = v[0];
        });
      } catch (e) {
        console.log(e);
      } finally {
        this.load = false;

        let url =
          this.$api.url + "articuloImages/articulo/" + this.$route.params.id;

        new Dropzone("div#fileDrop", {
          url: url,
          headers: {
            Authorization: "",
            // remove Cache-Control and X-Requested-With
            // to be sent along with the request
            "Cache-Control": null,
            "X-Requested-With": null,
          },
        }).on("complete", async function (file) {
          this.removeFile(file);
          await Promise.all([
          self.GET_DATA(self.apiUrl + "/" + self.$route.params.id),
        ]).then((v) => {
          self.model = v[0];
        });
        });
      }
    });
  },
};
</script>
