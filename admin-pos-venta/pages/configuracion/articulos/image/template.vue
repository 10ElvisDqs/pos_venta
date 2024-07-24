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
<li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
<div class="avatar me-3">
<img src="/assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
</div>
<div class="d-flex align-items-start flex-column justify-content-center">
<h6 class="mb-0 text-sm">Sophie B.</h6>
<p class="mb-0 text-xs">Hi! I need more information..</p>
</div>
<a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
</li>
<li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
<div class="avatar me-3">
<img src="/assets/img/marie.jpg" alt="kal" class="border-radius-lg shadow">
</div>
<div class="d-flex align-items-start flex-column justify-content-center">
<h6 class="mb-0 text-sm">Anne Marie</h6>
<p class="mb-0 text-xs">Awesome work, can you..</p>
</div>
<a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
</li>
<li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
<div class="avatar me-3">
<img src="/assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
</div>
<div class="d-flex align-items-start flex-column justify-content-center">
<h6 class="mb-0 text-sm">Ivanna</h6>
<p class="mb-0 text-xs">About files I can..</p>
</div>
<a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
</li>
<li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
<div class="avatar me-3">
<img src="/assets/img/team-4.jpg" alt="kal" class="border-radius-lg shadow">
</div>
<div class="d-flex align-items-start flex-column justify-content-center">
<h6 class="mb-0 text-sm">Peterson</h6>
<p class="mb-0 text-xs">Have a great afternoon..</p>
</div>
<a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
</li>
<li class="list-group-item border-0 d-flex align-items-center px-0">
<div class="avatar me-3">
<img src="/assets/img/team-3.jpg" alt="kal" class="border-radius-lg shadow">
</div>
<div class="d-flex align-items-start flex-column justify-content-center">
<h6 class="mb-0 text-sm">Nick Daniel</h6>
<p class="mb-0 text-xs">Hi! I need more information..</p>
</div>
<a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
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

      apiUrl: "articulos",
      page: "Configuracion",
      modulo: "Articulos",
      marcas:[],
      medidas:[],
      categorias:[],
    };
  },
  methods: {
    async GET_DATA(path) {
      const res = await this.$api.$get(path);
      return res;
    },
  },
  mounted() {
    this.$nextTick(async () => {
      Dropzone.autoDiscover = false;
      let self = this
      try {
        await Promise.all([
          this.GET_DATA(this.apiUrl + "/" + this.$route.params.id),this.GET_DATA('marcas'),this.GET_DATA('medidas'),this.GET_DATA('categorias')
        ]).then((v) => {
          this.model = v[0];
          this.marcas = v[1];
          this.medidas = v[2];
          this.categorias = v[3];
          if(this.marcas.length){
            this.model.marca_id = this.marcas[0].id
          }
          if(this.medidas.length){
            this.model.medida_id = this.medidas[0].id
          }
          if(this.categorias.length){
            this.model.categoria_id = this.categorias[0].id
          }
        });
      } catch (e) {
        console.log(e);
      } finally {
        this.load = false;

      let url = this.$api.url+'articuloImages/articulo/'+this.$route.params.id

        new Dropzone('div#fileDrop',{
          url: url,
          headers: {
            'Authorization': '',
            // remove Cache-Control and X-Requested-With
            // to be sent along with the request
            'Cache-Control': null,
            'X-Requested-With': null
        }
        }).on("complete", function(file) {
          this.removeFile(file);
        });
      }
    });
  },
};
</script>
