<template>
  <div>
    <JcLoader :load="load"></JcLoader>
    <AdminTemplate :page="page" :modulo="modulo">
      <div slot="body">
        <div class="row justify-content-end mb-2">
          <div class="col-auto">
            <button @click="exportToPDF" class="btn btn-danger btn-sm">PDF</button>
            <button @click="exportToExcel" class="btn btn-success btn-sm">Excel</button>
            <button @click="printTable" class="btn btn-primary btn-sm">Imprimir</button>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="data-table" class="table">
                <thead>
                  <tr>
                    <th class="py-0 px-1">#</th>
                    <th class="py-0 px-1">NOMBRE</th>
                    <th class="py-0 px-1">CODEBAR</th>
                    <th class="py-0 px-1">MARCA</th>
                    <th class="py-0 px-1">CATEGORIA</th>
                    <th class="py-0 px-1">STOCK</th>
                    <th class="py-0 px-1">INVERSION</th>
                    <th class="py-0 px-1">VALORIZADO</th>
                    <th class="py-0 px-1">GANANCIA</th>
                    <th class="py-0 px-1"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(m, i) in list" :key="m.id">
                    <td class="py-0 px-1">{{ i + 1 }}</td>
                    <td class="py-0 px-1">{{ m.nombre }}</td>
                    <td class="py-0 px-1">{{ m.barra }}</td>
                    <td class="py-0 px-1">{{ m.marca.nombre }}</td>
                    <td class="py-0 px-1">{{ m.categoria.nombre }}</td>
                    <td class="py-0 px-1">
                      <span class="badge" :class="[m.stock <= m.stock_minimo ? 'badge-danger' : 'badge-success']">
                        {{ m.stock }} {{ m.medida.codigo }}
                      </span>
                    </td>
                    <td class="py-0 px-1">{{ Number(m.inversion).toFixed(2) }}</td>
                    <td class="py-0 px-1">{{ Number(m.valorizado).toFixed(2) }}</td>
                    <td class="py-0 px-1">{{ Number(m.ganancia).toFixed(2) }}</td>
                    <td class="py-0 px-1">
                      <div class="btn-group">
                        <nuxtLink :to="url_editar + m.id" class="btn btn-info btn-sm py-1 px-2">
                          <i class="fas fa-eye"></i>
                        </nuxtLink>
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
import jsPDF from 'jspdf';
import 'jspdf-autotable';
import * as XLSX from 'xlsx';

export default {
  name: "IndexPage",
  head() {
    return {
      title: this.modulo,
    };
  },

  data() {
    return {
      load: true,
      list: [],
      apiUrl: "inventarios",
      page: "Inventario",
      modulo: "General",
      url_editar: "/inventario/kardex/",
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
          if (result.isConfirmed) {
            await self.EliminarItem(id);
          }
        });
    },

    // Exportar a PDF
    exportToPDF() {
      const doc = new jsPDF();
      doc.setFontSize(12);
      doc.text('AgroSthil: XYZ Corp.', 10, 10);
      doc.text('Dirección: Montero', 10, 20);
      doc.text('Teléfono: 68837629', 10, 30);
      doc.text('Email: agrosthil@gmail.com', 10, 40);
      doc.text('Inventario General', 10, 50);

      doc.autoTable({
        html: '#data-table',
        startY: 60,
        headStyles: { fillColor: [0, 0, 0], textColor: [255, 255, 255] },
        theme: 'striped',
        margin: { top: 60 }
      });

      doc.save('inventario_general.pdf');
    },

    // Exportar a Excel
    exportToExcel() {
      const wb = XLSX.utils.book_new();
      const ws = XLSX.utils.table_to_sheet(document.getElementById('data-table'));

      const ws_data = [
        ['AgroSthil', 'XYZ Corp.'],
        ['Dirección', 'Montero'],
        ['Teléfono', '68837629'],
        ['Email', 'agrosthil@gmail.com'],
        [], // Fila vacía
        ...XLSX.utils.sheet_to_json(ws, { header: 1 })
      ];

      const ws_with_company_data = XLSX.utils.aoa_to_sheet(ws_data);
      XLSX.utils.book_append_sheet(wb, ws_with_company_data, 'Inventario General');
      XLSX.writeFile(wb, 'inventario_general.xlsx');
    },

    // Imprimir
    printTable() {
      const printContent = `
        <div>
          <h2>AgroSthil: XYZ Corp.</h2>
          <p>Dirección: Montero</p>
          <p>Teléfono: 68837629</p>
          <p>Email: agrosthil@gmail.com</p>
          <hr/>
          ${document.getElementById('data-table').outerHTML}
        </div>
      `;

      const originalContent = document.body.innerHTML;
      document.body.innerHTML = printContent;
      window.print();
      document.body.innerHTML = originalContent;
      location.reload();
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
