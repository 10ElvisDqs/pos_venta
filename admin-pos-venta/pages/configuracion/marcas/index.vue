<template>
  <div>
    <JcLoader :load="load"></JcLoader>
    <AdminTemplate :page="page" :modulo="modulo">
      <div slot="body">
        <div class="row justify-content-end mb-2">
          <div class="col-auto">
            <input type="date" v-model="startDate" class="form-control form-control-sm" />
            <input type="date" v-model="endDate" class="form-control form-control-sm" />
            <button @click="exportToPDF" class="btn btn-danger btn-sm">PDF</button>
            <button @click="exportToExcel" class="btn btn-success btn-sm">Excel</button>
            <button @click="printTable" class="btn btn-primary btn-sm">Imprimir</button>
          </div>
          <div class="col-2">
            <nuxtLink :to="url_nuevo" class="btn btn-dark btn-sm w-100">
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
                    <th class="py-0 px-1">#</th>
                    <th class="py-0 px-1">Nombre del Producto</th>
                    <th class="py-0 px-1">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(m, i) in filteredList" :key="m.id">
                    <td class="py-0 px-1">{{ i + 1 }}</td>
                    <td class="py-0 px-1">{{ m.nombre }}</td>
                    <td class="py-0 px-1">
                      <div class="btn-group">
                        <nuxtLink :to="url_editar + m.id" class="btn btn-info btn-sm py-1 px-2">
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
    </AdminTemplate>
  </div>
</template>

<script>
import jsPDF from 'jspdf';
import 'jspdf-autotable';
import * as XLSX from 'xlsx';

export default {
  name: "IndexPage",
  data() {
    return {
      load: true,
      list: [],
      apiUrl: 'marcas',
      page: 'Configuracion',
      modulo: 'Marcas',
      url_nuevo: '/configuracion/marcas/nuevo',
      url_editar: '/configuracion/marcas/editar/',
      startDate: '',
      endDate: ''
    };
  },
  computed: {
    filteredList() {
      if (!this.startDate || !this.endDate) {
        return this.list;
      }
      return this.list.filter(item => {
        const date = new Date(item.fecha); // Asumiendo que hay una propiedad `fecha` en tus datos
        return date >= new Date(this.startDate) && date <= new Date(this.endDate);
      });
    }
  },
  methods: {
    async GET_DATA(path) {
      const res = await this.$api.$get(path);
      return res;
    },
    async EliminarItem(id) {
      this.load = true;
      try {
        const res = await this.$api.$delete(this.apiUrl + '/' + id);
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
      this.$swal.fire({
        title: 'Deseas Eliminar?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelarButtonText: `Cancelar`,
      }).then(async (result) => {
        if (result.isConfirmed) {
          await self.EliminarItem(id);
        }
      });
    },

    // PDF
    exportToPDF() {
      const doc = new jsPDF();

      // Agregar datos de la empresa
      doc.setFontSize(12);
      doc.text('AgroSthil: XYZ Corp.', 10, 10);
      doc.text('Dirección: Montero', 10, 20);
      doc.text('Teléfono: 68837629', 10, 30);
      doc.text('Email: agrosthil@gmail.com', 10, 40);
      doc.text('Lista de Marcas', 10, 40);

      // Agregar tabla
      doc.autoTable({
        html: '#data-table',
        startY: 50,
        headStyles: { fillColor: [0, 0, 0], textColor: [255, 255, 255] }, // Cambia el color del encabezado
        theme: 'striped', // Cambia el diseño de la tabla
        margin: { top: 50 } // Ajusta el margen superior para que no se superponga con los datos de la empresa
      });

      // Guardar el documento
      doc.save('marcas.pdf');
    },

    // Excel
    exportToExcel() {
      const wb = XLSX.utils.book_new();
      const ws = XLSX.utils.table_to_sheet(document.getElementById('data-table'));

      // Agregar datos de la empresa
      const ws_data = [
        ['AgroSthil', 'XYZ Corp.'],
        ['Dirección', 'Montero'],
        ['Teléfono', '68837629'],
        ['Email', 'agrosthil@gmail.com'],
        [], // Fila en blanco
        ...XLSX.utils.sheet_to_json(ws, { header: 1 })
      ];

      const ws_with_company_data = XLSX.utils.aoa_to_sheet(ws_data);
      XLSX.utils.book_append_sheet(wb, ws_with_company_data, 'Table');
      XLSX.writeFile(wb, 'table.xlsx');
    },

    // Imprimir
    printTable() {
      const logoUrl = '/pages/logo.png';

      const printContent = `
        <div>
          <h2>AgroSthil: XYZ Corp.</h2>
          <p>Dirección: Montero</p>
          <p>Teléfono: 68837629</p>
          <p>Email: agrosthil@gmail.com</p>
          <hr/>
          <img src="${logoUrl}" alt="Logo" style="width: 50px; height: 20px;"/>
          <br/>
          ${document.getElementById('data-table').outerHTML}
        </div>
      `;

      const originalContent = document.body.innerHTML;
      document.body.innerHTML = printContent;
      window.print();
      document.body.innerHTML = originalContent;
      location.reload();
    }
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
