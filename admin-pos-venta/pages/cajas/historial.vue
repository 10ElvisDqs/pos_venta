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
                    <th class="py-0 px-1">FECHA</th>
                    <th class="py-0 px-1">USUARIO</th>
                    <th class="py-0 px-1">TOTAL</th>
                    <th class="py-0 px-1"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(m, i) in list" :key="m.id">
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
    </AdminTemplate>
  </div>
</template>

<script>
import jsPDF from 'jspdf';
import 'jspdf-autotable';
import * as XLSX from 'xlsx';

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
    
    // Exportar a PDF
    exportToPDF() {
      const doc = new jsPDF();
      doc.setFontSize(12);
      doc.text('AgroSthil: XYZ Corp.', 10, 10);
      doc.text('Dirección: Montero', 10, 20);
      doc.text('Teléfono: 68837629', 10, 30);
      doc.text('Email: agrosthil@gmail.com', 10, 40);
      doc.text('Lista de Cajas', 10, 50);

      doc.autoTable({
        html: '#data-table',
        startY: 60,
        headStyles: { fillColor: [0, 0, 0], textColor: [255, 255, 255] },
        theme: 'striped',
        margin: { top: 60 }
      });

      doc.save('lista_cajas.pdf');
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
      XLSX.utils.book_append_sheet(wb, ws_with_company_data, 'Lista de Cajas');
      XLSX.writeFile(wb, 'lista_cajas.xlsx');
    },

    // Imprimir Tabla
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

<style scoped>
/* Estilos específicos para esta página */
</style>
