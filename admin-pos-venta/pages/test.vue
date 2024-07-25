<template>
  <div>
    {{producto.marca?.nombre}}
  </div>
</template>
<script>



export default {
 

  data() {
    return {
      producto:{
        nombre:'producto',
      }
    }
  }
}
</script>