<template>
  <div>
    <BaseAside/>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

      <BaseNav :page="page" :modulo="modulo"/>
      <div class="container-fluid py-4">
        <slot name="body" />
        <BaseFooter/>
      </div>
    </main>
  </div>
</template>

<script>
export default {
  name: "IndexPage",
  props:{

page:{
    type:String,
    default:''
},
modulo:{
    type:String,
    default:''
},
}

};
</script>
