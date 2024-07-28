<template>
  <div>
    <JcLoader :load="load"></JcLoader>
    <AdminTemplate :page="page" :modulo="modulo">
      <div slot="body">
        <div class="row justify-content-end">
          <div class="col-12 col-sm-7">
            <div class="row">
              <div class="col-12">
                <div class="card bg-gradient-dark">
                  <div class="card-header bg-transparent py-2 px-3">
                    <div class="row">
                      <div class="col-lg-4 col-md-6 col-12">
                        <div class="input-group input-group-lg">
                          <span
                            class="input-group-text text-white bg-transparent border-0"
                          >
                            <i
                              class="ni ni-archive-2 text-lg"
                              aria-hidden="true"
                            ></i>
                          </span>
                          <input
                            type="text"
                            class="form-control bg-transparent border-0 text-white"
                            placeholder="Buscar..."
                            v-model="buscar"
                            @keyup.enter="Codebar()"
                          />
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-12 my-auto ms-auto">
                        <div class="input-group input-group-lg">
                          <span
                            class="input-group-text text-white bg-transparent border-0"
                          >
                            <i
                              class="ni ni-box-2 text-lg"
                              aria-hidden="true"
                            ></i>
                          </span>
                          <select
                            name=""
                            id=""
                            class="form-control bg-transparent border-0 text-white"
                            v-model="marca"
                          >
                            <option value="all" class="text-dark">
                              Todas las marcas
                            </option>
                            <option
                              class="text-dark"
                              v-for="m in marcas"
                              :value="m.id"
                            >
                              {{ m.nombre }}
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <div class="form-check form-switch ms-auto">
                          <input
                            v-model="image"
                            class="form-check-input"
                            checked=""
                            type="checkbox"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div
                class="col-12 py-2"
                style="
                  min-height: 60vh;
                  max-height: 60vh;
                  overflow-y: scroll;
                  overflow-x: none;
                "
              >
                <div class="row">
                  <div class="col-3" v-for="m in articulosCategoria">
                    <PosArticulo-venta
                      v-if="image == true"
                      :articulo="m"
                      @AddCarrito="AddCarrito"
                    ></PosArticulo-venta>
                    <PosArticulo-venta-image
                      v-else
                      :articulo="m"
                      @AddCarrito="AddCarrito"
                    ></PosArticulo-venta-image>
                  </div>
                </div>
              </div>
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-body d-flex p-3">
                    <h6 class="my-auto">Categoría</h6>
                    <div class="nav-wrapper position-relative ms-auto w-50">
                      <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item active" role="presentation">
                          <a
                            class="nav-link mb-0 px-0 py-1"
                            data-bs-toggle="tab"
                            href="#cam1"
                            role="tab"
                            aria-controls="cam1"
                            aria-selected="true"
                          >
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="dropdown pt-2">
                      <a
                        href="javascript:;"
                        class="text-secondary ps-4"
                        id="dropdownCam"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <i class="fas fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <ul
                        class="dropdown-menu dropdown-menu-end me-sm-n4 px-2 py-3"
                        aria-labelledby="dropdownCam"
                        style=""
                      >
                        <li>
                          <a
                            class="dropdown-item border-radius-md"
                            href="javascript:;"
                            @click="categoria = 'all'"
                            >Todo</a
                          >
                        </li>
                        <li v-for="m in categorias">
                          <a
                            class="dropdown-item border-radius-md"
                            href="javascript:;"
                            @click="categoria = m.id"
                            >{{ m.nombre }}</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="card card-pricing">
              <div
                class="card-header bg-gradient-dark text-center pt-4 pb-5 position-relative"
              >
                <div class="z-index-1 position-relative">
                  <h1 class="text-white mt-2 mb-0">
                    <small></small>{{ Number(totalCarrito).toFixed(2) }}
                  </h1>
                  <h6 class="text-white">Total</h6>
                </div>
              </div>
              <div class="position-relative mt-n5" style="height: 50px">
                <div class="position-absolute w-100">
                  <svg
                    class="waves waves-sm"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 24 150 40"
                    preserveAspectRatio="none"
                    shape-rendering="auto"
                  >
                    <defs>
                      <path
                        id="card-wave"
                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"
                      ></path>
                    </defs>
                    <g class="moving-waves">
                      <use
                        xlink:href="#card-wave"
                        x="48"
                        y="-1"
                        fill="rgba(255,255,255,0.30"
                      ></use>
                      <use
                        xlink:href="#card-wave"
                        x="48"
                        y="3"
                        fill="rgba(255,255,255,0.35)"
                      ></use>
                      <use
                        xlink:href="#card-wave"
                        x="48"
                        y="5"
                        fill="rgba(255,255,255,0.25)"
                      ></use>
                      <use
                        xlink:href="#card-wave"
                        x="48"
                        y="8"
                        fill="rgba(255,255,255,0.20)"
                      ></use>
                      <use
                        xlink:href="#card-wave"
                        x="48"
                        y="13"
                        fill="rgba(255,255,255,0.15)"
                      ></use>
                      <use
                        xlink:href="#card-wave"
                        x="48"
                        y="16"
                        fill="rgba(255,255,255,0.99)"
                      ></use>
                    </g>
                  </svg>
                </div>
              </div>
              <div class="card-body text-center p-3">
                <div class="d-flex align-items-center px-2">
                  <h6>REGISTRAR VENTA</h6>
                  <button
                    type="button"
                    class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto"
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    @click="Clean()"
                  >
                    <i class="fas fa-trash" aria-hidden="true"></i>
                  </button>
                </div>
                <div class="table-responsive p-0" style="min-height: 30vh">
                  <table
                    class="table align-items-center justify-content-center mb-0"
                  >
                    <thead>
                      <tr>
                        <th
                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-start"
                        >
                          Artículo
                        </th>
                        <th
                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-start"
                        >
                          Cantidad
                        </th>
                        <th
                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-start"
                        >
                          Total
                        </th>
                        <th
                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                        ></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(m, i) in carrito" :key="i">
                        <td class="text-start">
                          <p class="text-xxs font-weight-bold mb-0 text-start">
                            {{ m.articulo.nombre }}
                          </p>
                        </td>
                        <td class="text-start">
                          <p class="text-xxs font-weight-bold mb-0 text-start">
                            {{ m.cantidad }}
                          </p>
                        </td>
                        <td class="text-start">
                          <p class="text-xxs font-weight-bold mb-0 text-start">
                            {{ Number(m.cantidad * m.precio).toFixed(2) }}
                          </p>
                        </td>
                        <td>
                          <div class="input-group input-group-sm">
                            <button
                              class="btn btn-outline-primary mb-0 btn-sm"
                              type="button"
                              @click="[(modalEdit = true), (item = m)]"
                            >
                              <i class="fas fa-pen"></i>
                            </button>
                            <button
                              class="btn btn-outline-danger mb-0 btn-sm"
                              type="button"
                              @click="EliminarItem(i)"
                            >
                              <i class="fas fa-times"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="w-100">
                  <!-- <div class="row">
                    <div class="col-6 text-start">
                      <label for="impresion">Impresión</label>
                      <select
                        v-model="impresion"
                        id="impresion"
                        class="form-control"
                      >
                        <option value="1">NO</option>
                        <option value="2">SÍ</option>
                      </select>
                    </div>
                    <div v-if="impresion == 2" class="col-6 text-start">
                      <label for="impreso_tipo">Tipo</label>
                      <select
                        v-model="impreso_tipo"
                        id="impreso_tipo"
                        class="form-control"
                      >
                        <option value="1">LOCAL</option>
                        <option value="2">REMOTA</option>
                      </select>
                    </div>
                  </div> -->
                  <div id="app">
                    <div class="form-group">
                      <label for="clienteCI">Buscar por CI</label>
                      <input
                        type="text"
                        v-model="clienteCI"
                        @input="buscarClientePorCI"
                        id="clienteCI"
                        class="form-control"
                      />
                    </div>
                    <div class="form-group">
                      <label for="clienteSelect">Selecciona un cliente</label>
                      <select
                        v-model="clienteSeleccionado"
                        id="clienteSelect"
                        class="form-control"
                      >
                        <option
                          v-for="cliente in clientes"
                          :key="cliente.id"
                          :value="cliente.id"
                        >
                          {{ cliente.nombre }} {{ cliente.paterno }}
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <a
                  href="javascript:void(0);"
                  class="btn bg-gradient-dark w-100 mt-4 mb-0"
                  @click="Save()"
                >
                  <i class="fas fa-save mx-2"></i> GUARDAR
                </a>
              </div>
            </div>
          </div>
          <div
            class="modal fade"
            :class="modalEdit ? 'showModal' : ''"
            id="AjusteModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                    Editar artículo
                  </h5>
                  <button
                    type="button"
                    class="btn-close text-dark"
                    @click="modalEdit = false"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group has-success">
                        <label for="">Articulo</label>
                        <input
                          type="text"
                          placeholder=""
                          disabled
                          class="form-control"
                          :value="item.articulo.nombre"
                        />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group has-success">
                        <label for="">Articulo</label>
                        <input
                          type="text"
                          placeholder=""
                          disabled
                          class="form-control"
                          :value="item.articulo.stock"
                        />
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group has-success">
                        <label for="">Precio</label>
                        <input
                          type="text"
                          placeholder=""
                          class="form-control"
                          v-model.number="item.precio"
                          disabled
                        />
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group has-success">
                        <label for="">Cantidad</label>
                        <input
                          type="text"
                          placeholder=""
                          class="form-control"
                          v-model.number="item.cantidad"
                          @input="verificarCantidad(item)"
                        />
                      </div>
                      <div
                        v-if="mostrarAdvertencia"
                        class="alert alert-warning"
                      >
                        La cantidad seleccionada supera el stock disponible.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    @click="modalEdit = false"
                    class="btn bg-gradient-secondary w-100"
                    data-bs-dismiss="modal"
                  >
                    Cerrar
                  </button>
                </div>
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
      modulo: "Nueva venta",
      page: "Ventas",
      buscar: "",
      marca: "all",
      categoria: "all",
      clienteSeleccionado: "",
      load: true,
      image: true,
      modalEdit: false,
      articulos: [],
      marcas: [],
      impresion: 1,
      impreso_tipo: 1,
      categorias: [],
      carrito: [],
      clientes: [],
      sucursals: [],
      item: {
        articulo: {
          nombre: "",
        },
        cantidad: 0,
        precio: 0,
      },
      sucursal: {},
      user: {},
      mostrarAdvertencia: false,
    };
  },
  computed: {
    articulosFilter() {
      let buscar = this.buscar;
      if (buscar != "") {
        return this.articulos.filter((a) => {
          let nombre = a.nombre != null ? a.nombre : "";
          let barra = a.barra != null ? a.barra : "";
          return (
            nombre.toLowerCase().indexOf(buscar.toLowerCase()) != -1 ||
            barra.toLowerCase().indexOf(buscar.toLowerCase()) != -1
          );
        });
      }
      return this.articulos;
    },
    articulosMarca() {
      let marca = this.marca;
      if (marca != "all") {
        return this.articulosFilter.filter((a) => {
          return a.marca_id == marca;
        });
      }
      return this.articulosFilter;
    },
    articulosCategoria() {
      let categoria = this.categoria;
      if (categoria != "all") {
        return this.articulosMarca.filter((a) => {
          return a.categoria_id == categoria;
        });
      }
      return this.articulosMarca;
    },
    totalCarrito() {
      return this.carrito.reduce((a, b) => a + b.cantidad * b.precio, 0);
    },
  },
  methods: {
    buscarClientePorCI() {
      const cliente = this.clientes.find(cliente => cliente.ci === this.clienteCI);
      if (cliente) {
        this.clienteSeleccionado = cliente.id;
      } else {
        this.clienteSeleccionado = null; // o cualquier valor por defecto
      }
    },
    verificarCantidad(articulo) {
      if (this.item.cantidad > articulo.stock) {
        this.mostrarAdvertencia = true;
        this.$swal.fire({
          title: " La cantidad seleccionada supera el stock disponible.",
          icon: "warning",
          confirmButtonText: "ok",
        });

        this.item.cantidad = articulo.stock;
      } else {
        if (this.item.cantidad <= 0) {
          this.$swal.fire({
            title: "La cantidad seleccionada no puede ser negativa o 0. !!",
            icon: "warning",
            confirmButtonText: "Ok",
          });
          this.item.cantidad = 1;
        } else {
          this.mostrarAdvertencia = false;
        }
      }
    },
    async GET_DATA(path) {
      const res = await this.$api.$get(path);
      return res;
    },
    async Datos() {
      try {
        await Promise.all([
          this.GET_DATA("marcas"),
          this.GET_DATA("categorias"),
          this.GET_DATA("inventarios"),
          this.GET_DATA("sucursals"),
          this.GET_DATA("clientes"),
        ]).then((v) => {
          this.marcas = v[0];
          this.categorias = v[1];
          this.articulos = v[2];
          this.sucursals = v[3];
          this.clientes = v[4];
          if (this.sucursals.length > 0) {
            this.sucursal = this.sucursals[0];
          }
        });
      } catch (e) {
        console.log(e);
      }
    },
    AddCarrito(articulo) {
      console.log(articulo);
      if (articulo.stock === 0) {
        this.$swal.fire({
          title: "El Stock del Producto es " + articulo.stock + " !!",
          showDenyButton: false,
          showCancelButton: false,
          confirmButtonText: "Ok",
        });
        return false;
      }
      let id = articulo.id;
      let buscarRegistro = this.carrito.filter((i) => i.articulo.id == id);
      console.log(buscarRegistro.length);
      if (buscarRegistro.length > 0) {
        let indice = this.carrito.findIndex((i) => i.articulo.id == id);
        if (this.carrito[indice].cantidad + 1 > this.carrito[indice].stock) {
          return false;
        } else {
          this.carrito[indice].cantidad += 1;
        }
      } else {
        const item = {
          articulo: articulo,
          cantidad: 1,
          stock: articulo.stock,
          precio: articulo.venta,
        };
        this.carrito.push(item);
        console.log(this.carrito);
      }
    },
    EliminarItem(i) {
      this.carrito.splice(i, 1);
    },
    Codebar() {
      let code = this.buscar;
      let buscarRegistro = this.articulosCategoria.filter(
        (i) => i.barra == code
      );
      if (buscarRegistro.length > 0) {
        this.AddCarrito(buscarRegistro[0]);
        this.buscar = "";
      }
    },
    async Save() {
      this.load = true;
      let self = this;
      try {
        const operacion = {
          total: this.totalCarrito,
          tipo: 1,
          pago: 0,
          cambio: 0,
          cliente: this.clienteSeleccionado,
          carrito: this.carrito,
          caja_id: this.user.caja_id,
        };

        const res = await this.$api.$post("ventas", operacion);
        console.log(res);

        if (this.impresion == 2) {
          if (this.impreso_tipo == 1) {
            await this.ImprimirVenta(res);
          } else {
            res.impreso = 0;
            this.$socket.emit("listen_print", { ...this.sucursal, venta: res });
          }
        }

        this.$swal
          .fire({
            title: "Venta Guardada!",
            showDenyButton: false,
            showCancelButton: false,
            icon: "success",
            confirmButtonText: "Ok",
          })
          .then(async (result) => {
            if (result.isConfirmed) {
              window.open(res.url_pdf, "_blank");
              self.Clean();
              self.load = true;
              await self.Datos();
              self.load = false;
            }
          });
      } catch (e) {
        console.log(e);
      } finally {
        this.load = false;
      }
    },

    Clean() {
      this.carrito = [];
    },
    async ImprimirVenta(venta) {
      let sucursal = this.sucursal;
      sucursal.venta = venta;
      const res = await this.$printer.$post(
        sucursal.impresora_url + "venta",
        sucursal
      );
      console.log(res);
    },
  },
  mounted() {
    let user = localStorage.getItem("userAuth");
    this.user = JSON.parse(user);
    this.$nextTick(async () => {
      try {
        await this.Datos();
      } catch (e) {
        console.log(e);
      } finally {
        this.load = false;
      }
    });
  },
};
</script>
<style scoped>
.showModal {
  visibility: visible;
  display: block;
  opacity: 1 !important;
}

.alert-warning {
  color: #856404;
  background-color: #fff3cd;
  border-color: #ffeeba;
}
.gradient-background {
  background: linear-gradient(
    to right,
    #ff7e5f,
    #feb47b
  ); /* Degradado de ejemplo */
  color: white; /* Color de texto */
}
</style>
