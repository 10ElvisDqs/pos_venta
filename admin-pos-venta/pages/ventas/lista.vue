<template>
  <div>
    <JcLoader :load="load"></JcLoader>
    <AdminTemplate :page="page" :modulo="modulo">
      <div slot="body">
        <div class="row justify-content-end mb-2">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="startDate">Fecha de inicio</label>
                <input
                  type="date"
                  id="startDate"
                  v-model="startDate"
                  class="form-control form-control-sm"
                />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="endDate">Fecha de fin</label>
                <input
                  type="date"
                  id="endDate"
                  v-model="endDate"
                  class="form-control form-control-sm"
                />
              </div>
            </div>
            <div class="col-md-6 d-flex align-items-end">
              <div class="btn-group" role="group">
                <button @click="exportToPDF" class="btn btn-danger btn-sm">
                  PDF
                </button>
                <button @click="exportToExcel" class="btn btn-success btn-sm">
                  Excel
                </button>
                <button @click="printTable" class="btn btn-primary btn-sm">
                  Imprimir
                </button>
              </div>
            </div>
          </div>

          <div class="col-2">
            <nuxtLink :to="url_editar" class="btn btn-dark btn-sm w-100">
              <i class="fas fa-plus"></i> Agregar
            </nuxtLink>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="data-table" class="table">
                <thead>
                  <tr>
                    <th class="py-0 px-1">ID</th>
                    <th class="py-0 px-1">FECHA</th>
                    <th class="py-0 px-1">CLIENTE</th>
                    <th class="py-0 px-1">TOTAL</th>
                    <th class="py-0 px-1"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(m, i) in filteredList" :key="m.id">
                    <td class="py-0 px-1">{{ i + 1 }}</td>
                    <td class="py-0 px-1">{{ m.fecha }}</td>
                    <td class="py-0 px-1">
                      {{ m.cliente.nombre }} {{ m.cliente.paterno }} {{ m.cliente.materno }}
                    </td>
                    <td class="py-0 px-1">{{ m.total }}</td>
                    <td class="py-0 px-1">
                      <div class="btn-group">
                        <nuxtLink
                          :to="url_editar + m.id"
                          class="btn btn-info btn-sm py-1 px-2"
                        >
                          <i class="fas fa-eye"></i>
                        </nuxtLink>
                        <a
                          type="button"
                          :href="m.url_pdf"
                          target="_blank"
                          class="btn btn-danger btn-sm py-1 px-2"
                        >
                          <i class="fas fa-print"></i>
                        </a>

                        <button
                          type="button"
                          @click="Eliminar(m.id)"
                          class="btn btn-danger btn-sm py-1 px-2"
                        >
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
    </AdminTemplate>
  </div>
</template>

<script>
import jsPDF from "jspdf";
import "jspdf-autotable";
import * as XLSX from "xlsx";

export default {
  name: "IndexPage",
  data() {
    return {
      load: true,
      list: [],
      sucursals: [],
      apiUrl: "ventas",
      page: "Ventas",
      modulo: "Lista de ventas",
      sucursal: {},
      url_editar: "/ventas/invoice/",
      startDate: "",
      endDate: "",
    };
  },
  computed: {
    filteredList() {
      if (!this.startDate || !this.endDate) {
        return this.list;
      }
      return this.list.filter((item) => {
        const date = new Date(item.fecha);
        return (
          date >= new Date(this.startDate) && date <= new Date(this.endDate)
        );
      });
    },
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
    Eliminar(id) {
      let self = this;
      this.$swal
        .fire({
          title: "Deseas Eliminar?",
          showDenyButton: false,
          showCancelButton: true,
          confirmButtonText: "Eliminar",
          cancelButtonText: `Cancelar`,
        })
        .then(async (result) => {
          if (result.isConfirmed) {
            await self.EliminarItem(id);
          }
        });
    },

    // PDF
    exportToPDF() {
      const doc = new jsPDF();
      doc.setFontSize(12);
      doc.text("AgroSthil: XYZ Corp.", 10, 10);
      doc.text("Dirección: Montero", 10, 20);
      doc.text("Teléfono: 68837629", 10, 30);
      doc.text("Email: agrosthil@gmail.com", 10, 40);
      doc.text("Lista de Ventas", 10, 50);

      doc.autoTable({
        html: "#data-table",
        startY: 60,
        headStyles: { fillColor: [0, 0, 0], textColor: [255, 255, 255] },
        theme: "striped",
        margin: { top: 60 },
      });

      doc.save("ventas.pdf");
    },

    // Excel
    exportToExcel() {
      const wb = XLSX.utils.book_new();
      const ws = XLSX.utils.table_to_sheet(
        document.getElementById("data-table")
      );

      const ws_data = [
        ["AgroSthil", "XYZ Corp."],
        ["Dirección", "Montero"],
        ["Teléfono", "68837629"],
        ["Email", "agrosthil@gmail.com"],
        [], // Empty row
        ...XLSX.utils.sheet_to_json(ws, { header: 1 }),
      ];

      const ws_with_company_data = XLSX.utils.aoa_to_sheet(ws_data);
      XLSX.utils.book_append_sheet(wb, ws_with_company_data, "Ventas");
      XLSX.writeFile(wb, "ventas.xlsx");
    },

    // Imprimir
    printTable() {
      const logoUrl = "/pages/logo.png";

      const printContent = `
        <div>
          <h2>AgroSthil: XYZ Corp.</h2>
          <p>Dirección: Montero</p>
          <p>Teléfono: 68837629</p>
          <p>Email: agrosthil@gmail.com</p>
          <hr/>
          <img src="${logoUrl}" alt="Logo" style="width: 50px; height: 20px;"/>
          <br/>
          ${document.getElementById("data-table").outerHTML}
        </div>
      `;

      const originalContent = document.body.innerHTML;
      document.body.innerHTML = printContent;
      window.print();
      document.body.innerHTML = originalContent;
      location.reload();
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
    this.$nextTick(async () => {
      try {
        await Promise.all([
          this.GET_DATA(this.apiUrl),
          this.GET_DATA("sucursals"),
        ]).then((v) => {
          this.list = v[0];
          this.sucursals = v[1];
          if (this.sucursals.length > 0) {
            this.sucursal = this.sucursals[0];
          }
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
